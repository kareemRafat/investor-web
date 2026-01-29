<?php

namespace App\Livewire\Pages;

use App\Enums\PlanType;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Services\SubscriptionService;

class Pricing extends Component
{
    #[Title('Pricing')]
    public function selectPlan(string $plan, SubscriptionService $subscriptionService)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $planType = PlanType::from($plan);
        $user = Auth::user();

        if ($user->plan_type === $planType) {
            return;
        }

        $subscriptionService->subscribe($user, $planType);

        $this->dispatch('plan-updated');
        session()->flash('success', __('pages.profile.plan_updated_success')); // I might need to add this translation too

        return redirect()->route('main.profile');
    }

    public function render()
    {
        return view('livewire.pages.pricing');
    }
}
