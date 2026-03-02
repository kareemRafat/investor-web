<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Models\CostProfitRange;
use App\Models\Idea;

trait Step3
{
    public function initStep3()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $cost = $idea->costs()->first();
                if ($cost) {
                    $this->state['step3']['cost_type'] = $cost->cost_type;
                    $this->state['step3']['range_id'] = $cost->range_id;
                }
            }
        }
    }

    public function validateStep3()
    {
        $this->validate([
            'state.step3.cost_type' => 'required|in:one-time,annual',
            'state.step3.range_id' => 'required|exists:cost_profit_ranges,id',
        ], [
            'state.step3.cost_type.*' => __('idea.validation.step3.cost_type'),
            'state.step3.range_id.*' => __('idea.validation.step3.cost_range'),
        ]);
    }

    public function getOneTimeRangesProperty()
    {
        return CostProfitRange::where('type', 'one-time')->get();
    }

    public function getAnnualRangesProperty()
    {
        return CostProfitRange::where('type', 'annual')->get();
    }
}
