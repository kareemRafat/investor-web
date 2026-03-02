<?php

namespace App\Livewire\Pages\Investment\Traits;

trait Step7
{
    public function initStep7()
    {
        // For now, let's keep it reading from the model if we still sync intermediate steps,
        // but the goal is to use $state.
        // However, Step 7 is a summary of EVERYTHING.
        // If we want to be truly deferred, we'd need a way to "preview" without saving.
    }

    public function getSummaryDataProperty()
    {
        // This will be used by the summary view to get labels from $state
        return [
            'step1' => [
                'field_label' => $this->state['step1']['investorField']
                    ? __('investor.steps.step1.options.'.$this->state['step1']['investorField'])
                    : '-',
            ],
            // ... and so on
        ];
    }
}
