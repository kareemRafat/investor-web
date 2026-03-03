<?php

namespace App\Models;

use App\Enums\CostProfitRange;
use Illuminate\Database\Eloquent\Model;

class IdeaCost extends Model
{
    protected $fillable = ['idea_id', 'cost_type', 'range_id'];

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
