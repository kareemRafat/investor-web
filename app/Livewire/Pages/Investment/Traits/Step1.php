<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Livewire\Forms\Investment\Step1Form;
use App\Models\Investor;

trait Step1
{
    public function initStep1()
    {
        $investorId = session('current_investor_id');
        if ($investorId) {
            $investor = Investor::find($investorId);
            if ($investor) {
                $this->state['step1']['investorField'] = $investor->investor_field;
            }
        }
    }

    public function validateStep1()
    {
        $this->validate(Step1Form::rules(), Step1Form::messages());
    }
}
