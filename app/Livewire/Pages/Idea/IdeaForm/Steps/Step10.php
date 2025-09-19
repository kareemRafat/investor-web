<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;

class Step10 extends Component
{
    public $idea;

    public function mount()
    {
        $ideaId = session('current_idea_id');

        $this->idea = Idea::with([
            'countries',
            'costs',
            'profits',
            'resources',
            'expenses',
            'contributions',
            'returns',
            'summary',
            'attachments',
        ])->findOrFail($ideaId);
    }
    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step10', [
            'idea' => $this->idea,
        ]);
    }
}
