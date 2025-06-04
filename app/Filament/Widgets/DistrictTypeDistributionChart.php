<?php

namespace App\Filament\Widgets;

use App\Models\HealthFacility;
use App\Models\Type;
use App\Models\District;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DistrictTypeDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi fasilitas kesehatan berdasarkan kecamatan';
    protected static ?int $sort = 3; 
    public function getColumnSpan(): int | string | array
    {
        return 'full';
    }
    protected function getData(): array
    {
        $districtCounts = HealthFacility::select('districts.name', DB::raw('count(*) as total_count'))
            ->join('districts', 'health_facilities.district_id', '=', 'districts.id')
            ->groupBy('districts.name')
            ->orderBy('total_count', 'desc')
            ->pluck('name')
            ->toArray();
        $types = Type::all();
        
        $datasets = [];
        
        // Colors for different facility types
        $colors = [
            '#FF6384',
            '#17B073',
            '#FFCE56',
            '#4BC0C0',
        ];

        foreach ($types as $index => $type) {
            $data = HealthFacility::select('districts.name', DB::raw('count(*) as count'))
                ->join('districts', 'health_facilities.district_id', '=', 'districts.id')
                ->where('type_id', $type->id)
                ->groupBy('districts.name')
                ->pluck('count', 'name')
                ->toArray();

            $countsArray = array_map(function ($district) use ($data) {
                return $data[$district] ?? 0;
            }, $districtCounts);
            
            $datasets[] = [
                'label' => $type->name,
                'data' => $countsArray,
                'backgroundColor' => $colors[$index % count($colors)],
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $districtCounts,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'stacked' => true,
                ],
                'y' => [
                    'stacked' => true,
                    'beginAtZero' => true,
                ],
            ],
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
            ],
        ];
    }
}

