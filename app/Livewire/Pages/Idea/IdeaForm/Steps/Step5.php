<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Step5 extends Component
{
    #[Validate([
        'data.company' => 'required|in:yes,no',
        'data.space_type' => 'in:large,small',
        'data.staff' => 'required|in:yes,no',
        'data.staff_number' => 'required|integer|min:1',
        'data.workers' => 'required|in:yes,no',
        'data.workers_number' => 'required|integer|min:1',
        'data.executive_spaces' => 'required|in:yes,no',
        'data.executive_spaces_type' => 'required|in:open_spaces,factory,land_space',
        'data.equipment' => 'required|in:yes,no',
        'data.equipment_type' => 'required|in:industrial,electronic,other',
        'data.software' => 'required|in:yes,no',
        'data.software_type' => 'required|in:static,dynamic',
        'data.website' => 'required|in:yes,no',
    ])]
    public array $data = [
        'company' => null,
        'space_type' => null,
        'staff' => null,
        'staff_number' => null,
        'workers' => null,
        'workers_number' => null,
        'executive_spaces' => null,
        'executive_spaces_type' => null,
        'equipment' => null,
        'equipment_type' => null,
        'software' => null,
        'software_type' => null,
        'website' => null,
    ];

    #[On('validate-step-5')]
    public function validateStep5()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step5');
    }
}
