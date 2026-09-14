<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 4 validation.
 * Mirrored in resources/js/alpine/idea-form.js validateStep(4).
 */
class Step4Form
{
    public static function rules(): array
    {
        return [
            'state.step4.profit_type' => 'required|in:one-time,annual',
            'state.step4.profit_range_id' => 'required|integer',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step4.profit_type.*' => __('idea.validation.step4.profit_type'),
            'state.step4.profit_range_id.*' => __('idea.validation.step4.profit_range'),
        ];
    }
}
