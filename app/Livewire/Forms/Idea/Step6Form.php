<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 6 (capital distribution) validation.
 * The 100%-total composite check lives in the trait (needs a thrown
 * ValidationException with a custom key). Mirrored in idea-form.js validateStep(6).
 */
class Step6Form
{
    public static function rules(): array
    {
        return [
            'state.step6.data.company' => 'required|numeric|min:0|max:100',
            'state.step6.data.assets' => 'required|numeric|min:0|max:100',
            'state.step6.data.salaries' => 'required|numeric|min:0|max:100',
            'state.step6.data.operating' => 'required|numeric|min:0|max:100',
            'state.step6.data.other' => 'required|numeric|min:0|max:100',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step6.data.company.*' => __('idea.validation.step6.company'),
            'state.step6.data.assets.*' => __('idea.validation.step6.assets'),
            'state.step6.data.salaries.*' => __('idea.validation.step6.salaries'),
            'state.step6.data.operating.*' => __('idea.validation.step6.operating'),
            'state.step6.data.other.*' => __('idea.validation.step6.other'),
        ];
    }
}
