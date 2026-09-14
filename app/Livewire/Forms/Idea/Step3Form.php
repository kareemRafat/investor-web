<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 3 validation.
 * Mirrored in resources/js/alpine/idea-form.js validateStep(3).
 */
class Step3Form
{
    public static function rules(): array
    {
        return [
            'state.step3.cost_type' => 'required|in:one-time,annual',
            'state.step3.range_id' => 'required|integer',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step3.cost_type.*' => __('idea.validation.step3.cost_type'),
            'state.step3.range_id.*' => __('idea.validation.step3.cost_range'),
        ];
    }
}
