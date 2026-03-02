<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Models\Idea;

trait Step5
{
    public function initStep5()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $resources = $idea->resources()->first();
                if ($resources) {
                    $this->state['step5']['data'] = array_merge(
                        $this->state['step5']['data'],
                        $resources->only(array_keys($this->state['step5']['data']))
                    );
                }
            }
        }
    }

    /**
     * Clear sub-fields when a toggle is changed to 'no'
     */
    public function updated($name, $value)
    {
        if ($value === 'no') {
            if ($name === 'state.step5.data.company') {
                $this->state['step5']['data']['space_type'] = null;
            }
            if ($name === 'state.step5.data.staff') {
                $this->state['step5']['data']['staff_number'] = null;
            }
            if ($name === 'state.step5.data.workers') {
                $this->state['step5']['data']['workers_number'] = null;
            }
            if ($name === 'state.step5.data.executive_spaces') {
                $this->state['step5']['data']['executive_spaces_type'] = null;
            }
            if ($name === 'state.step5.data.equipment') {
                $this->state['step5']['data']['equipment_type'] = null;
            }
            if ($name === 'state.step5.data.software') {
                $this->state['step5']['data']['software_type'] = null;
            }
        }
    }

    public function validateStep5()
    {
        $this->validate([
            'state.step5.data.company' => 'required|in:yes,no',
            'state.step5.data.space_type' => 'required_if:state.step5.data.company,yes|nullable|in:large,small',
            'state.step5.data.staff' => 'required|in:yes,no',
            'state.step5.data.staff_number' => 'required_if:state.step5.data.staff,yes|nullable|integer|min:1',
            'state.step5.data.workers' => 'required|in:yes,no',
            'state.step5.data.workers_number' => 'required_if:state.step5.data.workers,yes|nullable|integer|min:1',
            'state.step5.data.executive_spaces' => 'required|in:yes,no',
            'state.step5.data.executive_spaces_type' => 'required_if:state.step5.data.executive_spaces,yes|nullable|in:open_spaces,factory,land_space',
            'state.step5.data.equipment' => 'required|in:yes,no',
            'state.step5.data.equipment_type' => 'required_if:state.step5.data.equipment,yes|nullable|in:industrial,electronic,other',
            'state.step5.data.software' => 'required|in:yes,no',
            'state.step5.data.software_type' => 'required_if:state.step5.data.software,yes|nullable|in:static,dynamic',
            'state.step5.data.website' => 'required|in:yes,no',
        ], [
            // Standardizing error messages to match your lang file keys
            'state.step5.data.company.required' => __('idea.validation.step5.company'),
            'state.step5.data.staff.required' => __('idea.validation.step5.staff'),
            'state.step5.data.workers.required' => __('idea.validation.step5.workers'),
            'state.step5.data.executive_spaces.required' => __('idea.validation.step5.executive_spaces'),
            'state.step5.data.equipment.required' => __('idea.validation.step5.equipment'),
            'state.step5.data.software.required' => __('idea.validation.step5.software'),
            'state.step5.data.website.required' => __('idea.validation.step5.website'),

            'state.step5.data.staff_number.required_if' => __('idea.validation.step5.staff_number'),
            'state.step5.data.workers_number.required_if' => __('idea.validation.step5.workers_number'),
            'state.step5.data.space_type.required_if' => __('idea.validation.step5.space_type'),
            'state.step5.data.executive_spaces_type.required_if' => __('idea.validation.step5.executive_spaces_type'),
            'state.step5.data.equipment_type.required_if' => __('idea.validation.step5.equipment_type'),
            'state.step5.data.software_type.required_if' => __('idea.validation.step5.software_type'),
        ]);
    }
}
