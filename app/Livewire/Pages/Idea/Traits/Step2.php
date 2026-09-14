<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Livewire\Forms\Idea\Step2Form;
use App\Models\Idea;

trait Step2
{
    public function initStep2()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $this->state['step2']['countries'] = Idea::find($ideaId)
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
