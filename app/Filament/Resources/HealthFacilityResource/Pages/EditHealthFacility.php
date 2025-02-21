<?php

namespace App\Filament\Resources\HealthFacilityResource\Pages;

use App\Filament\Resources\HealthFacilityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthFacility extends EditRecord
{
    protected static string $resource = HealthFacilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
