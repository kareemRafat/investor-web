<?php

namespace App\Livewire\Pages\Profile;

use App\Models\Idea;
use App\Models\Investor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileStats extends Component
{
    public $userId;

    public $ideasSubmitted = 0;

    public $ideasPublished = 0;

    public $investmentPublished = 0;

    public $investmentOffers = 0;

    public $overallRating = 0.0;

    public function mount($userId = null)
    {
        $this->userId = $userId ?? Auth::id();
        $this->loadStats();
    }

    public function loadStats()
    {
        // الأفكار المقدمة
        $this->ideasSubmitted = Idea::where('user_id', $this->userId)->count();

        // الأفكار المنشورة
        $this->ideasPublished = Idea::where('user_id', $this->userId)
            ->where('status', 'approved')
            ->count();

        // عروض الاستثمار
        $this->investmentOffers = Investor::where('user_id', $this->userId)->count();

        // العروض المنشورة
        $this->investmentPublished = Investor::where('user_id', $this->userId)
            ->where('status', 'approved')
            ->count();
    }

    public function render()
    {
        return view('livewire.pages.profile.profile-stats');
    }
}
