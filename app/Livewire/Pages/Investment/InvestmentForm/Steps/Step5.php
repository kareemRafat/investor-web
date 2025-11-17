<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;

class Step5 extends Component
{
    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step5');
    }

    #[On('validate-step-5')]
    public function validateStep5()
    {
        // $this->validate();

        // $this->syncContribution();

        $this->dispatch('go-to-next-step');
    }
}
