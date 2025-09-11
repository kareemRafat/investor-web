<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Step6 extends Component
{
    #[Validate([
        'data.company' => 'required|numeric|min:0|max:100',
        'data.assets' => 'required|numeric|min:0|max:100',
        'data.salaries' => 'required|numeric|min:0|max:100',
        'data.operating' => 'required|numeric|min:0|max:100',
        'data.other' => 'required|numeric|min:0|max:100',
    ])]
    public array $data = [
        'company' => null,
        'assets' => null,
        'salaries' => null,
        'operating' => null,
        'other' => null,
    ];

    #[On('validate-step-6')]
    public function validateStep6()
    {
        $this->validate();

        // all numbers inserted must be 100%
        $total = array_sum($this->data);
        if ($total !== 100) {
            $this->addError('total', 'The total distribution must equal 100%.');
            return;
        }

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step6');
    }
}
