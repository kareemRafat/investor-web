<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.blank')]
class LandingTerms extends Component
{
    #[Title('Terms of Use')]
    public function render()
    {
        return view('livewire.pages.landing-terms');
    }
}
