<?php

namespace App\Livewire\Forms\Idea;

/**
 * Single source of truth for Idea wizard Step 9 (title/summary/profile) rules.
 * Free-plan + credit checks live in the trait (need auth/DB).
 * Mirrored in resources/js/alpine/idea-form.js validateStep(9).
 */
class Step9Form
{
    public static function rules(bool $withProfile): array
    {
        $rules = [
            'state.step9.data.idea_title' => 'required|string|max:255',
            'state.step9.data.summary' => 'required|string|max:2000',
            'state.step9.data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'state.step9.data.contact_visibility' => 'required|in:open,closed',
        ];

        if ($withProfile) {
            $rules['state.step9.job_title'] = 'required|string|max:255';
            $rules['state.step9.phone'] = 'required|string|max:255';
            $rules['state.step9.residence_country'] = 'required|string|max:255';
            $rules['state.step9.birth_date'] = 'required|date|before:today';
        }

        return $rules;
    }

    public static function messages(): array
    {
        return [
            'state.step9.data.idea_title.required' => __('idea.validation.step9.idea_title_required'),
            'state.step9.data.idea_title.string' => __('idea.validation.step9.idea_title_string'),
            'state.step9.data.idea_title.max' => __('idea.validation.step9.idea_title_max'),
            'state.step9.data.summary.required' => __('idea.validation.step9.summary_required'),
            'state.step9.data.summary.string' => __('idea.validation.step9.summary_string'),
            'state.step9.data.summary.max' => __('idea.validation.step9.summary_max'),
            'state.step9.data.attachment.file' => __('idea.validation.step9.attachments_file'),
            'state.step9.data.attachment.mimes' => __('idea.validation.step9.attachments_mimes'),
            'state.step9.data.attachment.max' => __('idea.validation.step9.attachments_max'),
        ];
    }
}
