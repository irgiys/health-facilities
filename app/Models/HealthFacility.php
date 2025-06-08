<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rupadana\ApiService\Contracts\HasAllowedFilters;

class HealthFacility extends Model implements HasAllowedFilters
{
    /** @use HasFactory<\Database\Factories\HealthFacilityFactory> */
    use HasFactory;
    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public static function getAllowedFilters(): array
    {
        // uri/health-facilities?filter[district.name]=value&filter[type.name]=value
        return ["district.name", "type.name"];
    }
}
