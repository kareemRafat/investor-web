<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Models\Idea;

trait Step8
{
    public function initStep8()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea && $idea->returns) {
                $this->state['step8']['data'] = array_merge(
                    $this->state['step8']['data'],
                    $idea->returns->only(array_keys($this->state['step8']['data']))
                );
            }
        }
    }

    public function validateStep8()
    {
        // Clean empty strings to null
        foreach (['profit_only_percentage', 'one_time_dollar', 'one_time_sar', 'combo_dollar', 'combo_sar', 'combo_percentage'] as $key) {
            if (isset($this->state['step8']['data'][$key]) && $this->state['step8']['data'][$key] === '') {
                $this->state['step8']['data'][$key] = null;
            }
        }

        $this->validate([
            'state.step8.data.profit_only_percentage' => 'nullable|in:5,10,15,20,25,30,35,40,45,50,55,60,65,70,75',
            'state.step8.data.one_time_dollar' => 'nullable|numeric|min:1',
            'state.step8.data.one_time_sar' => 'nullable|numeric|min:1',
            'state.step8.data.combo_dollar' => 'nullable|numeric|min:1',
            'state.step8.data.combo_sar' => 'nullable|numeric|min:1',
            'state.step8.data.combo_percentage' => 'nullable|in:5,10,15,20,25,30,35,40,45,50,55,60,65,70,75',
        ], [
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
        ]);

        $data = $this->state['step8']['data'];
        $hasProfitOnly = ! is_null($data['profit_only_percentage']);
        $hasOneTime = ! is_null($data['one_time_dollar']) || ! is_null($data['one_time_sar']);
        $hasCombo = ! is_null($data['combo_dollar']) || ! is_null($data['combo_sar']) || ! is_null($data['combo_percentage']);

        if (! $hasProfitOnly && ! $hasOneTime && ! $hasCombo) {
            $this->addError('state.step8.data', __('idea.steps.step8.choose_one'));
            throw \Illuminate\Validation\ValidationException::withMessages(['state.step8.data' => __('idea.steps.step8.choose_one')]);
        }

        // One-time currency check
        $oneTimeCount = (! is_null($data['one_time_dollar']) ? 1 : 0) + (! is_null($data['one_time_sar']) ? 1 : 0);
        if ($oneTimeCount > 1) {
            $this->addError('state.step8.one_time', __('idea.steps.step8.only_one_currency'));
            throw \Illuminate\Validation\ValidationException::withMessages(['state.step8.one_time' => __('idea.steps.step8.only_one_currency')]);
        }

        // Combo currency and percentage check
        $comboCurrencyCount = (! is_null($data['combo_dollar']) ? 1 : 0) + (! is_null($data['combo_sar']) ? 1 : 0);
        $comboHasPercentage = ! is_null($data['combo_percentage']);

        if ($comboCurrencyCount > 1) {
            $this->addError('state.step8.combo', __('idea.steps.step8.only_one_currency'));
            throw \Illuminate\Validation\ValidationException::withMessages(['state.step8.combo' => __('idea.steps.step8.only_one_currency')]);
        }

        if ($comboCurrencyCount === 1 && ! $comboHasPercentage) {
            $this->addError('state.step8.combo', __('idea.steps.step8.combo_percentage_required'));
            throw \Illuminate\Validation\ValidationException::withMessages(['state.step8.combo' => __('idea.steps.step8.combo_percentage_required')]);
        }

        if ($comboCurrencyCount === 0 && $comboHasPercentage) {
            $this->addError('state.step8.combo', __('idea.steps.step8.combo_currency_required'));
            throw \Illuminate\Validation\ValidationException::withMessages(['state.step8.combo' => __('idea.steps.step8.combo_currency_required')]);
        }
    }
}
