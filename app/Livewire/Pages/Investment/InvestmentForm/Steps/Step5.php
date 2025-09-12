<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Step5 extends Component
{
    use WithFileUploads;

    #[Validate([
        'data.summary' => 'required|string|max:2000',
        'data.attachments.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240', // 10MB max per file
        'data.visibility' => 'required|in:public,private',
    ])]
    public array $data = [
        'summary' => null,
        'attachments' => [],
    ];

    #[On('validate-step-5')]
    public function validateStep5()
    {
        $this->validate();

        // لو عايز تخزن المرفقات في storage
        if (!empty($this->data['attachments'])) {
            $stored = [];
            foreach ($this->data['attachments'] as $file) {
                $stored[] = $file->store('idea_attachments', 'public');
            }
            $this->data['attachments'] = $stored;
        }

        $this->dispatch('go-to-next-step');
    }
    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step5');
    }

    public function messages()
    {
        return [
            'data.summary.required' => __('investor.validation.step5.summary_required'),
            'data.summary.string'   => __('investor.validation.step5.summary_string'),
            'data.summary.max'      => __('investor.validation.step5.summary_max'),

            'data.attachments.*.file'  => __('investor.validation.step5.attachments_file'),
            'data.attachments.*.mimes' => __('investor.validation.step5.attachments_mimes'),
            'data.attachments.*.max'   => __('investor.validation.step5.attachments_max'),

            'data.visibility.required' => __('investor.validation.step5.visibility_required'),
            'data.visibility.in'       => __('investor.validation.step5.visibility_in'),

        ];
    }
}
