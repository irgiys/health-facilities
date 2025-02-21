<?php
namespace App\Filament\Resources\HealthFacilityResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\HealthFacilityResource;
use Illuminate\Routing\Router;


class HealthFacilityApiService extends ApiService
{
    protected static string | null $resource = HealthFacilityResource::class;
    public static bool $public = true;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
