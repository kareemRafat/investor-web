<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use App\Traits\HandlesAttachmentUpload;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Step9 extends Component
{
    use WithFileUploads , HandlesAttachmentUpload;

    #[Validate([
        'data.summary' => 'required|string|max:2000',
        'data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240', // 10MB max per file
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
        $ideaId = session('current_idea_id');
        if (!$ideaId) return;

        $idea = Idea::with('attachments')->find($ideaId);
        if (!$idea) return;

        $this->data['summary'] = $idea?->summary;
        $this->data['visibility'] = $idea->visibility;

        // Load current attachment name if exists, or use default name
        $this->currentAttachment = $idea->attachments()->first()?->original_name ?? 'Uploaded File';

        // Ensure $data['attachment'] is reset to avoid stale file references
        $this->data['attachment'] = null;
    }

    #[On('validate-step-9')]
    public function validateStep9()
    {
        $this->validate();

        $this->syncData();

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step9');
    }

    public function messages()
    {
        return [
            'data.summary.required' => __('idea.validation.step9.summary_required'),
            'data.summary.string'   => __('idea.validation.step9.summary_string'),
            'data.summary.max'      => __('idea.validation.step9.summary_max'),

            'data.attachment.file'  => __('idea.validation.step9.attachments_file'),
            'data.attachment.mimes' => __('idea.validation.step9.attachments_mimes'),
            'data.attachment.max'   => __('idea.validation.step9.attachments_max'),

            'data.visibility.required' => __('investor.validation.step5.visibility_required'),
            'data.visibility.in'       => __('investor.validation.step5.visibility_in'),
        ];
    }

    private function syncData(): void
    {
        $ideaId = session('current_idea_id');
        if (!$ideaId) return;

        $idea = Idea::find($ideaId);
        if (!$idea) return;

        // DB sync
        $idea->update([
            'summary' => $this->data['summary'],
        ]);

        $idea->update([
            'visibility' => $this->data['visibility'],
        ]);

        //! store attachments
        $this->handleAttachmentUpload($idea, $this->data['attachment']);

        // Update current attachment name after upload
        $this->currentAttachment = $idea->attachments()->first()?->original_name;
    }
}
