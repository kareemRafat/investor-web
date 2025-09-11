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
        'data.staff_person_money' => 'required_if:data.contribute_type,both|nullable|in:full_time,part_time,supervision',
        'data.money_amount' => 'required_if:data.contribute_type,personal|nullable|numeric|min:1',
        'data.money_percent' => 'required_if:data.contribute_type,personal|nullable|numeric|min:1|max:100',
        'data.person_money_amount' => 'required_if:data.contribute_type,both|nullable|numeric|min:1',
        'data.person_money_percent' => 'required_if:data.contribute_type,both|nullable|numeric|min:1|max:100',
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
}
