<?php

namespace App\Livewire\Pages\Investment;

use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\Title;

class Index extends Component
{
    public $limit = 5;

    public function loadMore()
    {
        $this->limit += 5;
    }

    #[Title('Investment Fund')]
    public function render()
    {
        $investors = Investor::with(['resources', 'contributions', 'countries'])
            ->latest()
            ->take($this->limit)
            ->get();

        return view('livewire.pages.investment.index', [
            'investors' => $investors,
        ]);
    }
}
