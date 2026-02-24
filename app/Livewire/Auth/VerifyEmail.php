<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class VerifyEmail extends Component
{
    #[Title('Verify Email')]
    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
