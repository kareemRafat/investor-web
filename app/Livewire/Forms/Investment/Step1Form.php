<?php

namespace App\Livewire\Forms\Investment;

/**
 * Single source of truth for Investor wizard Step 1 validation.
 * Mirrored in resources/js/alpine/investment-form.js validateStep(1).
 */
class Step1Form
{
    public static function rules(): array
    {
        return [
            'state.step1.investorField' => 'required',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step1.investorField.required' => __('investor.validation.step1.investor_field'),
        ];
    }
}
