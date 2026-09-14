<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Livewire\Forms\Idea\Step5Form;
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
        $this->validate(Step5Form::rules(), Step5Form::messages());
    }
}
