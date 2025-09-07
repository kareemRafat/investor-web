<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class FAQ extends Component
{
    #[Title('FAQ')]
    public function render()
    {
        return view('livewire.pages.faq');
    }
}
