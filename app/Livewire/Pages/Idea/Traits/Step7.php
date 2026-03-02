<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Models\Idea;

trait Step7
{
    public function initStep7()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $contribution = $idea->contributions()->first();
                if ($contribution) {
                    $this->state['step7']['data'] = array_merge(
                        $this->state['step7']['data'],
                        $contribution->only(array_keys($this->state['step7']['data']))
                    );
                }
            }
        }
    }

    public function validateStep7()
    {
        $data = $this->state['step7']['data'];

        $rules = [
            'state.step7.data.contribute_type' => 'required|in:sell,idea,capital,personal,both',
            'state.step7.data.staff' => 'required_if:state.step7.data.contribute_type,personal|nullable|in:full_time,part_time,supervision',
            'state.step7.data.staff_person_money' => 'required_if:state.step7.data.contribute_type,both|nullable|in:full_time,part_time,supervision',
        ];

        if ($data['contribute_type'] === 'capital') {
            if (! empty($data['money_amount']) && ! empty($data['money_percent'])) {
                $rules['state.step7.data.money_amount'] = 'prohibited';
                $rules['state.step7.data.money_percent'] = 'prohibited';
            } elseif (empty($data['money_amount']) && empty($data['money_percent'])) {
                $rules['state.step7.data.money_amount'] = 'required';
            } else {
                $rules['state.step7.data.money_amount'] = 'nullable|numeric|min:1';
                $rules['state.step7.data.money_percent'] = 'nullable|numeric|min:1|max:100';
            }
        }

        if ($data['contribute_type'] === 'both') {
            if (! empty($data['person_money_amount']) && ! empty($data['person_money_percent'])) {
                $rules['state.step7.data.person_money_amount'] = 'prohibited';
                $rules['state.step7.data.person_money_percent'] = 'prohibited';
            } elseif (empty($data['person_money_amount']) && empty($data['person_money_percent'])) {
                $rules['state.step7.data.person_money_amount'] = 'required';
            } else {
                $rules['state.step7.data.person_money_amount'] = 'nullable|numeric|min:1';
                $rules['state.step7.data.person_money_percent'] = 'nullable|numeric|min:1|max:100';
            }
        }

        $this->validate($rules, [
            'state.step7.data.contribute_type.*' => __('idea.validation.step7.contribute_type'),
            'state.step7.data.staff.*' => __('idea.validation.step7.staff'),
            'state.step7.data.staff_person_money.*' => __('idea.validation.step7.staff_person_money'),

            'state.step7.data.money_amount.numeric' => __('idea.validation.step7.money_amount'),
            'state.step7.data.money_amount.min' => __('idea.validation.step7.money_amount'),
            'state.step7.data.money_percent.numeric' => __('idea.validation.step7.money_percent'),
            'state.step7.data.money_percent.min' => __('idea.validation.step7.money_percent'),
            'state.step7.data.money_percent.max' => __('idea.validation.step7.money_percent'),
            'state.step7.data.person_money_amount.numeric' => __('idea.validation.step7.person_money_amount'),
            'state.step7.data.person_money_amount.min' => __('idea.validation.step7.person_money_amount'),
            'state.step7.data.person_money_percent.numeric' => __('idea.validation.step7.person_money_percent'),
            'state.step7.data.person_money_percent.min' => __('idea.validation.step7.person_money_percent'),
            'state.step7.data.person_money_percent.max' => __('idea.validation.step7.person_money_percent'),

            'state.step7.data.money_amount.required' => __('idea.validation.step7.money_required_one'),
            'state.step7.data.money_amount.prohibited' => __('idea.validation.step7.money_both_prohibited'),
            'state.step7.data.money_percent.prohibited' => __('idea.validation.step7.money_both_prohibited'),
            'state.step7.data.person_money_amount.required' => __('idea.validation.step7.person_money_required_one'),
            'state.step7.data.person_money_amount.prohibited' => __('idea.validation.step7.person_money_both_prohibited'),
            'state.step7.data.person_money_percent.prohibited' => __('idea.validation.step7.person_money_both_prohibited'),
        ]);
    }
}
