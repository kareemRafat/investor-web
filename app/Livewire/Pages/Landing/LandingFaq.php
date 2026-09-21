<?php

namespace App\Livewire\Pages\Landing;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.blank')]
class LandingFaq extends Component
{
    #[Title('FAQ')]
    public function render()
    {
        return view('livewire.pages.landing.landing-faq');
    }
}
