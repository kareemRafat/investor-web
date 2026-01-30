<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.blank')]
class Landing extends Component
{
    public function render()
    {
        return view('livewire.pages.landing');
    }
}
