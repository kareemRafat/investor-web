<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Enums\CostProfitRange;
use App\Models\InvestorContribution;

trait Step5
{
    public function initStep5()
    {
        $investorId = session('current_investor_id');

        if ($investorId) {
            $contribution = InvestorContribution::where('investor_id', $investorId)->first();

            // افحص العمود فقط
            $this->state['step5']['disableResources'] = ! $contribution || is_null($contribution->money_contributions);

            if ($contribution) {
                $this->state['step5']['data'] = array_merge(
                    $this->state['step5']['data'],
                    $contribution->only(['money_contributions'])
                );

                if ($contribution->money_contributions) {
                    $this->state['step5']['data']['money_contributions'] = $contribution->money_contributions->value;
                }
            }
        }
    }

    public function updatedStateStep5DisableResources($value)
    {
        if ($value) {
            $this->state['step5']['data']['money_contributions'] = null;
        }
    }

    public function validateStep5()
    {
        if (! $this->state['step5']['disableResources']) {
            $this->validate([
                'state.step5.data.money_contributions' => 'required|integer',
            ], [
                'state.step5.data.money_contributions.required' => __('investor.validation.step5.required'),
            ]);
        }
    }

    public function getMoneyRangesProperty()
    {
        return CostProfitRange::filterByType('money_contribution');
    }
}
