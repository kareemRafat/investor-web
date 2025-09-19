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

    public function getCapitalDistributionAttribute(): array
    {
        $map = trans('idea.steps.step6.fields');

        $distribution = [];

        foreach ($map as $field => $label) {
            if (!is_null($this->$field)) {
                $distribution[] = $label . ': ' . intval($this->$field) . '%';
            }
        }

        return $distribution ?: ['-'];
    }
}
