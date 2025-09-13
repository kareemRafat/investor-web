<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step4 extends Component
{
    #[Validate([
        'data.contribute_type' => 'required|in:sell,idea,capital,personal,both',
        'data.staff' => 'required_if:data.contribute_type,capital|nullable|in:full_time,part_time,supervision',
        'data.money_amount' => 'required_if:data.contribute_type,personal|nullable|numeric|min:1',
        'data.money_percent' => 'required_if:data.contribute_type,personal|nullable|numeric|min:1|max:100',
        'data.person_money_amount' => 'required_if:data.contribute_type,both|nullable|numeric|min:1',
        'data.person_money_percent' => 'required_if:data.contribute_type,both|nullable|numeric|min:1|max:100',
        'data.staff_person_money' => 'required_if:data.contribute_type,both|nullable|in:full_time,part_time,supervision',
    ])]
    public array $data = [
        'contribute_type' => null,
        'staff' => null,
        'staff_person_money' => null,
        'money_amount' => null,
        'money_percent' => null,
        'person_money_amount' => null,
        'person_money_percent' => null,
    ];


    #[On('validate-step-4')]
    public function validateStep4()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step4');
    }

    public function messages()
    {
        return [
            'data.contribute_type.*'     => __('investor.validation.step4.contribute_type'),
            'data.staff.*'               => __('investor.validation.step4.staff'),
            'data.staff_person_money.*'  => __('investor.validation.step4.staff_person_money'),
            'data.money_amount.*'        => __('investor.validation.step4.money_amount'),
            'data.money_percent.*'       => __('investor.validation.step4.money_percent'),
            'data.person_money_amount.*' => __('investor.validation.step4.person_money_amount'),
            'data.person_money_percent.*' => __('investor.validation.step4.person_money_percent'),
        ];
    }
}
