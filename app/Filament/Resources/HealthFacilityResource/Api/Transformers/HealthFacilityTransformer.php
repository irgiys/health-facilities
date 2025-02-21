<?php
namespace App\Filament\Resources\HealthFacilityResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\HealthFacility;

/**
 * @property HealthFacility $resource
 */
class HealthFacilityTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
