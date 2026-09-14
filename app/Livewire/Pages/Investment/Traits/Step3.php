<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Livewire\Forms\Investment\Step3Form;
use App\Models\InvestorResource;

trait Step3
{
    public function initStep3()
    {
        $investorId = session('current_investor_id');
        if ($investorId) {
            $resource = InvestorResource::where('investor_id', $investorId)->first();
            if ($resource) {
                $this->state['step3']['data'] = array_merge($this->state['step3']['data'], $resource->toArray());

                if (
                    is_null($resource->company)
                    && is_null($resource->staff)
                    && is_null($resource->workers)
                    && is_null($resource->executive_spaces)
                    && is_null($resource->equipment)
                    && is_null($resource->software)
                    && is_null($resource->website)
                ) {
                    $this->state['step3']['disableResources'] = true;
                }
            }
        }
    }

    public function updatedStateStep3DisableResources($value)
    {
        if ($value) {
            $this->state['step3']['data'] = collect($this->state['step3']['data'])
                ->map(fn ($v, $k) => null)
                ->toArray();
        }
    }

    public function validateStep3()
    {
        if (! $this->state['step3']['disableResources']) {
            $this->validate(Step3Form::rules(), Step3Form::messages());
        }
    }
}
