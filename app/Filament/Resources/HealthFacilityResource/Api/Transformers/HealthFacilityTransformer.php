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
            'address' => $this->resource->address,
            'district' => $this->resource->district ? $this->resource->district->name : null,
            'latitude' => $this->resource->latitude,
            'longitude' => $this->resource->longitude,
            'no_telp' => $this->resource->no_telp,
            'email' => $this->resource->email,
            'url' => $this->resource->url,
            'kdppk' => $this->resource->kdppk,
            'image' => $this->resource->image ? url("storage",$this->resource->image) : null,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
