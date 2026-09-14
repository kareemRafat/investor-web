<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 2 validation.
 * Mirrored in resources/js/alpine/idea-form.js validateStep(2).
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
            'state.step2.countries.required' => __('idea.validation.step2.countries'),
        ];
    }
}
