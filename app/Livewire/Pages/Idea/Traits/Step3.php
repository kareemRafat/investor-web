<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Enums\CostProfitRange;
use App\Livewire\Forms\Idea\Step3Form;
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
                    $this->state['step3']['range_id'] = $cost->range_id?->value;
                }
            }
        }
    }

    public function validateStep3()
    {
        $this->validate(Step3Form::rules(), Step3Form::messages());
    }

    public function getOneTimeRangesProperty()
    {
        return CostProfitRange::filterByType('one-time');
    }

    public function getAnnualRangesProperty()
    {
        return CostProfitRange::filterByType('annual');
    }
}
