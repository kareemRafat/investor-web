<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function formattedReturns(): Attribute
    {
        return Attribute::get(function () {
            if (!$this->return_type) {
                return []; // ← ضمان يرجع Array مش null
            }

            $typeLabel = __('idea.steps.step8.' . ($this->return_type ?? '-'));
            $details = [];

            switch ($this->return_type) {
                case 'profit':
                    if ($this->profit_only_percentage) {
                        $details[] = __('idea.steps.step8.profit_share') . ': ' . $this->profit_only_percentage . '%';
                    }
                    break;

                case 'one_time':
                    if ($this->one_time_dollar) {
                        $details[] = __('idea.steps.step8.fixed_amount') . ': '
                            . number_format($this->one_time_dollar, 2)
                            . ' ' . __('idea.currency.dollar');
                    } elseif ($this->one_time_sar) {
                        $details[] = __('idea.steps.step8.fixed_amount') . ': '
                            . number_format($this->one_time_sar, 2)
                            . ' ' . __('idea.currency.sar');
                    }
                    break;

                case 'combo':
                    if ($this->combo_percentage) {
                        $details[] = __('idea.steps.step8.profit_share') . ': ' . $this->combo_percentage . '%';
                    }

                    if ($this->combo_dollar) {
                        $details[] = __('idea.steps.step8.fixed_amount') . ': '
                            . number_format($this->combo_dollar, 2)
                            . ' ' . __('idea.currency.dollar');
                    } elseif ($this->combo_sar) {
                        $details[] = __('idea.steps.step8.fixed_amount') . ': '
                            . number_format($this->combo_sar, 2)
                            . ' ' . __('idea.currency.sar');
                    }
                    break;
            }

            return array_filter([...$details]);
        });
    }
}
