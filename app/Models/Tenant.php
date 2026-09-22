<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'national_id',
        'phone',
        'email',
        'address',
        'notes',
    ];

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}