<?php

namespace App\Models;

use App\Enums\CostProfitRange;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorContribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'investor_id',
        'contribute_type',
        'staff',
        'staff_person_money',
        'money_amount',
        'money_percent',
        'person_money_amount',
        'person_money_percent',
        'money_contributions',
    ];

    protected function casts(): array
    {
        return [
            'money_contributions' => CostProfitRange::class,
        ];
    }

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }

    public function getMoneyContributionLabelAttribute(): ?string
    {
        return $this->money_contributions?->label();
    }

    public function getFormattedContributionAttribute(): array
    {
        $lines = [];

        // نوع المساهمة
        if ($this->contribute_type) {
            $lines[] = __('investor.steps.step4.'.$this->contribute_type);
        }

        // لو فيه مساهمة مالية
        if ($this->money_amount) {
            $lines[] = __('investor.common.money').': '.number_format($this->money_amount).' '.__('investor.common.currency');
        }

        if ($this->money_percent) {
            $lines[] = __('investor.common.percentage').': '.$this->money_percent.'%';
        }

        // لو فيه مساهمة شخصية + مالية
        if ($this->person_money_amount) {
            $lines[] = __('investor.common.person_money').': '.number_format($this->person_money_amount).' '.__('investor.common.currency');
        }

        if ($this->person_money_percent) {
            $lines[] = __('investor.common.person_percentage').': '.$this->person_money_percent.'%';
        }

        // نوع التفرغ
        if ($this->staff) {
            $lines[] = __('investor.steps.step4.staff_types.'.$this->staff);
        }

        return $lines;
    }
}
