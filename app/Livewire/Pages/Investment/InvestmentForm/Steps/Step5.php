<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
        'visibility' => null,
    ];


    public function mount(): void
    {
        $investorId = session('current_investor_id');
        if (!$investorId) return;

        $investor = Investor::find($investorId);
        if (!$investor) return;
        $this->data['summary'] = $investor->summary->summary; // get summary from summary() relationship
        $this->data['visibility'] = $investor->visibility;

    }


    #[On('validate-step-5')]
    public function validateStep5()
    {
        $this->validate();

        $this->syncData();

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

    private function syncData(): void
    {
        $investorId = session('current_investor_id');
        if (!$investorId) return;

        $investor = Investor::find($investorId);
        if (!$investor) return;

        //! store attachments

        // DB sync
        $investor->summary()->updateOrCreate(
            ['investor_id' => $investorId],
            $this->data
        );

        $investor->update([
            'visibility' => $this->data['visibility'],
        ]);
    }
}
