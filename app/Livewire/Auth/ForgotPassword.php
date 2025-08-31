<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class ForgotPassword extends Component
{
    #[Title('Forgot Password')]
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
