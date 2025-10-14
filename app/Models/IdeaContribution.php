<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class IdeaContribution extends Model
{
    protected $fillable = [
        'idea_id',
        'contribute_type',
        'staff',
        'staff_person_money',
        'money_amount',
        'money_percent',
        'person_money_amount',
        'person_money_percent'
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    protected function formattedContribution(): Attribute
    {
        return Attribute::get(function () {
            $results = [];

            switch ($this->contribute_type) {
                case 'sell':
                    $results[] = __('idea.steps.step7.sell');
                    break;

                case 'idea':
                    $results[] = __('idea.steps.step7.idea');
                    break;

                case 'capital':
                    $capitalLine = __('idea.steps.step7.capital');
                    $details = [];

                    // إضافة المبلغ مع العملة
                    if (!is_null($this->money_amount)) {
                        $currency = $this->money_currency ?? __('idea.currency.sar'); // أو $this->money_currency موجود عندك
                        $details[] = number_format($this->money_amount, 2) . ' ' . $currency;
                    }

                    if (!is_null($this->money_percent)) {
                        $details[] = $this->money_percent . '%';
                    }

                    if (!empty($details)) {
                        $capitalLine .= ' : ' . implode(', ', $details);
                    }

                    $results[] = $capitalLine;
                    break;

                case 'personal':
                    $personalLine = __('idea.steps.step7.personal');

                    if (!is_null($this->staff)) {
                        $personalLine .= ' : ' . __('idea.steps.step7.' . $this->staff);
                    }

                    $results[] = $personalLine;
                    break;

                case 'both':
                    // مساهمة رأس المال
                    $capitalLine = __('idea.steps.step7.capital');
                    $capitalDetails = [];

                    if (!is_null($this->person_money_amount)) {
                        $currency = $this->person_money_currency ?? __('idea.currency.sar');
                        $capitalDetails[] = number_format($this->person_money_amount, 2) . ' ' . $currency;
                    }

                    if (!is_null($this->person_money_percent)) {
                        $capitalDetails[] = $this->person_money_percent . '%';
                    }

                    if (!empty($capitalDetails)) {
                        $capitalLine .= ' : ' . implode(', ', $capitalDetails);
                    }

                    $results[] = $capitalLine;

                    // مساهمة شخصية
                    $personalLine = __('idea.steps.step7.personal');
                    if (!is_null($this->staff_person_money)) {
                        $personalLine .= ' : ' . __('idea.steps.step7.' . $this->staff_person_money);
                    }

                    $results[] = $personalLine;
                    break;

                default:
                    $results[] = '-';
                    break;
            }

            return array_filter($results);
        });
    }
}
