<?php

namespace App\Livewire\Pages\Idea\Components;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Countryable;
use Livewire\Attributes\Url;

class IdeaFilters extends Component
{
    #[Url(history: true)]
    public $field = "";

    #[Url(history: true)]
    public $country = "";

    #[Url(history: true)]
    public $cost_range = '';

    public $costRanges = ''; // for show only

    #[Url(history: true)]
    public $contributionType = '';

    public function mount()
    {
        $this->loadCostRanges();
        $this->dispatchFilters();
    }

    public function dispatchFilters()
    {
        $this->dispatch(
            'filters-changed',
            field: $this->field,
            country: $this->country,
            cost_range: $this->cost_range,
            contributionType: $this->contributionType,
        );
    }

    public function search()
    {
        $this->dispatchFilters();
    }

    public function resetFilters()
    {
        $this->reset('field', 'country', 'cost_range', 'contributionType');
        $this->dispatchFilters();
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
