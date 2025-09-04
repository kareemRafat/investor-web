<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class VerifyEmail extends Component
{
    #[Title('Verify Email')]
    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
