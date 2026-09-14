<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Livewire\Forms\Idea\Step1Form;
use App\Models\Idea;

trait Step1
{
    public function initStep1()
    {
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
        $this->validate(Step1Form::rules(), Step1Form::messages());
    }
}
