<?php

namespace App\Livewire\Pages\Investment;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class InvestmentForm extends Component
{
    public int $currentStep = 1;
    public int $maxAllowedStep = 1;
    public int $totalSteps = 6;

    public function nextStep()
    {
        $this->dispatch("validate-step-{$this->currentStep}");
    }

    #[On('go-to-next-step')]
    public function goToNextStep()
    {
        if ($this->maxAllowedStep < $this->totalSteps) {
            $this->maxAllowedStep++;
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function goToStep(int $step)
    {
        if ($step <= $this->maxAllowedStep) {
            $this->currentStep = $step;
        }
    }


    public function finish()
    {
        session()->forget('current_investor_id');

        $this->currentStep = 1;
        $this->maxAllowedStep = 1;

        return $this->redirect('/', navigate: true);
    }

    #[Title('Find Investor')]
    public function render()
    {
        return view('livewire.pages.investment.investment-form');
    }
}
