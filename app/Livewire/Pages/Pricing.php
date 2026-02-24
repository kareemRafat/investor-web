<?php

namespace App\Livewire\Pages;

use App\Enums\PlanType;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Pricing extends Component
{
    #[Title('Pricing')]
    public function selectPlan(string $plan, SubscriptionService $subscriptionService)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $planType = PlanType::from($plan);
        $user = Auth::user();

        if ($user->plan_type === $planType) {
            return;
        }

        if ($planType === PlanType::FREE) {
            $subscriptionService->subscribe($user, $planType);
            $this->dispatch('plan-updated');
            session()->flash('subscription_success', __('pages.profile.plan_updated_success'));

            return redirect()->route('main.profile');
        }

        return redirect()->route('payment.page', ['plan' => $plan]);
    }

    public function isUpgrade(string $targetPlan): bool
    {
        $user = Auth::user();

        // For guests, highlight the Monthly plan (default behavior)
        if (! $user) {
            return $targetPlan === 'monthly';
        }

        $currentPlan = $user->plan_type;
        $target = PlanType::tryFrom($targetPlan);

        if (! $currentPlan || ! $target) {
            return false;
        }

        // Only highlight the immediate next plan
        return $target->getSortOrder() === ($currentPlan->getSortOrder() + 1);
    }

    public function render()
    {
        return view('livewire.pages.pricing');
    }
}
