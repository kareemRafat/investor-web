<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use App\Models\Investor;

class Step6 extends Component
{
    public $investor ;

    public function mount()
    {
        $investorId = session('current_investor_id');

        $this->investor = Investor::with([
            'countries',
            'resources',
            'contributions',
            'summary',
            'attachments',
        ])->findOrFail($investorId);
    }
    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step6' , [
            'investor' => $this->investor,
        ]);
    }
}
