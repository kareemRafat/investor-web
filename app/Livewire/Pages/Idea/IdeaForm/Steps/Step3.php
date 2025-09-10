<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step3 extends Component
{
    #[Validate([
        'cost_type'  => 'required|in:one-time,annual',
        'cost_range' => 'required|string',
    ])]
    public ?string $cost_type = null;
    public ?string $cost_range = null;

    public function updatedCostRange($value)
    {
        if (str_starts_with($value, 'one-time')) {
            $this->cost_type = 'one-time';
        }

        if (str_starts_with($value, 'annual')) {
            $this->cost_type = 'annual';
        }
    }

    #[On('validate-step-3')]
    public function validateStep3()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step3');
    }
}
