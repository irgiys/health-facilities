<?php

namespace App\Filament\Resources\HealthFacilityResource\Pages;

use App\Filament\Resources\HealthFacilityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHealthFacility extends CreateRecord
{
    protected static string $resource = HealthFacilityResource::class;
    public static function getNavigationLabel(): string
    {
        return 'Tambah Fasilitas Kesehatan';
    }

    public function getTitle(): string
    {
        return 'Tambah Fasilitas Kesehatan';
    }
}
