<?php

namespace App\Filament\Widgets;

use App\Models\HealthFacility;
use App\Models\Type;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TypeDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Fasilitas kesehatan berdasarkan tipe';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = HealthFacility::select('types.name', DB::raw('count(*) as count'))
            ->join('types', 'health_facilities.type_id', '=', 'types.id')
            ->groupBy('types.name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Health Facilities',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#FF6384',
                        '#17B073',
                        '#FFCE56',
                        '#4BC0C0',
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