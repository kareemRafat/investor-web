<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Step3 extends Component
{
    #[Validate([
    'data.company'         => 'required|in:yes,no',
    'data.space_type'      => 'nullable|required_if:data.company,yes|in:large,small',
    'data.staff'           => 'required|in:yes,no',
    'data.number_staff'    => 'nullable|required_if:data.staff,yes|integer|min:1',
    'data.workers'         => 'required|in:yes,no',
    'data.number_workers'  => 'nullable|required_if:data.workers,yes|integer|min:1',
    'data.spaces'          => 'required|in:yes,no',
    'data.space_type_exec' => 'nullable|required_if:data.spaces,yes|in:open_spaces,factory,land',
    'data.equipment'       => 'required|in:yes,no',
    'data.equipment_type'  => 'nullable|required_if:data.equipment,yes|in:industrial,electronic,other',
    'data.software'        => 'required|in:yes,no',
    'data.software_type'   => 'nullable|required_if:data.software,yes|in:dynamic,static',
    'data.website'         => 'required|in:yes,no',
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
            'data.company.required' => __('investor.validation.step3.company_required'),
            'data.staff.required'   => __('investor.validation.step3.staff_required'),
            'data.workers.required' => __('investor.validation.step3.workers_required'),
            'data.spaces.required'  => __('investor.validation.step3.spaces_required'),
            'data.space_type_exec.required_if'  => __('investor.validation.step3.space_type_exec_required'),
            'data.equipment.required' => __('investor.validation.step3.equipment_required'),
            'data.equipment_type.required_if' => __('investor.validation.step3.equipment_type_required'),
            'data.software.required'  => __('investor.validation.step3.software_required'),
            'data.software_type.required_if'  => __('investor.validation.step3.software_type_required'),
            'data.website.required'   => __('investor.validation.step3.website_required'),

            'data.number_staff.required'    => __('investor.validation.step3.number_staff_required'),
            'data.number_staff.min'         => __('investor.validation.step3.number_min'),
            'data.number_workers.min'       => __('investor.validation.step3.number_workers_min'),
            'data.number_workers.required'  => __('investor.validation.step3.number_workers_required'),
            'data.company.in'               => __('investor.validation.step3.company_in'),
        ];
    }
}
