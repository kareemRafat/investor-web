<?php

namespace App\Livewire\Pages;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\Title;


class Home extends Component
{
    #[Title('Inverstor Web')]
    public function render()
    {
        $latestIdeas = Idea::with('user')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        $latestInvestors = Investor::with('user')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        return view('livewire.pages.home', [
            'latestIdeas' => $latestIdeas,
            'latestInvestors' => $latestInvestors,
        ]);
    }

    public function getShortName($fullName)
    {
        $parts = explode(' ', trim($fullName));
        return $parts[0] ?? '';
    }
}
