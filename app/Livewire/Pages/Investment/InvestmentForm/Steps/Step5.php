<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Traits\HandlesAttachmentUpload;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Step5 extends Component
{
    use WithFileUploads, HandlesAttachmentUpload;

    #[Validate([
        'data.summary' => 'required|string|max:2000',
        'data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240', // 10MB max
        'data.visibility' => 'required|in:public,private',
    ])]
    public array $data = [
        'summary' => null,
        'attachment' => null,
        'visibility' => null,
    ];

    public $currentAttachment = null; // real file name

    public function mount(): void
    {
        $investorId = session('current_investor_id');
        if (!$investorId) return;

        $investor = Investor::with('attachments')->find($investorId);
        if (!$investor) return;

        $this->data['summary'] = $investor?->summary;
        $this->data['visibility'] = $investor->visibility;

        // Load current attachment name if exists, or use default name
        $this->currentAttachment = $investor->attachments()->first()?->original_name ?? 'Uploaded File';

        // Ensure $data['attachment'] is reset to avoid stale file references
        $this->data['attachment'] = null;
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

            'data.attachment.file'  => __('investor.validation.step5.attachments_file'),
            'data.attachment.mimes' => __('investor.validation.step5.attachments_mimes'),
            'data.attachment.max'   => __('investor.validation.step5.attachments_max'),

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

        // DB sync
        $investor->update([
            'summary' => $this->data['summary'],
        ]);

        $investor->update([
            'visibility' => $this->data['visibility'],
        ]);

        //! store attachments
        $this->handleAttachmentUpload($investor, $this->data['attachment']);

        // Update current attachment name after upload
        $this->currentAttachment = $investor->attachments()->first()?->original_name;
    }
}
