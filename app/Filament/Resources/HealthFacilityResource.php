<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthFacilityResource\Pages;
use App\Models\HealthFacility;
use App\Models\Type;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Actions;
use Filament\Forms\Get;
use Filament\Support\Enums\VerticalAlignment;

class HealthFacilityResource extends Resource
{
    protected static ?string $model = HealthFacility::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('google_map')
                    ->required()
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type_id')
                    ->required()
                    ->options(Type::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->columnSpanFull(),


                Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->numeric()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state, $livewire): void {
                        $set('location.lat', $state);
                        $livewire->dispatch('refreshMap');
                    }),

                Forms\Components\TextInput::make('longitude')
                    ->required()
                    ->numeric()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state, $livewire): void {
                        $set('location.lng', $state);
                        $livewire->dispatch('refreshMap');
                    }),

                Map::make('location')
                    ->zoom(10)
                    ->columnSpanFull()
                    ->draggable(false)
                    ->disabled()
                    // ->afterStateUpdated(function (Set $set, $state): void {
                    //     \Log::info('Map state updated:', $state); // Log the state
                    //     $set('latitude', $state['lat'] ?? null);
                    //     $set('longitude', $state['lng'] ?? null);
                    // }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('latitude'),
                Tables\Columns\TextColumn::make('longitude'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHealthFacilities::route('/'),
            'create' => Pages\CreateHealthFacility::route('/create'),
            'view' => Pages\ViewHealthFacility::route('/{record}/view'), 
            'edit' => Pages\EditHealthFacility::route('/{record}/edit'),
        ];
    }
}
