<?php

namespace App\Livewire\Pages\Idea\Components;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Countryable;

class IdeaFilters extends Component
{
    public $field = "";
    public $country = "";
    public $cost_range = '';
    public $costRanges = ''; // for show only
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
            cost_range: $this->cost_range
        );
    }

    protected function loadCostRanges()
    {
        $locale = app()->getLocale();
        $labelColumn = $locale === 'ar' ? 'label_ar' : 'label_en';

        $this->costRanges = \App\Models\CostProfitRange::query()
            ->select('id', 'label_ar', 'label_en', 'type')
            ->orderBy('id')
            ->get()
            ->map(fn($range) => [
                'id'    => $range->id,
                'label' => $range->$labelColumn,
                'type'  => $range->type,
            ])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.pages.idea.components.idea-filters');
    }
}
