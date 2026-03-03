<?php

namespace App\Livewire\Traits;

trait HasFrontendValidation
{
    public function getValidationMessages(): array
    {
        return [
            // Common
            'required' => __('validation.required'),

            // Step 1
            'state.step1.ideaField' => __('idea.validation.step1.idea_field'),
            'state.step1.investorField' => __('investor.validation.step1.investor_field'),

            // Step 2
            'state.step2.countries' => __('idea.validation.step2.countries') ?? __('investor.validation.step2.countries'),

            // Idea Step 3
            'state.step3.cost_type' => __('idea.validation.step3.cost_type'),
            'state.step3.range_id' => __('idea.validation.step3.cost_range'),

            // Idea Step 4
            'state.step4.profit_type' => __('idea.validation.step4.profit_type'),
            'state.step4.profit_range_id' => __('idea.validation.step4.profit_range'),

            // Step 5 (Idea) / Step 3 (Investment) - Resources
            'resources.company' => __('idea.validation.step5.company'),
            'resources.staff' => __('idea.validation.step5.staff'),
            'resources.workers' => __('idea.validation.step5.workers'),
            'resources.executive_spaces' => __('idea.validation.step5.executive_spaces'),
            'resources.equipment' => __('idea.validation.step5.equipment'),
            'resources.software' => __('idea.validation.step5.software'),
            'resources.website' => __('idea.validation.step5.website'),
            'resources.staff_number' => __('idea.validation.step5.staff_number'),
            'resources.workers_number' => __('idea.validation.step5.workers_number'),
            'resources.space_type' => __('idea.validation.step5.space_type'),
            'resources.executive_spaces_type' => __('idea.validation.step5.executive_spaces_type'),
            'resources.equipment_type' => __('idea.validation.step5.equipment_type'),
            'resources.software_type' => __('idea.validation.step5.software_type'),

            // Step 6 (Idea) - Expenses
            'state.step6.total' => __('idea.steps.step6.must_equal'),

            // Step 7 (Idea) / Step 4 (Investment) - Contribution
            'contribution.type' => __('idea.validation.step7.contribute_type'),
            'contribution.staff' => __('idea.validation.step7.staff'),
            'contribution.staff_person_money' => __('idea.validation.step7.staff_person_money'),
            'contribution.money_amount' => __('idea.validation.step7.money_amount'),
            'contribution.money_percent' => __('idea.validation.step7.money_percent'),
            'contribution.person_money_amount' => __('idea.validation.step7.person_money_amount'),
            'contribution.person_money_percent' => __('idea.validation.step7.person_money_percent'),
            'contribution.money_required_one' => __('idea.validation.step7.money_required_one'),
            'contribution.person_money_required_one' => __('idea.validation.step7.person_money_required_one'),
            'contribution.money_both_prohibited' => __('idea.validation.step7.money_both_prohibited'),
            'contribution.person_money_both_prohibited' => __('idea.validation.step7.person_money_both_prohibited'),

            // Step 8 (Idea) - Returns
            'returns.profit_only_percentage' => __('idea.validation.step8.profit_only_percentage'),
            'returns.one_time_dollar_numeric' => __('idea.validation.step8.one_time_dollar_numeric'),
            'returns.one_time_dollar_min' => __('idea.validation.step8.one_time_dollar_min'),
            'returns.one_time_sar_numeric' => __('idea.validation.step8.one_time_sar_numeric'),
            'returns.one_time_sar_min' => __('idea.validation.step8.one_time_sar_min'),
            'returns.combo_dollar_numeric' => __('idea.validation.step8.combo_dollar_numeric'),
            'returns.combo_dollar_min' => __('idea.validation.step8.combo_dollar_min'),
            'returns.combo_sar_numeric' => __('idea.validation.step8.combo_sar_numeric'),
            'returns.combo_sar_min' => __('idea.validation.step8.combo_sar_min'),
            'returns.combo_percentage' => __('idea.validation.step8.combo_percentage'),
            'returns.choose_one' => __('idea.steps.step8.choose_one'),
            'returns.only_one_currency' => __('idea.steps.step8.only_one_currency'),
            'returns.combo_percentage_required' => __('idea.steps.step8.combo_percentage_required'),
            'returns.combo_currency_required' => __('idea.steps.step8.combo_currency_required'),

            // Step 9 (Idea) / Step 6 (Investment) - Profile/Title/Summary
            'profile.title' => __('idea.validation.step9.idea_title_required') ?? __('investor.validation.step6.investor_title_required'),
            'profile.summary' => __('idea.validation.step9.summary_required') ?? __('investor.validation.step6.summary_required'),
            'profile.job_title' => __('validation.required'),
            'profile.phone' => __('validation.required'),
            'profile.residence_country' => __('validation.required'),
            'profile.birth_date' => __('validation.required'),

            // Investment Step 5
            'state.step5.data.money_contributions' => __('investor.validation.step5.required'),
        ];
    }
}
