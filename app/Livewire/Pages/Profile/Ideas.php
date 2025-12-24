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
    public int $perPage = 2;
    public ?string $statusFilter = null;

    public function mount(): void
    {
        $this->ideas = collect();
        $this->loadMore();
    }

    public function setStatusFilter(?string $status): void
    {
        // Toggle: إذا كان نفس الـ status، نرجعه null (عرض الكل)
        if ($this->statusFilter === $status) {
            $this->statusFilter = null;
        } else {
            $this->statusFilter = $status;
        }

        // Reset everything
        $this->ideas = collect();
        $this->lastId = null;
        $this->hasMore = true;

        // Load fresh data
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
                $this->statusFilter !== null,
                fn($q) => $q->where('status', $this->statusFilter)
            )
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
