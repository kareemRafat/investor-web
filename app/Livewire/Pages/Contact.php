<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Title;


class Contact extends Component
{
    #[Title('Contact us')]
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
