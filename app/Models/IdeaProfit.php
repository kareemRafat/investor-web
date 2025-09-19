<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaProfit extends Model
{
    protected $fillable = ['idea_id', 'profit_type', 'range_id'];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function range()
    {
        return $this->belongsTo(CostProfitRange::class, 'range_id');
    }
}
