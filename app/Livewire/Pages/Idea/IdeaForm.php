<?php

namespace App\Livewire\Pages\Idea;

use Livewire\Component;
use Livewire\Attributes\Title;

class IdeaForm extends Component
{
    #[Title('Submit Your Idea')]
    public function render()
    {
        return view('livewire.pages.idea.idea-form');
    }
}
