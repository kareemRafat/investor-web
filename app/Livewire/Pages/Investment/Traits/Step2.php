<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Livewire\Forms\Investment\Step2Form;
use App\Models\Investor;

trait Step2
{
    public function initStep2()
    {
        $investorId = session('current_investor_id');
        if ($investorId) {
            $this->state['step2']['countries'] = Investor::find($investorId)
                ?->countries()
                ->pluck('country')
                ->toArray() ?? [];
        }
    }

    public function validateStep2()
    {
        $this->validate(Step2Form::rules(), Step2Form::messages());
    }
}
