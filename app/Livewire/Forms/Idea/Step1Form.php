<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 1 validation.
 * Used by server trait + mirrored in resources/js/alpine/idea-form.js validateStep(1).
 */
class Step1Form
{
    public static function rules(): array
    {
        return [
            'state.step1.ideaField' => 'required',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step1.ideaField.required' => __('idea.validation.step1.idea_field'),
        ];
    }
}
