<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaReturn extends Model
{
    protected $fillable = [
        'idea_id',
        'profit_only_percentage',
        'one_time_dollar',
        'one_time_sar',
        'combo_dollar',
        'combo_sar',
        'combo_percentage',
        'return_type',
    ];

    // لو عايز تعمل cast للقيم decimal
    protected $casts = [
        'profit_only_percentage' => 'decimal:2',
        'one_time_dollar' => 'decimal:2',
        'one_time_sar' => 'decimal:2',
        'combo_dollar' => 'decimal:2',
        'combo_sar' => 'decimal:2',
        'combo_percentage' => 'decimal:2',
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
