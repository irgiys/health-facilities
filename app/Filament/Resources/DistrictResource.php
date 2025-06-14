<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\DistrictResource\Pages;
// use App\Filament\Resources\DistrictResource\RelationManagers;
// use App\Models\District;
// use Filament\Forms;
// use Filament\Forms\Form;
// use Filament\Resources\Resource;
// use Filament\Tables;
// use Filament\Tables\Table;


// class DistrictResource extends Resource
// {
//     protected static ?string $model = District::class;
//     protected static ?string $navigationIcon = 'heroicon-o-map';
//     protected static ?int $navigationSort = 2; // Will appear second
//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 Forms\Components\TextInput::make('name')
//                     ->required()
//                     ->maxLength(255)
//                     ->live(onBlur: true)
//             ]);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 Tables\Columns\TextColumn::make('name'),
//                 Tables\Columns\TextColumn::make('created_at')
//                     ->dateTime('d M Y'),
//                 Tables\Columns\TextColumn::make('updated_at')
//                     ->dateTime('d M Y'),
//                 //
//             ])
//             ->filters([
//                 //
//             ])
//             ->actions([
//                 Tables\Actions\ViewAction::make(),
//                 Tables\Actions\EditAction::make(),
//                 Tables\Actions\DeleteAction::make(),
//             ])
//             ->bulkActions([
//                 Tables\Actions\BulkActionGroup::make([
//                     Tables\Actions\DeleteBulkAction::make(),
//                 ]),
//             ]);
//     }

//     public static function getRelations(): array
//     {
//         return [
//             //
//         ];
//     }

//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ManageDistricts::route('/'),
//             // 'create' => Pages\CreateDistrict::route('/create'),
//             // 'edit' => Pages\EditDistrict::route('/{record}/edit'),
//         ];
//     }
// }


