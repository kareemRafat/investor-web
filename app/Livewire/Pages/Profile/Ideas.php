<?php

namespace App\Livewire\Pages\Profile;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.profile')]
class Ideas extends Component
{
    public Collection $ideas;
    public bool $hasMore = true;
    public ?int $lastId = null;
    public int $perPage = 7;

    public function mount(): void
    {
        $this->ideas = collect();
        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (!$this->hasMore) {
            return;
        }

        $query = Idea::query()
            ->with(['costs.range', 'profits.range', 'contributions', 'countries'])
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
            $query->pop(); // إزالة العنصر الإضافي
        } else {
            $this->hasMore = false;
        }

        // دمج النتائج الجديدة مع القديمة
        $this->ideas = $this->ideas->merge($query);

        // تحديث آخر ID للصفحة التالية
        $this->lastId = $query->last()->id ?? null;
    }

    public function render()
    {
        return view('livewire.pages.profile.ideas', [
            'ideas' => $this->ideas,
            'hasMore' => $this->hasMore,
        ]);
    }
}
