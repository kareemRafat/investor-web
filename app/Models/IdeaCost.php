<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaCost extends Model
{
    protected $fillable = ['idea_id', 'cost_type', 'cost_range'];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
