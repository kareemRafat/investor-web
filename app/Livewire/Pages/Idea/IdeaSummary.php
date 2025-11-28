<?php

namespace App\Livewire\Pages\Idea;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\Title;
use App\Models\CostProfitRange;

class IdeaSummary extends Component
{
    public Idea $idea;
    public $amount = 4;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function loadMore()
    {
        $this->amount += 4;
    }

    #[Title('Ideas Summary')]
    public function render()
    {
        // منطق المطابقة (كما تم شرحه سابقاً)
        $matchingInvestors = Investor::query()
            ->where('investor_field', 'LIKE', '%' . $this->idea->idea_field . '%')
            ->with(['contributions', 'resources', 'countries'])
            ->take($this->amount)
            ->get();

        $moneyRanges = CostProfitRange::where('type', 'money_contribution')->get()->keyBy('id');

        return view('livewire.pages.idea.idea-summary', [
            'investors' => $matchingInvestors,
            'moneyRanges' => $moneyRanges,
        ]);
    }
}
