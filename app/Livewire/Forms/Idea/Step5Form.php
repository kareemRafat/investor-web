<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 5 (resources) validation.
 * Mirrored in resources/js/alpine/idea-form.js validateStep(5).
 */
class Step5Form
{
    public static function rules(): array
    {
        return [
            'state.step5.data.company' => 'required|in:yes,no',
            'state.step5.data.space_type' => 'required_if:state.step5.data.company,yes|nullable|in:large,small',
            'state.step5.data.staff' => 'required|in:yes,no',
            'state.step5.data.staff_number' => 'required_if:state.step5.data.staff,yes|nullable|integer|min:1',
            'state.step5.data.workers' => 'required|in:yes,no',
            'state.step5.data.workers_number' => 'required_if:state.step5.data.workers,yes|nullable|integer|min:1',
            'state.step5.data.executive_spaces' => 'required|in:yes,no',
            'state.step5.data.executive_spaces_type' => 'required_if:state.step5.data.executive_spaces,yes|nullable|in:open_spaces,factory,land_space',
            'state.step5.data.equipment' => 'required|in:yes,no',
            'state.step5.data.equipment_type' => 'required_if:state.step5.data.equipment,yes|nullable|in:industrial,electronic,other',
            'state.step5.data.software' => 'required|in:yes,no',
            'state.step5.data.software_type' => 'required_if:state.step5.data.software,yes|nullable|in:static,dynamic',
            'state.step5.data.website' => 'required|in:yes,no',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step5.data.company.required' => __('idea.validation.step5.company'),
            'state.step5.data.staff.required' => __('idea.validation.step5.staff'),
            'state.step5.data.workers.required' => __('idea.validation.step5.workers'),
            'state.step5.data.executive_spaces.required' => __('idea.validation.step5.executive_spaces'),
            'state.step5.data.equipment.required' => __('idea.validation.step5.equipment'),
            'state.step5.data.software.required' => __('idea.validation.step5.software'),
            'state.step5.data.website.required' => __('idea.validation.step5.website'),

            'state.step5.data.staff_number.required_if' => __('idea.validation.step5.staff_number'),
            'state.step5.data.workers_number.required_if' => __('idea.validation.step5.workers_number'),
            'state.step5.data.space_type.required_if' => __('idea.validation.step5.space_type'),
            'state.step5.data.executive_spaces_type.required_if' => __('idea.validation.step5.executive_spaces_type'),
            'state.step5.data.equipment_type.required_if' => __('idea.validation.step5.equipment_type'),
            'state.step5.data.software_type.required_if' => __('idea.validation.step5.software_type'),
        ];
    }
}
