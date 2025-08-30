<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.register');
    }
}
