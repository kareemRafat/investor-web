<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step1 extends Component
{

    #[Validate('required')]
    public $investorField;

    public array $investorOptions = [];

    public function mount()
    {
        $this->investorOptions = __('investor.steps.step1.options');
    }

    #[On('validate-step-1')]
    public function validateStep1()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step1');
    }

    public function messages()
    {
        return [
            'investorField.required' => __('investor.validation.step1.investor_field'),
        ];
    }
}
