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
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'type' => $this->resource->type ? $this->resource->type->name : null,
            'district' => $this->resource->district,
            // 'address' => $this->resource->address,
            'latitude' => $this->resource->latitude,
            'longitude' => $this->resource->longitude,
            'no_telp' => $this->resource->no_telp,
            // 'email' => $this->resource->email,
            // 'url' => $this->resource->url,
            'image' => $this->resource->image,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
