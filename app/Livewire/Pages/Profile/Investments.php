<?php

namespace App\Livewire\Pages\Profile;

use App\Models\Investor;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.profile')]
class Investments extends Component
{
    public Collection $investors;
    public bool $hasMore = true;
    public ?int $lastId = null;
    public int $perPage = 5;

    public function mount(): void
    {
        $this->investors = collect();
        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (!$this->hasMore) {
            return;
        }

        $query = Investor::query()
            ->with([
                'resources',
                'contributions.contributionRange',
                'countries'
            ])
            ->where('user_id', Auth::id())
            ->when(
                $this->lastId !== null,
                fn($q) => $q->where('id', '<', $this->lastId)
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

        $this->investors = $this->investors->merge($query);
        $this->lastId = $query->last()->id ?? null;
    }

    public function render()
    {
        return view('livewire.pages.profile.investments', [
            'investors' => $this->investors,
            'hasMore' => $this->hasMore,
        ]);
    }
}
