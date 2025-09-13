<?php

namespace App\Livewire\Pages\Investment;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class InvestmentForm extends Component
{
    public int $currentStep = 1 ;
    public int $totalSteps = 5 ;

    public function nextStep()
    {
        $this->dispatch("validate-step-{$this->currentStep}");
    }

    #[On('go-to-next-step')]
    public function goToNextStep()
    {
        // dd('test');
        if ($this->currentStep < 5) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    #[Title('Find Investor')]
    public function render()
    {
        return view('livewire.pages.investment.investment-form');
    }
}
