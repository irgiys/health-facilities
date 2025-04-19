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
            Stat::make('Total Health Facilities', HealthFacility::count())
                ->description('Total registered facilities')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('success'),
            
            Stat::make('Total Districts', District::count())
                ->description('Registered districts')
                ->descriptionIcon('heroicon-m-map')
                ->color('warning'),
            
            Stat::make('Facility Types', Type::count())
                ->description('Different types of facilities')
                ->descriptionIcon('heroicon-m-rectangle-group')
                ->color('info'),
        ];
    }
}