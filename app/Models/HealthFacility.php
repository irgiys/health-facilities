<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthFacility extends Model
{
    /** @use HasFactory<\Database\Factories\HealthFacilityFactory> */
    use HasFactory;
    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
