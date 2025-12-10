<?php

namespace App\Livewire\Pages\Profile;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.profile')]
class ContactInfo extends Component
{
    public function render()
    {
        return view('livewire.pages.profile.contact-info');
    }
}
