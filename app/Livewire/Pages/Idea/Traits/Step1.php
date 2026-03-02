<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Models\Idea;

trait Step1
{
    public function initStep1()
    {
        $this->state['step1']['ideaOptions'] = __('idea.steps.step1.options');

        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $this->state['step1']['ideaField'] = $idea->idea_field;
            }
        }
    }

    public function validateStep1()
    {
        $this->validate([
            'state.step1.ideaField' => 'required',
        ], [
            'state.step1.ideaField.required' => __('idea.validation.step1.idea_field'),
        ]);
    }
}
