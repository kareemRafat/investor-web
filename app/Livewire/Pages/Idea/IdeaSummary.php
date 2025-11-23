<?php

namespace App\Livewire\Pages\Idea;

use Livewire\Component;
use Livewire\Attributes\Title;

class IdeaSummary extends Component
{
    #[Title('Ideas Summary')]
    public function render()
    {
        return view('livewire.pages.idea.idea-summary');
    }
}
