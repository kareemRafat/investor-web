<?php

namespace App\Models;

use App\Enums\CostProfitRange;
use Illuminate\Database\Eloquent\Model;

class IdeaProfit extends Model
{
    protected $fillable = ['idea_id', 'profit_type', 'range_id'];

    protected function casts(): array
    {
        return [
            'range_id' => CostProfitRange::class,
        ];
    }

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
