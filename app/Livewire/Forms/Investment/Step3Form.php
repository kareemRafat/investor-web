<?php

namespace App\Livewire\Forms\Investment;

/**
 * Single source of truth for Investor wizard Step 3 (resources) validation.
 * Skipped entirely when resources are disabled. Mirrored in investment-form.js validateStep(3).
 */
class Step3Form
{
    public static function rules(): array
    {
        return [
            'state.step3.data.company' => 'required|in:yes,no',
            'state.step3.data.space_type' => 'required_if:state.step3.data.company,yes|nullable|in:large,small',
            'state.step3.data.staff' => 'required|in:yes,no',
            'state.step3.data.staff_number' => 'required_if:state.step3.data.staff,yes|nullable|integer|min:1',
            'state.step3.data.workers' => 'required|in:yes,no',
            'state.step3.data.workers_number' => 'required_if:state.step3.data.workers,yes|nullable|integer|min:1',
            'state.step3.data.executive_spaces' => 'required|in:yes,no',
            'state.step3.data.executive_spaces_type' => 'required_if:state.step3.data.executive_spaces,yes|nullable|in:open_spaces,factory,land_space',
            'state.step3.data.equipment' => 'required|in:yes,no',
            'state.step3.data.equipment_type' => 'required_if:state.step3.data.equipment,yes|nullable|in:industrial,electronic,other',
            'state.step3.data.software' => 'required|in:yes,no',
            'state.step3.data.software_type' => 'required_if:state.step3.data.software,yes|nullable|in:static,dynamic',
            'state.step3.data.website' => 'required|in:yes,no',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step3.data.company.*' => __('idea.validation.step5.company'),
            'state.step3.data.space_type.*' => __('idea.validation.step5.space_type'),
            'state.step3.data.staff.*' => __('idea.validation.step5.staff'),
            'state.step3.data.staff_number.*' => __('idea.validation.step5.staff_number'),
            'state.step3.data.workers.*' => __('idea.validation.step5.workers'),
            'state.step3.data.workers_number.*' => __('idea.validation.step5.workers_number'),
            'state.step3.data.executive_spaces.*' => __('idea.validation.step5.executive_spaces'),
            'state.step3.data.executive_spaces_type.*' => __('idea.validation.step5.executive_spaces_type'),
            'state.step3.data.equipment.*' => __('idea.validation.step5.equipment'),
            'state.step3.data.equipment_type.*' => __('idea.validation.step5.equipment_type'),
            'state.step3.data.software.*' => __('idea.validation.step5.software'),
            'state.step3.data.software_type.*' => __('idea.validation.step5.software_type'),
            'state.step3.data.website.*' => __('idea.validation.step5.website'),
        ];
    }
}
