<?php

namespace App\Livewire\Pages\Investment;

use App\Models\Investor;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public Collection $investors;

    public bool $hasMore = true;

    public ?int $lastId = null;

    public int $perPage = 5;

    // Filters
    public $field = null;

    public $country = null;

    public $cost_range = null;

    public $contributionType = null;

    public function mount(): void
    {
        // تحميل الفلاتر من الـ URL قبل عرض الصفحة (مهم جداً)
        $this->field = request()->query('field', '');
        $this->country = request()->query('country', '');
        $this->cost_range = request()->query('cost_range', '');
        $this->contributionType = request()->query('contributionType', '');

        $this->investors = collect();
        $this->loadMore();
    }

    #[On('filters-changed')]
    public function applyFilters($field, $country, $cost_range, $contributionType)
    {
        $this->field = $field ?: null;
        $this->country = $country ?: null;
        $this->cost_range = $cost_range ?: null;
        $this->contributionType = $contributionType ?: null;

        // إعادة الباجينيشن
        $this->investors = collect();
        $this->lastId = null;
        $this->hasMore = true;

        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (! $this->hasMore) {
            return;
        }

        $query = Investor::query()
            ->with([
                'resources',
                'contributions.contributionRange',
                'countries',
            ])
            ->where('status', 'approved')
            // pagination by id
            ->when(
                $this->lastId !== null,
                fn ($q) => $q->where('id', '<', $this->lastId)
            )

            // ---- filters ----

            // field filter
            ->when(
                $this->field,
                fn ($q) => $q->where('investor_field', $this->field)
            )

            // cost_range filter
            ->when(
                $this->cost_range,
                fn ($q) => $q->whereHas(
                    'contributions',
                    fn ($c) => $c->where('money_contributions', $this->cost_range)
                )
            )

            // country filter
            ->when(
                $this->country,
                fn ($q) => $q->whereHas(
                    'countries',
                    fn ($c) => $c->where('country', $this->country)
                )
            )

            // contribution type
            ->when(
                $this->contributionType,
                fn ($q) => $q->whereHas(
                    'contributions',
                    fn ($c) => $c->where('contribute_type', $this->contributionType)
                )
            )

            ->orderByDesc('id')
            ->limit($this->perPage + 1)
            ->get();

        if ($query->isEmpty()) {
            $this->hasMore = false;

            return;
        }

        $hasNext = $query->count() > $this->perPage;

        if ($hasNext) {
            $query->pop();
        } else {
            $this->hasMore = false;
        }

        // merge
        $this->investors = $this->investors->merge($query);

        // update last id
        $this->lastId = $query->last()->id ?? null;
    }

    #[Title('صندوق الاستثمار')]
    public function render()
    {
        return view('livewire.pages.investment.index', [
            'investors' => $this->investors,
            'hasMore' => $this->hasMore,
        ]);
    }
}
