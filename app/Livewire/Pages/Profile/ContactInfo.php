<?php

namespace App\Livewire\Pages\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.profile')]
class ContactInfo extends Component
{
    public function render()
    {
        return view('livewire.pages.profile.contact-info');
    }
}
