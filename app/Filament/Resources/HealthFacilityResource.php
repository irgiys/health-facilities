<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthFacilityResource\Pages;
use App\Models\District;
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
    protected static ?string $navigationIcon = 'heroicon-m-building-office-2';
    protected static ?int $navigationSort = 1; // Will appear first
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('district_id')
                    ->required()
                    ->options(District::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telp')
                    // ->number()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
                Forms\Components\Select::make('type_id')
                    ->required()
                    ->options(Type::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\FileUpload::make('image')
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
                    // ->liveLocation(true, true, 1000)  // Updates live location every 10 seconds
                    ->zoom(10)
                    ->columnSpanFull()
                    ->draggable(false)
                    ->disabled(true)
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
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('type.name')->label('Type')->sortable(),
                Tables\Columns\TextColumn::make('district.name')->label('District')->sortable(),
                // Tables\Columns\TextColumn::make('no_telp'),
                // Tables\Columns\TextColumn::make('address')
                // ->limit(20) 
                // ->tooltip(fn ($record) => $record->address),
                // Tables\Columns\TextColumn::make('email'),
                // Tables\Columns\TextColumn::make('latitude')->limit(10),
                // Tables\Columns\TextColumn::make('longitude')->limit(10),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->relationship('type', 'name') 
                    ->label('Filter by Type')
                    ->placeholder('All Types'), // Placeholder untuk opsi "semua"
                    Tables\Filters\SelectFilter::make('district')
                    ->relationship('district', 'name') 
                    ->label('Filter by District')
                    ->placeholder('All Districts'),
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