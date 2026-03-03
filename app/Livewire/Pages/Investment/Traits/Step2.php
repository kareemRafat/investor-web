<?php

namespace App\Livewire\Pages\Investment\Traits;

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
        $this->validate([
            'state.step2.countries' => 'required|array|min:1|max:3',
            'state.step2.countries.*' => 'string',
        ], [
            'state.step2.countries.required' => __('investor.validation.step2.countries'),
        ]);
    }
}
