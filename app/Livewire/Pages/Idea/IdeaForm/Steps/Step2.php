<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step2 extends Component
{

    #[Validate([
        'countries'   => 'required|array|size:3',
        'countries.*' => 'string',
    ])]
    public array $countries = [];

    public array $options = [];

    public function mount(): void
    {
        $this->options = __('idea.steps.step2.options');
    }

    #[On('validate-step-2')]
    public function validateStep2()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step2');
    }
}
