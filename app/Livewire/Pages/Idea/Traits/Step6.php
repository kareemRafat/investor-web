<?php

namespace App\Livewire\Pages\Idea\Traits;

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
        $this->validate([
            'state.step6.data.company' => 'required|numeric|min:0|max:100',
            'state.step6.data.assets' => 'required|numeric|min:0|max:100',
            'state.step6.data.salaries' => 'required|numeric|min:0|max:100',
            'state.step6.data.operating' => 'required|numeric|min:0|max:100',
            'state.step6.data.other' => 'required|numeric|min:0|max:100',
        ], [
            'state.step6.data.company.*' => __('idea.validation.step6.company'),
            'state.step6.data.assets.*' => __('idea.validation.step6.assets'),
            'state.step6.data.salaries.*' => __('idea.validation.step6.salaries'),
            'state.step6.data.operating.*' => __('idea.validation.step6.operating'),
            'state.step6.data.other.*' => __('idea.validation.step6.other'),
        ]);

        $total = array_sum($this->state['step6']['data']);
        if ($total !== 100) {
            $this->addError('state.step6.total', __('idea.steps.step6.must_equal'));
            throw \Illuminate\Validation\ValidationException::withMessages([
                'state.step6.total' => __('idea.steps.step6.must_equal'),
            ]);
        }
    }
}
