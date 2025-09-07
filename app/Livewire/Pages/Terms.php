<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class Terms extends Component
{
    #[Title('Terms of use')]
    public function render()
    {
        return view('livewire.pages.terms');
    }
}
