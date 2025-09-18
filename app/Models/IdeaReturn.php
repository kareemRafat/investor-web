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
        'profit_only_percentage' => 'integer',
        'one_time_dollar' => 'integer',
        'one_time_sar' => 'integer',
        'combo_dollar' => 'integer',
        'combo_sar' => 'integer',
        'combo_percentage' => 'integer',
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
