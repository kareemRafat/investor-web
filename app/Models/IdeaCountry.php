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
}

