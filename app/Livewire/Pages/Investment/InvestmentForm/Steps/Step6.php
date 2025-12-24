<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Traits\HandlesAttachmentUpload;

class Step6 extends Component
{
    use WithFileUploads, HandlesAttachmentUpload;

    #[Validate([
        'data.investor_title' => 'required|string|max:200',
        'data.summary' => 'required|string|max:2000',
        'data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240', // 10MB max
    ])]
    public array $data = [
        'investor_title' => null,
        'summary' => null,
        'attachment' => null,
        'created_at' => null,
    ];

    public $currentAttachment = null; // real file name

    public function mount(): void
    {
        $investorId = session('current_investor_id');
        if (!$investorId) return;

        $investor = Investor::with('attachments')->find($investorId);
        if (!$investor) return;

        $this->data['summary'] = $investor?->summary;
        $this->data['investor_title'] = $investor?->title;

        // Load current attachment name if exists, or use default name
        $this->currentAttachment = $investor->attachments()->first()?->original_name ?? 'Uploaded File';

        // Ensure $data['attachment'] is reset to avoid stale file references
        $this->data['attachment'] = null;
    }

    #[On('validate-step-6')]
    public function validateStep6()
    {
        $this->validate();

        $this->syncData();

        $this->dispatch('go-to-next-step');
    }
    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step6');
    }

    public function messages()
    {
        return [
            'data.investor_title.required' => __('investor.validation.step6.investor_title_required'),
            'data.investor_title.string'   => __('investor.validation.step6.investor_title_string'),
            'data.investor_title.max'      => __('investor.validation.step6.investor_title_max'),

            'data.summary.required' => __('investor.validation.step6.summary_required'),
            'data.summary.string'   => __('investor.validation.step6.summary_string'),
            'data.summary.max'      => __('investor.validation.step6.summary_max'),

            'data.attachment.file'  => __('investor.validation.step6.attachments_file'),
            'data.attachment.mimes' => __('investor.validation.step6.attachments_mimes'),
            'data.attachment.max'   => __('investor.validation.step6.attachments_max'),
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
            'title' => $this->data['investor_title'],
            'summary' => $this->data['summary'],
            'user_id' => Auth::id(),
            'created_at' => $this->data['created_at'],
        ]);

        //! store attachments
        $this->handleAttachmentUpload($investor, $this->data['attachment']);

        // Update current attachment name after upload
        $this->currentAttachment = $investor->attachments()->first()?->original_name;
    }
}
