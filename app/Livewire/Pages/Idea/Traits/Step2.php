<?php

namespace App\Livewire\Pages\Idea\Traits;

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
        $this->validate([
            'state.step2.countries' => 'required|array|min:1|max:3',
            'state.step2.countries.*' => 'string',
        ], [
            'state.step2.countries.required' => __('idea.validation.step2.countries'),
        ]);
    }
}
