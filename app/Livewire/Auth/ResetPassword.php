<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class ResetPassword extends Component
{
    #[Title('Reset Password')]
    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
