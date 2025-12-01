<?php

namespace App\Livewire\Pages\Investment;

use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\Title;

class InvestmentInfo extends Component
{
    public Investor $investor;

    public function mount()
    {
        $this->investor = Investor::with([
            'countries',
            'resources',
            'contributions',
            'attachments',
        ])->findOrFail(request()->investment);
    }
    #[Title('Investments Info')]
    public function render()
    {
        return view('livewire.pages.investment.investment-info', [
            'investor' => $this->investor,
        ]);
    }
}
