<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step2 extends Component
{
    #[Validate([
        'countries'   => 'required|array|min:1|max:3',
        'countries.*' => 'string',
    ])]
    public array $countries = [];

    public array $options = [];

    public function mount(): void
    {
        $this->options = __('investor.steps.step2.options');
    }

    #[On('validate-step-2')]
    public function validateStep2()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step2');
    }

    public function messages()
    {
        return [
            'countries.required' => __('investor.validation.step2.countries'),
        ];
    }
}
