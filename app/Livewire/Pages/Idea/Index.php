<?php

namespace App\Livewire\Pages\Idea;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Collection;

class Index extends Component
{
    public Collection $ideas;
    public bool $hasMore = true;
    public ?int $lastId = null;// مؤشر الصفحة التالية
    public int $perPage = 5;

    public function mount(): void
    {
        $this->ideas = collect();
        $this->loadMore();
    }

    public function loadMore(): void
    {
        // لو خلّصت الصفحات، متعملش حاجة
        if (!$this->hasMore) {
            return;
        }

        $newIdeas = Idea::with(['costs.range', 'profits.range', 'resources'])
            ->when($this->lastId !== null, fn($q) => $q->where('id', '<', $this->lastId))
            ->orderByDesc('id') // ترتيب ثابت وسريع (يستخدم index)
            ->limit($this->perPage + 1)// +1 عشان نعرف فيه تكملة ولا لأ
            ->get();

        // لو مفيش نتايج → خلّصنا
        if ($newIdeas->isEmpty()) {
            $this->hasMore = false;
            return;
        }

        // نشوف فيه صفحة جاية ولا لأ
        $hasNextPage = $newIdeas->count() > $this->perPage;

        if ($hasNextPage) {
            $newIdeas->pop(); // نشيل العنصر الزيادة
        } else {
            $this->hasMore = false;
        }

        // نضيف الأفكار الجديدة للقايمة
        $this->ideas = $this->ideas->merge($newIdeas);

        // نحفظ آخر id عشان الصفحة الجاية (آمن 100%)
        $this->lastId = $newIdeas->last()->id ?? null;

        // لو مفيش تكملة → نقفل الباب
        $this->hasMore = $hasNextPage;
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
