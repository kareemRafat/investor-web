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

    public function getFormattedReturnsAttribute(): array
    {
        $returns = [];

        switch ($this->return_type) {
            case 'profit':
                if ($this->profit_only_percentage) {
                    $returns[] = __('idea.steps.step8.profit_share')
                        . ': ' . $this->profit_only_percentage . '%';
                }
                break;

            case 'one_time':
                if ($this->one_time_dollar) {
                    $returns[] = __('idea.steps.step8.one_time_sum')
                        . ': ' . number_format($this->one_time_dollar, 2) . ' $';
                }
                if ($this->one_time_sar) {
                    $returns[] = __('idea.steps.step8.one_time_sum')
                        . ': ' . number_format($this->one_time_sar, 2) . ' ر.س';
                }
                break;

            case 'combo':
                $label = __('idea.steps.step8.profit_plus_sum');
                $parts = [];

                if ($this->combo_percentage) {
                    $parts[] = $this->combo_percentage . '%';
                }
                if ($this->combo_dollar) {
                    $parts[] = number_format($this->combo_dollar, 2) . ' $';
                }
                if ($this->combo_sar) {
                    $parts[] = number_format($this->combo_sar, 2) . ' ر.س';
                }

                if (!empty($parts)) {
                    $returns[] = $label . ': ' . implode(' + ', $parts);
                }
                break;
        }

        return $returns ?: ['-'];
    }
}
