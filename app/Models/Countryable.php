<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countryable extends Model
{
    protected $fillable = [
        'country',
        'countryable_type',
        'countryable_id',
    ];

    public function countryable()
    {
        return $this->morphTo();
    }

    public function scopeByCountry($query, $countryCode)
    {
        return $query->where('country', $countryCode);
    }
}
