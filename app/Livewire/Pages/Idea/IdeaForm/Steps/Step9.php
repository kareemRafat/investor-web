<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use App\Traits\HandlesAttachmentUpload;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Step9 extends Component
{
    use HandlesAttachmentUpload, WithFileUploads;

    #[Validate([
        'data.idea_title' => 'required|string|max:255',
        'data.summary' => 'required|string|max:2000',
        'data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240', // 10MB max per file
        'data.contact_visibility' => 'required|in:open,closed',
    ])]
    public array $data = [
        'idea_title' => null,
        'summary' => null,
        'attachment' => null,
        'created_at' => null,
        'contact_visibility' => 'closed',
    ];

    public $currentAttachment = null; // real file name

    public $job_title;
    public $phone;
    public $residence_country;
    public $birth_date;
    public bool $showProfileFields = false;

    public function mount(): void
    {
        $user = auth()->user();
        if (! $user->hasCompleteProfile()) {
            $this->showProfileFields = true;
            $this->job_title = $user->job_title;
            $this->phone = $user->phone;
            $this->residence_country = $user->residence_country;
            $this->birth_date = $user->birth_date;
        }

        $ideaId = session('current_idea_id');
        if (! $ideaId) {
            return;
        }

        $idea = Idea::with('attachments')->find($ideaId);
        if (! $idea) {
            return;
        }

        $this->data['summary'] = $idea?->summary;
        $this->data['idea_title'] = $idea?->title;

        // Load current attachment name if exists, or use default name
        $this->currentAttachment = $idea->attachments()->first()?->original_name ?? 'Uploaded File';

        $this->data['contact_visibility'] = $idea?->contact_visibility?->value ?? 'closed';

        // Ensure $data['attachment'] is reset to avoid stale file references
        $this->data['attachment'] = null;
    }

    #[On('validate-step-9')]
    public function validateStep9()
    {
        $user = auth()->user();

        // Block Free users from choosing Open
        if ($this->data['contact_visibility'] === 'open' && $user->plan_type === \App\Enums\PlanType::FREE) {
            $this->addError('data.contact_visibility', __('idea.steps.step9.upgrade_required_for_open'));

            return;
        }

        $this->validate();

        if ($this->showProfileFields) {
            $this->validate([
                'job_title' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'residence_country' => 'required|string|max:255',
                'birth_date' => 'required|date|before:today',
            ]);

            $user->update([
                'job_title' => $this->job_title,
                'phone' => $this->phone,
                'residence_country' => $this->residence_country,
                'birth_date' => $this->birth_date,
            ]);
        }

        // Check if we need to deduct a credit (Option B)
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea && $idea->contact_visibility?->value === 'closed' && $this->data['contact_visibility'] === 'open') {
                if ($user->contact_credits < 1) {
                    $this->addError('data.contact_visibility', __('pages.unlock_contact.error_no_credits'));

                    return;
                }
            }
        }

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
            'data.idea_title.required' => __('idea.validation.step9.idea_title_required'),
            'data.idea_title.string' => __('idea.validation.step9.idea_title_string'),
            'data.idea_title.max' => __('idea.validation.step9.idea_title_max'),

            'data.summary.required' => __('idea.validation.step9.summary_required'),
            'data.summary.string' => __('idea.validation.step9.summary_string'),
            'data.summary.max' => __('idea.validation.step9.summary_max'),

            'data.attachment.file' => __('idea.validation.step9.attachments_file'),
            'data.attachment.mimes' => __('idea.validation.step9.attachments_mimes'),
            'data.attachment.max' => __('idea.validation.step9.attachments_max'),

        ];
    }

    private function syncData(): void
    {
        $ideaId = session('current_idea_id');
        if (! $ideaId) {
            return;
        }

        $idea = Idea::find($ideaId);
        if (! $idea) {
            return;
        }

        $user = auth()->user();
        $newVisibility = $this->data['contact_visibility'];

        // If changing from closed to open, mark for deduction on finish
        if ($idea->contact_visibility?->value === 'closed' && $newVisibility === 'open') {
            session(['pending_idea_visibility_credit' => true]);
        } elseif ($newVisibility === 'closed') {
            // Reset if user changed their mind back to closed
            session()->forget('pending_idea_visibility_credit');
        }

        // DB sync (without decrementing credit yet)
        $idea->update([
            'title' => $this->data['idea_title'],
            'summary' => $this->data['summary'],
            'user_id' => $user->id,
            'contact_visibility' => $newVisibility,
            'created_at' => $this->data['created_at'],
        ]);

        // ! store attachments
        $this->handleAttachmentUpload($idea, $this->data['attachment']);

        // Update current attachment name after upload
        $this->currentAttachment = $idea->attachments()->first()?->original_name;
    }
}
