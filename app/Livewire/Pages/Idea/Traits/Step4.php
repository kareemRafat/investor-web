<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Models\CostProfitRange;
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
                    $this->state['step4']['profit_range_id'] = $profit->range_id;
                }
            }
        }
    }

    public function validateStep4()
    {
        $this->validate([
            'state.step4.profit_type' => 'required|in:one-time,annual',
            'state.step4.profit_range_id' => 'required|exists:cost_profit_ranges,id',
        ], [
            'state.step4.profit_type.*' => __('idea.validation.step4.profit_type'),
            'state.step4.profit_range_id.*' => __('idea.validation.step4.profit_range'),
        ]);
    }

    public function getOneTimeProfitRangesProperty()
    {
        return CostProfitRange::where('type', 'one-time')->get();
    }

    public function getAnnualProfitRangesProperty()
    {
        return CostProfitRange::where('type', 'annual')->get();
    }
}
