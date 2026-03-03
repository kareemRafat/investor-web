<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Enums\CostProfitRange;
use App\Models\Idea;

trait Step4
{
    public function initStep4()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $profit = $idea->profits()->first();
                if ($profit) {
                    $this->state['step4']['profit_type'] = $profit->profit_type;
                    $this->state['step4']['profit_range_id'] = $profit->range_id?->value;
                }
            }
        }
    }

    public function validateStep4()
    {
        $this->validate([
            'state.step4.profit_type' => 'required|in:one-time,annual',
            'state.step4.profit_range_id' => 'required|integer',
        ], [
            'state.step4.profit_type.*' => __('idea.validation.step4.profit_type'),
            'state.step4.profit_range_id.*' => __('idea.validation.step4.profit_range'),
        ]);
    }

    public function getOneTimeProfitRangesProperty()
    {
        return CostProfitRange::filterByType('one-time');
    }

    public function getAnnualProfitRangesProperty()
    {
        return CostProfitRange::filterByType('annual');
    }
}
