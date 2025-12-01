<?php

namespace App\Livewire\Pages\Idea;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\Title;

class Index extends Component
{
    public $limit = 5;

    protected $listeners = ['load-more' => 'loadMore'];

    public function loadMore()
    {
        $this->limit += 5;
    }

    #[Title('Explore Ideas')]
    public function render()
    {
        $ideas = Idea::with(['costs.range', 'profits.range', 'resources'])
            ->latest()
            ->take($this->limit)
            ->get();
            
        return view('livewire.pages.idea.index', [
            'ideas' => $ideas,
        ]);
    }
}
