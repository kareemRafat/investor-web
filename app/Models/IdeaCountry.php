<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaCountry extends Model
{
    protected $fillable = ['idea_id', 'country'];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function getCountryNameAttribute()
    {
        $options = trans('idea.steps.step2.options');
        $found = collect($options)->firstWhere('code', $this->country);

        return $found['name'] ?? $this->country;
    }
}
