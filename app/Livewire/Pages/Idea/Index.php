<?php

namespace App\Livewire\Pages\Idea;

use App\Models\Idea;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public Collection $ideas;

    public bool $hasMore = true;

    public ?int $lastId = null; // مؤشر الصفحة التالية

    public int $perPage = 5;

    // Filters
    public $field = null;

    public $country = null;

    public $cost_range = null;

    public $contributionType = null;

    public function mount(): void
    {
        // Read filter first from query string
        $this->field = request()->query('field', '');
        $this->country = request()->query('country', '');
        $this->cost_range = request()->query('cost_range', '');
        $this->contributionType = request()->query('contributionType', '');

        $this->ideas = collect();
        $this->loadMore();
    }

    #[On('filters-changed')]
    public function applyFilters($field, $country, $cost_range, $contributionType)
    {
        $this->field = $field ?: null;
        $this->country = $country ?: null;
        $this->cost_range = $cost_range ?: null;
        $this->contributionType = $contributionType ?: null;

        $this->ideas = collect();
        $this->lastId = null;
        $this->hasMore = true;

        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (! $this->hasMore) {
            return;
        }

        $query = Idea::query()
            ->with(['costs.range', 'profits.range', 'contributions'])
            ->where('status', 'approved')
            ->when(
                $this->lastId !== null,
                fn ($q) => $q->where('id', '<', $this->lastId)
            )

            // field
            ->when(
                $this->field,
                fn ($q) => $q->where('idea_field', $this->field)
            )

            // cost range (direct relation)
            ->when(
                $this->cost_range,
                fn ($q) => $q->whereHas(
                    'costs',
                    fn ($c) => $c->where('range_id', $this->cost_range)
                )
            )

            // country
            ->when(
                $this->country,
                fn ($q) => $q->whereHas(
                    'countries',
                    fn ($c) => $c->where('country', $this->country)
                )
            )

            // contributions
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

        // دمج النتائج
        $this->ideas = $this->ideas->merge($query);

        // تحديث آخر ID
        $this->lastId = $query->last()->id ?? null;
    }

    #[Title('Explore Ideas')]
    public function render()
    {
        return view('livewire.pages.idea.index', [
            'ideas' => $this->ideas,
            'hasMore' => $this->hasMore,
        ]);
    }
}
