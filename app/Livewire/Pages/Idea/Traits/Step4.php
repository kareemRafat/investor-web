<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Enums\CostProfitRange;
use App\Livewire\Forms\Idea\Step4Form;
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
        $this->validate(Step4Form::rules(), Step4Form::messages());
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
