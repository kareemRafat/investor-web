<?php

namespace App\Livewire\Forms\Investment;

/**
 * Single source of truth for Investor wizard Step 5 validation.
 * Skipped entirely when resources are disabled. Mirrored in investment-form.js validateStep(5).
 */
class Step5Form
{
    public static function rules(): array
    {
        return [
            'state.step5.data.money_contributions' => 'required|integer',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step5.data.money_contributions.required' => __('investor.validation.step5.required'),
        ];
    }
}
