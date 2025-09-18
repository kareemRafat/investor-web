<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaReturn extends Model
{
    protected $fillable = [
        'idea_id',
        'profit_only_percentage',
        'one_time_dollar','one_time_sar',
        'combo_dollar','combo_sar','combo_percentage'
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}

