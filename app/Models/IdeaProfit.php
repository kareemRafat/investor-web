<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaProfit extends Model
{
    protected $fillable = ['idea_id', 'profit_type', 'profit_range'];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
