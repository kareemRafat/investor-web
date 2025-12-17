<?php

namespace App\Livewire\Pages\Investment;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Log;

class InvestmentForm extends Component
{
    public int $currentStep = 4;
    public int $maxAllowedStep = 1;

    public int $totalSteps = 7;

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

    public function handleNextAction()
    {
        Log::info('handleNextAction called', ['currentStep' => $this->currentStep, 'totalSteps' => $this->totalSteps]);

        if ($this->currentStep === $this->totalSteps) {
            return $this->finish();
        } else {
            return $this->nextStep();
        }
    }

    public function finish()
    {
        $InvestorId = session('current_investor_id');

        session()->forget('current_investor_id');

        $this->currentStep = 1;
        $this->maxAllowedStep = 1;

        return $this->redirect(
            route('investor.summary', ['investment' => $InvestorId]),
            navigate: true
        );
    }

    #[Title('Find Investor')]
    public function render()
    {
        return view('livewire.pages.investment.investment-form');
    }
}
