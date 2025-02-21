<?php

namespace App\Filament\Resources\HealthFacilityResource\Pages;

use App\Filament\Resources\HealthFacilityResource;
use Filament\Resources\Pages\ViewRecord;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;

class ViewHealthFacility extends ViewRecord
{
    protected static string $resource = HealthFacilityResource::class;
    public function form(Form $form): Form
    {
        $record = $this->getRecord();
        // dd($record->latitude);
        return $form->schema([
            Section::make($record->name . " Details")
                ->schema([
                    TextInput::make('name')->disabled(),
                    TextInput::make('address')->disabled(),
                    TextInput::make('phone')->disabled(),
                    TextInput::make('email')->disabled(),
                    TextInput::make('latitude')->disabled(),
                    TextInput::make('longitude')->disabled(),
                    
                    Map::make('location')
                        ->zoom(12) 
                        ->columnSpanFull()
                        ->defaultLocation($record->latitude, $record->longitude)
                        ->disabled(), 
                ]),
        ]);
    }
}
