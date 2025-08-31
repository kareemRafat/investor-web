<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    #[Title('Register')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
