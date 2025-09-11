<?php

namespace App\Livewire\Pages\Idea;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class IdeaForm extends Component
{

    public int $currentStep = 4 ;
    public int $totalSteps = 10 ;

    public function nextStep()
    {
        $this->dispatch("validate-step-{$this->currentStep}");
    }

    #[On('go-to-next-step')]
    public function goToNextStep()
    {
        // dd('test');
        if ($this->currentStep < 10) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    #[Title('Submit Your Idea')]
    public function render()
    {
        return view('livewire.pages.idea.idea-form');
    }
}
