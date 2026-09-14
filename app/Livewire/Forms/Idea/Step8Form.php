<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 8 (returns) field rules.
 * Composite "choose one / one currency / combo pairing" checks live in the
 * trait. Mirrored in resources/js/alpine/idea-form.js validateStep(8).
 */
class Step8Form
{
    public static function rules(): array
    {
        return [
            'state.step8.data.profit_only_percentage' => 'nullable|in:5,10,15,20,25,30,35,40,45,50,55,60,65,70,75',
            'state.step8.data.one_time_dollar' => 'nullable|numeric|min:1',
            'state.step8.data.one_time_sar' => 'nullable|numeric|min:1',
            'state.step8.data.combo_dollar' => 'nullable|numeric|min:1',
            'state.step8.data.combo_sar' => 'nullable|numeric|min:1',
            'state.step8.data.combo_percentage' => 'nullable|in:5,10,15,20,25,30,35,40,45,50,55,60,65,70,75',
        ];
    }

    public static function messages(): array
    {
        return [
            'state.step8.data.profit_only_percentage.in' => __('idea.validation.step8.profit_only_percentage'),
            'state.step8.data.one_time_dollar.numeric' => __('idea.validation.step8.one_time_dollar_numeric'),
            'state.step8.data.one_time_dollar.min' => __('idea.validation.step8.one_time_dollar_min'),
            'state.step8.data.one_time_sar.numeric' => __('idea.validation.step8.one_time_sar_numeric'),
            'state.step8.data.one_time_sar.min' => __('idea.validation.step8.one_time_sar_min'),
            'state.step8.data.combo_dollar.numeric' => __('idea.validation.step8.combo_dollar_numeric'),
            'state.step8.data.combo_dollar.min' => __('idea.validation.step8.combo_dollar_min'),
            'state.step8.data.combo_sar.numeric' => __('idea.validation.step8.combo_sar_numeric'),
            'state.step8.data.combo_sar.min' => __('idea.validation.step8.combo_sar_min'),
            'state.step8.data.combo_percentage.in' => __('idea.validation.step8.combo_percentage'),
        ];
    }
}
