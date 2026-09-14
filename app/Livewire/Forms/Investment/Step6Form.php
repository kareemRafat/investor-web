<?php

namespace App\Livewire\Forms\Investment;

/**
 * Single source of truth for Investor wizard Step 6 (title/summary/profile) rules.
 * Free-plan + credit checks live in the trait (need auth/DB).
 * Mirrored in resources/js/alpine/investment-form.js validateStep(6).
 */
class Step6Form
{
    public static function rules(bool $withProfile): array
    {
        $rules = [
            'state.step6.data.investor_title' => 'required|string|max:200',
            'state.step6.data.summary' => 'required|string|max:2000',
            'state.step6.data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'state.step6.data.contact_visibility' => 'required|in:open,closed',
        ];

        if ($withProfile) {
            $rules['state.step6.job_title'] = 'required|string|max:255';
            $rules['state.step6.phone'] = 'required|string|max:255';
            $rules['state.step6.residence_country'] = 'required|string|max:255';
            $rules['state.step6.birth_date'] = 'required|date|before:today';
        }

        return $rules;
    }

    public static function messages(): array
    {
        return [
            'state.step6.data.investor_title.required' => __('investor.validation.step6.investor_title_required'),
            'state.step6.data.investor_title.string' => __('investor.validation.step6.investor_title_string'),
            'state.step6.data.investor_title.max' => __('investor.validation.step6.investor_title_max'),

            'state.step6.data.summary.required' => __('investor.validation.step6.summary_required'),
            'state.step6.data.summary.string' => __('investor.validation.step6.summary_string'),
            'state.step6.data.summary.max' => __('investor.validation.step6.summary_max'),

            'state.step6.data.attachment.file' => __('investor.validation.step6.attachments_file'),
            'state.step6.data.attachment.mimes' => __('investor.validation.step6.attachments_mimes'),
            'state.step6.data.attachment.max' => __('investor.validation.step6.attachments_max'),
        ];
    }
}
