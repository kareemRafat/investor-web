<?php

namespace App\Livewire\Pages\Investment\Traits;

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
            $this->validate([
                'state.step3.data.company' => 'required|in:yes,no',
                'state.step3.data.space_type' => 'required_if:state.step3.data.company,yes|nullable|in:large,small',
                'state.step3.data.staff' => 'required|in:yes,no',
                'state.step3.data.staff_number' => 'required_if:state.step3.data.staff,yes|nullable|integer|min:1',
                'state.step3.data.workers' => 'required|in:yes,no',
                'state.step3.data.workers_number' => 'required_if:state.step3.data.workers,yes|nullable|integer|min:1',
                'state.step3.data.executive_spaces' => 'required|in:yes,no',
                'state.step3.data.executive_spaces_type' => 'required_if:state.step3.data.executive_spaces,yes|nullable|in:open_spaces,factory,land_space',
                'state.step3.data.equipment' => 'required|in:yes,no',
                'state.step3.data.equipment_type' => 'required_if:state.step3.data.equipment,yes|nullable|in:industrial,electronic,other',
                'state.step3.data.software' => 'required|in:yes,no',
                'state.step3.data.software_type' => 'required_if:state.step3.data.software,yes|nullable|in:static,dynamic',
                'state.step3.data.website' => 'required|in:yes,no',
            ], [
                'state.step3.data.company.*' => __('idea.validation.step5.company'),
                'state.step3.data.space_type.*' => __('idea.validation.step5.space_type'),
                'state.step3.data.staff.*' => __('idea.validation.step5.staff'),
                'state.step3.data.staff_number.*' => __('idea.validation.step5.staff_number'),
                'state.step3.data.workers.*' => __('idea.validation.step5.workers'),
                'state.step3.data.workers_number.*' => __('idea.validation.step5.workers_number'),
                'state.step3.data.executive_spaces.*' => __('idea.validation.step5.executive_spaces'),
                'state.step3.data.executive_spaces_type.*' => __('idea.validation.step5.executive_spaces_type'),
                'state.step3.data.equipment.*' => __('idea.validation.step5.equipment'),
                'state.step3.data.equipment_type.*' => __('idea.validation.step5.equipment_type'),
                'state.step3.data.software.*' => __('idea.validation.step5.software'),
                'state.step3.data.software_type.*' => __('idea.validation.step5.software_type'),
                'state.step3.data.website.*' => __('idea.validation.step5.website'),
            ]);
        }
    }
}
