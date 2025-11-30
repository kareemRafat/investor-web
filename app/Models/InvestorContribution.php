<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'money_contributions'
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }

    public function getMoneyContributionLabelAttribute(): ?string
    {
        if (!$this->money_contributions) {
            return null;
        }

        return __('investor.steps.step5.money_contribution_ranges.amount_' . $this->money_contributions);
    }

    public function contributionRange()
    {
        return $this->belongsTo(CostProfitRange::class, 'money_contributions')
            ->where('type', 'money_contribution');
    }
}
