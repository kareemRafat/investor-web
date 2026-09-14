<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Livewire\Forms\Investment\Step4Form;
use App\Models\InvestorContribution;

trait Step4
{
    public function initStep4()
    {
        $investorId = session('current_investor_id');
        if ($investorId) {
            $contribution = InvestorContribution::where('investor_id', $investorId)->first();
            if ($contribution) {
                $this->state['step4']['data'] = array_merge($this->state['step4']['data'], $contribution->toArray());
            }
        }
    }

    public function validateStep4()
    {
        $data = $this->state['step4']['data'];

        $this->validate(
            Step4Form::rules(is_array($data) ? $data : []),
            Step4Form::messages()
        );
    }
}
