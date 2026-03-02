<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Models\CostProfitRange;
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
                    $contribution->only(array_keys($this->state['step5']['data']))
                );
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
                'state.step5.data.money_contributions' => 'required|integer|min:1',
            ], [
                'state.step5.data.money_contributions.required' => __('investor.validation.step5.required'),
                'state.step5.data.money_contributions.integer' => __('investor.validation.step5.invalid'),
            ]);
        }
    }

    public function getMoneyRangesProperty()
    {
        return CostProfitRange::where('type', 'money_contribution')->orderBy('id')->get();
    }
}
