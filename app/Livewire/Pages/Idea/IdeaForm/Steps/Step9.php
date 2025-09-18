<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Step9 extends Component
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
        $ideaId = session('current_idea_id');
        if (!$ideaId) return;

        $idea = Idea::find($ideaId);
        if (!$idea) return;

        $this->data['summary'] = $idea->summary->summary;// get summary from summary() relationship
        $this->data['visibility'] = $idea->visibility;

        if (!empty($idea->attachments)) {
            $this->data['attachments'] = $idea->attachments;
        }
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

            'data.attachments.*.file'  => __('idea.validation.step9.attachments_file'),
            'data.attachments.*.mimes' => __('idea.validation.step9.attachments_mimes'),
            'data.attachments.*.max'   => __('idea.validation.step9.attachments_max'),

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

        // تخزين الملفات الجديدة في storage
        if (!empty($this->data['attachments'])) {
            $stored = [];
            foreach ($this->data['attachments'] as $file) {
                if ($file instanceof TemporaryUploadedFile) {
                    $stored[] = $file->store('idea_attachments', 'public');
                } else {
                    $stored[] = $file; // إذا كان ملف موجود مسبقًا
                }
            }
            $this->data['attachments'] = $stored;
        }

        // DB sync
        $idea->summary()->updateOrCreate(
            ['idea_id' => $ideaId],
            $this->data
        );

        $idea->update([
            'visibility' => $this->data['visibility'],
        ]);
    }
}
