<?php

namespace App\Filament\Widgets;

use App\Models\HealthFacility;
use App\Models\District;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DistrictDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Health Facilities by District';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = HealthFacility::select('districts.name', DB::raw('count(*) as count'))
            ->join('districts', 'health_facilities.district_id', '=', 'districts.id')
            ->groupBy('districts.name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Health Facilities',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#FF6316',
                        '#36A21D',
                        '#FFCA87',
                        '#4BC9B0',
                        '#FF6346',
                        '#36A27B',
                        '#FFC87B',
                        '#4BC9C9',
                        '#FF6376',
                        '#36A87B',
                        '#FFC9CB',
                        '#4BC9BB',
                    ],
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}