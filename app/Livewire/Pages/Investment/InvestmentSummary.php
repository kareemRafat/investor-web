<?php

namespace App\Livewire\Pages\Investment;

use Livewire\Component;
use Livewire\Attributes\Title;

class InvestmentSummary extends Component
{
    #[Title('Investments Summary')]
    public function render()
    {
        return view('livewire.pages.investment.investment-summary');
    }
}
