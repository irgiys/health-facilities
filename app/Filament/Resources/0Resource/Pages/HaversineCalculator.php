<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\Fieldset;

class HaversineCalculator extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';
    protected static string $view = 'filament.pages.haversine-calculator';
    protected static ?string $navigationLabel = 'Haversine Calculator';
    protected static ?string $title = 'Haversine Calculator';
    public ?array $data = [];

    public ?float $result = null;

    protected function getFormSchema(): array
    {
        return [
            Fieldset::make('Lokasi Awal')
            ->schema([
                TextInput::make('data.lat1')
                    ->label('Latitude Awal')
                    ->numeric()
                    ->required(),

                TextInput::make('data.lon1')
                    ->label('Longitude Awal')
                    ->numeric()
                    ->required(),
            ]),

        Fieldset::make('Lokasi Tujuan')
            ->schema([
                TextInput::make('data.lat2')
                    ->label('Latitude Tujuan')
                    ->numeric()
                    ->required(),

                TextInput::make('data.lon2')
                    ->label('Longitude Tujuan')
                    ->numeric()
                    ->required(),
            ]),
        ];
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function calculate()
    {
       $state = $this->form->getState();
       $this->data = $state['data'];
       $this->result = $this->haversine(
            $this->data['lat1'],
            $this->data['lon1'],
            $this->data['lat2'],
            $this->data['lon2']
     );
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Radius bumi dalam km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             sin($dLon / 2) * sin($dLon / 2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c;

        return $d;
    }
}
