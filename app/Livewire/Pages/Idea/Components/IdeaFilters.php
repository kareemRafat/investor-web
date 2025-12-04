<?php

namespace App\Livewire\Pages\Idea\Components;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Countryable;

class IdeaFilters extends Component
{
    public $field = "";
    public $country = "";
    public $costRanges = '';
    public $contributionType = '';

    public function mount()
    {
        $this->loadCostRanges();
    }

    public function search()
    {
        $this->dispatch(
            'filters-changed',
            field: $this->field,
            country: $this->country,
            cost_range: $this->costRanges
        );
    }

    protected function loadCostRanges()
    {
        $locale = app()->getLocale();
        $labelColumn = $locale === 'ar' ? 'label_ar' : 'label_en';

        $this->costRanges = \App\Models\CostProfitRange::query()
            ->select('id', 'label_ar', 'label_en', 'type', 'min_value', 'max_value')
            ->whereIn('type', ['one-time', 'annual']) // الاتنين دول هما التكاليف
            ->orderBy('min_value', 'asc')
            ->get()
            ->map(function ($range) use ($labelColumn) {
                return [
                    'id' => $range->id,
                    'label' => $range->$labelColumn,
                    'type' => $range->type,
                    'min_value' => $range->min_value,
                    'max_value' => $range->max_value,
                ];
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.pages.idea.components.idea-filters');
    }
}
