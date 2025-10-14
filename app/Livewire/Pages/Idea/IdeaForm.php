<?php

namespace App\Livewire\Pages\Idea;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class IdeaForm extends Component
{

    public int $currentStep = 10;
    public int $totalSteps = 10;

    public function nextStep()
    {
        $this->dispatch("validate-step-{$this->currentStep}");
    }

    #[On('go-to-next-step')]
    public function goToNextStep()
    {
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

    public function finish()
    {
        session()->forget('current_idea_id');

        $this->currentStep = 1;

        return $this->redirect('/', navigate: true);
    }

    #[Title('Submit Your Idea')]
    public function render()
    {
        return view('livewire.pages.idea.idea-form');
    }
}
