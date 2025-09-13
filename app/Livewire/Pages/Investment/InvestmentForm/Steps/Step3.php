<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step3 extends Component
{
    #[Validate([
        'data.company' => 'required|in:yes,no',
        'data.space_type' => 'required_if:data.company,yes|nullable|in:large,small',
        'data.staff' => 'required|in:yes,no',
        'data.staff_number' => 'required_if:data.staff,yes|nullable|integer|min:1',
        'data.workers' => 'required|in:yes,no',
        'data.workers_number' => 'required_if:data.workers,yes|nullable|integer|min:1',
        'data.executive_spaces' => 'required|in:yes,no',
        'data.executive_spaces_type' => 'required_if:data.executive_spaces,yes|nullable|in:open_spaces,factory,land_space',
        'data.equipment' => 'required|in:yes,no',
        'data.equipment_type' => 'required_if:data.equipment,yes|nullable|in:industrial,electronic,other',
        'data.software' => 'required|in:yes,no',
        'data.software_type' => 'required_if:data.software,yes|nullable|in:static,dynamic',
        'data.website' => 'required|in:yes,no',
    ])]
    public array $data = [
        'company'         => null,
        'space_type'      => null,
        'staff'           => null,
        'number_staff'    => null,
        'workers'         => null,
        'number_workers'  => null,
        'spaces'          => null,
        'space_type_exec' => null,
        'equipment'       => null,
        'equipment_type'  => null,
        'software'        => null,
        'software_type'   => null,
        'website'         => null,
    ];

    #[On('validate-step-3')]
    public function validateStep3()
    {
        $this->validate();
        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step3');
    }

    public function messages()
    {
        return [
            // step5
            'data.company.*'               => __('idea.validation.step5.company'),
            'data.space_type.*'            => __('idea.validation.step5.space_type'),
            'data.staff.*'                 => __('idea.validation.step5.staff'),
            'data.staff_number.*'          => __('idea.validation.step5.staff_number'),
            'data.workers.*'               => __('idea.validation.step5.workers'),
            'data.workers_number.*'        => __('idea.validation.step5.workers_number'),
            'data.executive_spaces.*'      => __('idea.validation.step5.executive_spaces'),
            'data.executive_spaces_type.*' => __('idea.validation.step5.executive_spaces_type'),
            'data.equipment.*'             => __('idea.validation.step5.equipment'),
            'data.equipment_type.*'        => __('idea.validation.step5.equipment_type'),
            'data.software.*'              => __('idea.validation.step5.software'),
            'data.software_type.*'         => __('idea.validation.step5.software_type'),
            'data.website.*'               => __('idea.validation.step5.website'),
        ];
    }
}
