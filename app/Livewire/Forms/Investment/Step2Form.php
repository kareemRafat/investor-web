<?php

namespace App\Livewire\Forms\Investment;

/**
 * Single source of truth for Investor wizard Step 2 validation.
 * Mirrored in resources/js/alpine/investment-form.js validateStep(2).
 */
class Step2Form
{
    public static function rules(): array
    {
        return [
            'state.step2.countries' => 'required|array|min:1|max:3',
            'state.step2.countries.*' => 'string',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step2.countries.required' => __('investor.validation.step2.countries'),
        ];
    }
}
