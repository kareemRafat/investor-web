<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaExpense extends Model
{
    protected $fillable = [
        'idea_id',
        'company',
        'assets',
        'salaries',
        'operating',
        'other'
    ];

    protected $casts = [
        'company' => 'integer',
        'assets' => 'integer',
        'salaries' => 'integer',
        'operating' => 'integer',
        'other' => 'integer',
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
