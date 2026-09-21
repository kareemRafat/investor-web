<?php

namespace App\Livewire\Pages\Landing;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.blank')]
class LandingPrivacy extends Component
{
    #[Title('Privacy Policy')]
    public function render()
    {
        return view('livewire.pages.landing.landing-privacy');
    }
}
