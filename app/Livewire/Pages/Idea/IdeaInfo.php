<?php

namespace App\Livewire\Pages\Idea;

use App\Models\Idea;
use Livewire\Component;

class IdeaInfo extends Component
{
    public $idea;

    public function mount()
    {
        $ideaId = request()->idea;

        $this->idea = Idea::with([
            'countries',
            'costs',
            'profits',
            'resources',
            'expenses',
            'contributions',
            'returns',
            'attachments',
        ])->findOrFail($ideaId);
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-info', [
            'idea' => $this->idea,
        ]);
    }
}
