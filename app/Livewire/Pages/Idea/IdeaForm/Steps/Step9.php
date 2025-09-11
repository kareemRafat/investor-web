<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class Step9 extends Component
{
    use WithFileUploads;

    #[Validate([
        'data.summary' => 'required|string|max:2000',
        'data.attachments.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240', // 10MB max per file
    ])]
    public array $data = [
        'summary' => null,
        'attachments' => [],
    ];

    #[On('validate-step-9')]
    public function validateStep9()
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
        return view('livewire.pages.idea.idea-form.steps.step9');
    }
}
