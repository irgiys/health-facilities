<?php

namespace App\Filament\Resources\HealthFacilityResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\HealthFacilityResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\HealthFacilityResource\Api\Transformers\HealthFacilityTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = HealthFacilityResource::class;


    /**
     * Show HealthFacility
     *
     * @param Request $request
     * @return HealthFacilityTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new HealthFacilityTransformer($query);
    }
}
