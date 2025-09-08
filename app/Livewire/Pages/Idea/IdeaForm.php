<?php

namespace App\Livewire\Pages\Idea;

use Livewire\Component;

class IdeaForm extends Component
{
    #[Title('Submit Your Idea')]
    public function render()
    {
        return view('livewire.pages.idea.idea-form');
    }
}
