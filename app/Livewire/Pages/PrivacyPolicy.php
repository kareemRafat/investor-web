<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    #[Title('Privacy Policy')]
    public function render()
    {
        return view('livewire.pages.privacy-policy');
    }
}
