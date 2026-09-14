<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Livewire\Forms\Idea\Step6Form;
use App\Models\Idea;

trait Step6
{
    public function initStep6()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $expenses = $idea->expenses()->first();
                if ($expenses) {
                    $this->state['step6']['data'] = array_merge(
                        $this->state['step6']['data'],
                        $expenses->only(array_keys($this->state['step6']['data']))
                    );
                }
            }
        }
    }

    public function validateStep6()
    {
        $this->validate(Step6Form::rules(), Step6Form::messages());

        $total = array_sum($this->state['step6']['data']);
        if ($total !== 100) {
            $this->addError('state.step6.total', __('idea.steps.step6.must_equal'));
            throw \Illuminate\Validation\ValidationException::withMessages([
                'state.step6.total' => __('idea.steps.step6.must_equal'),
            ]);
        }
    }
}
