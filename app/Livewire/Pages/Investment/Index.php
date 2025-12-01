<?php

namespace App\Livewire\Pages\Investment;

use App\Models\Investor;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Collection;

class Index extends Component
{
    public Collection $investors;     // ← مهم جداً: Collection مش array
    public bool $hasMore = true;
    public ?int $lastId = null;
    public int $perPage = 5;

    public function mount(): void
    {
        $this->investors = collect(); // ← Collection فاضية
        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (!$this->hasMore) {
            return;
        }

        $newInvestors = Investor::with(['resources', 'contributions', 'countries'])
            ->when($this->lastId !== null, fn($q) => $q->where('id', '<', $this->lastId))
            ->orderByDesc('id')
            ->limit($this->perPage + 1)
            ->get();

        // لو مفيش نتايج جديدة
        if ($newInvestors->isEmpty()) {
            $this->hasMore = false;
            return;
        }

        // نشوف فيه صفحة جاية ولا لأ
        $hasNextPage = $newInvestors->count() > $this->perPage;

        if ($hasNextPage) {
            $newInvestors->pop(); // نشيل العنصر الزيادة
        }

        // نضيف البيانات الجديدة للـ Collection
        $this->investors = $this->investors->merge($newInvestors);

        // نحدّث آخر id بطريقة آمنة 100%
        $this->lastId = $newInvestors->last()->id ?? null;

        // نحدّث حالة الـ hasMore
        $this->hasMore = $hasNextPage;
    }

    #[Title('صندوق الاستثمار')]
    public function render()
    {
        return view('livewire.pages.investment.index', [
            'investors' => $this->investors,
            'hasMore'   => $this->hasMore,
        ]);
    }
}
