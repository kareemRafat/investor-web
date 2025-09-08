<?php

namespace App\Livewire\Pages\Idea;

use Livewire\Component;
use Livewire\Attributes\Title;

class IdeaForm extends Component
{

    public int $currentStep = 1;
    public int $totalSteps = 10;

    public function nextStep()
    {
        // $this->validateStep();
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


    #[Title('Submit Your Idea')]
    public function render()
    {
        return view('livewire.pages.idea.idea-form');
    }
}
