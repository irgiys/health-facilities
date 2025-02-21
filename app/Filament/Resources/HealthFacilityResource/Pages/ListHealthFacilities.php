<?php

namespace App\Filament\Resources\HealthFacilityResource\Pages;

use App\Filament\Resources\HealthFacilityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthFacilities extends ListRecords
{
    protected static string $resource = HealthFacilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
