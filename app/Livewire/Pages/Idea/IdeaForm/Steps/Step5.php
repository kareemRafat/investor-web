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
        'data.staff_number' => 'integer|min:1',
        'data.workers' => 'required|in:yes,no',
        'data.workers_number' => 'nullable|integer|min:1',
        'data.spaces' => 'required|in:yes,no',
        'data.factory_type' => 'nullable|in:open,factory,land',
        'data.equipment' => 'required|in:yes,no',
        'data.equipment_type' => 'nullable|in:industrial,electronic,other',
        'data.software' => 'required|in:yes,no',
        'data.software_type' => 'nullable|in:static,dynamic',
        'data.website' => 'required|in:yes,no',
    ])]
    public array $data = [
        'company' => null,
        'space_type' => null,
        'staff' => null,
        'staff_number' => null,
        'workers' => null,
        'workers_number' => null,
        'spaces' => null,
        'factory_type' => null,
        'equipment' => null,
        'equipment_type' => null,
        'software' => null,
        'software_type' => null,
        'website' => null,
    ];

    #[On('validate-step-5')]
    public function validateStep5()
    {
        dd(request()->toArray());
        $this->validate();
        dd(1231);
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step5');
    }
}
