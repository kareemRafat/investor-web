<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use App\Models\Investor;
use Livewire\Component;

class Step7 extends Component
{
    public $investor;

    public function mount()
    {
        $investorId = session('current_investor_id');

        $this->investor = Investor::with([
            'countries',
            'resources',
            'contributions',
            'attachments',
        ])->findOrFail($investorId);
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step7', [
            'investor' => $this->investor,
        ]);
    }
}
