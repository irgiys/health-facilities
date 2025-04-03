<?php

namespace App\Filament\Resources\HealthFacilityResource\Pages;

use App\Filament\Resources\HealthFacilityResource;
use Filament\Resources\Pages\ViewRecord;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Actions\Action;

class ViewHealthFacility extends ViewRecord
{
    protected static string $resource = HealthFacilityResource::class;

    public function form(Form $form): Form
    {
        $record = $this->getRecord();

        return $form->schema([
            Section::make($record->name . " Details")
                ->schema([
                    TextInput::make('name')->disabled(),
                    TextInput::make('no_telp')->disabled(),
                    TextInput::make('address')->disabled(),
                    TextInput::make('email')->disabled(),
                    TextInput::make('latitude')->disabled(),
                    TextInput::make('longitude')->disabled(),
                    Map::make('location')
                        ->zoom(12)
                        ->columnSpanFull()
                        ->defaultLocation($record->latitude, $record->longitude)
                        ->draggable(false)
                        ->disabled(),
                    Placeholder::make('google_maps_link')
                        ->label('')
                        ->content(function () use ($record) {
                            return new \Illuminate\Support\HtmlString(
                                '<a href="https://www.google.com/maps?q=' . $record->latitude . ',' . $record->longitude . '" target="_blank" class="filament-button filament-button-size-md inline-flex items-center justify-center min-h-6 px-4 py-2 text-sm font-medium rounded-lg bg-primary-600 text-white hover:bg-primary-700">Open in Google Maps</a>'
                            );
                        }),
                ]),
        ]);
    }
}