<?php

namespace App\Livewire\Pages\Idea;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Collection;

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

    public function mount(): void
    {
        $this->ideas = collect();
        $this->loadMore();
    }

    #[On('filters-changed')]
    public function applyFilters($field, $country, $cost_range)
    {
        $this->field = $field ?: null;
        $this->country = $country ?: null;
        $this->cost_range = $cost_range ?: null;

        $this->ideas = collect();
        $this->lastId = null;
        $this->hasMore = true;

        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (!$this->hasMore) {
            return;
        }

        $query = Idea::query()
            ->with(['costs.range', 'profits.range', 'resources'])

            ->when(
                $this->lastId !== null,
                fn($q) =>
                $q->where('id', '<', $this->lastId)
            )

            // field
            ->when(
                $this->field,
                fn($q) =>
                $q->where('idea_field', $this->field)
            )

            // cost range (direct relation)
            ->when(
                $this->cost_range,
                fn($q) =>
                $q->whereHas(
                    'costs',
                    fn($c) =>
                    $c->where('range_id', $this->cost_range)
                )
            )

            // country
            ->when(
                $this->country,
                fn($q) =>
                $q->whereHas(
                    'countries',
                    fn($c) =>
                    $c->where('country', $this->country)
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
            'ideas'   => $this->ideas,
            'hasMore' => $this->hasMore,
        ]);
    }
}
