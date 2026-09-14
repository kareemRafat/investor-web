<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Livewire\Forms\Idea\Step7Form;
use App\Models\Idea;

trait Step7
{
    public function initStep7()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $contribution = $idea->contributions()->first();
                if ($contribution) {
                    $this->state['step7']['data'] = array_merge(
                        $this->state['step7']['data'],
                        $contribution->only(array_keys($this->state['step7']['data']))
                    );
                }
            }
        }
    }

    public function validateStep7()
    {
        $data = $this->state['step7']['data'];

        $this->validate(
            Step7Form::rules(is_array($data) ? $data : []),
            Step7Form::messages()
        );
    }
}
