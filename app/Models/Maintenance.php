<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    protected $fillable = [
        'property_id',
        'unit_id',
        'title',
        'description',
        'category',
        'cost',
        'status',
        'requested_at',
        'completed_at',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
        'requested_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}