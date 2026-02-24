<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorCountry extends Model
{
    use HasFactory;

    protected $fillable = ['investor_id', 'country'];

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }

    public function getCountryNameAttribute()
    {
        $options = trans('investor.steps.step2.options');
        $found = collect($options)->firstWhere('code', $this->country);

        return $found['name'] ?? $this->country;
    }
}
