<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Step7 extends Component
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

    #[On('validate-step-7')]
    public function validateStep7()
    {
        $this->validate();

        // لو النوع Personal أو Both لازم الإجمالي = 100%
        if (
            in_array($this->data['contribute_type'], ['personal', 'both']) &&
            (($this->data['money_percent'] ?? 0) + ($this->data['person_money_percent'] ?? 0)) !== 100
        ) {
            $this->addError('total', __('idea.steps.step7.total_error'));
            return;
        }

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step7');
    }

    public function messages()
    {
        return [
            // step7
            'data.contribute_type.*'     => __('idea.validation.step7.contribute_type'),
            'data.staff.*'               => __('idea.validation.step7.staff'),
            'data.staff_person_money.*'  => __('idea.validation.step7.staff_person_money'),
            'data.money_amount.*'        => __('idea.validation.step7.money_amount'),
            'data.money_percent.*'       => __('idea.validation.step7.money_percent'),
            'data.person_money_amount.*' => __('idea.validation.step7.person_money_amount'),
            'data.person_money_percent.*' => __('idea.validation.step7.person_money_percent'),
        ];
    }
}
