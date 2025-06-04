<?php

namespace App\Filament\Widgets;

use App\Models\HealthFacility;
use App\Models\District;
use App\Models\Type;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Fasilitas Kesehatan', HealthFacility::count())
                ->description('Total fasilitas kesehatan')
                // ->descriptionIcon('heroicon-m-building-office-2')
                ->color('success'),
            
            Stat::make('Total Kecamatan', District::count())
                ->description('Total kecamatan di Purwakarta')
                // ->descriptionIcon('heroicon-m-map')
                ->color('warning'),
            
            Stat::make('Tipe Fasilitas', Type::count())
                ->description('Perbedaan tipe fasilitas')
                // ->descriptionIcon('heroicon-m-rectangle-group')
                ->color('info'),
        ];
    }
}