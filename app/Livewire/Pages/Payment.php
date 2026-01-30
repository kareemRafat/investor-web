<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Enums\PlanType;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Auth;

class Payment extends Component
{
    public $plan;
    public $nameOnCard;
    public $cardNumber;
    public $expiryDate;
    public $cvv;
    public $errorMessage = '';

    public function mount($plan)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!in_array($plan, ['monthly', 'yearly'])) {
            return redirect()->route('main.pricing');
        }

        // Prevent upgrading if already on this plan
        $planType = PlanType::tryFrom($plan);
        if (Auth::user()->plan_type === $planType) {
            return redirect()->route('main.pricing');
        }

        $this->plan = $plan;
    }

    public function processPayment(SubscriptionService $subscriptionService)
    {
        $this->validate([
            'nameOnCard' => 'required|string',
            'cardNumber' => 'required|numeric|digits:16',
            'expiryDate' => 'required|string',
            'cvv' => 'required|numeric|digits:3',
        ]);

        $this->errorMessage = '';

        try {
            $planType = PlanType::from($this->plan);
            $user = Auth::user();

            // The subscription service handles the mock payment process internally
            $subscriptionService->subscribe($user, $planType);

            session()->flash('subscription_success', __('pages.payment.success', ['plan' => $planType->getLabel()]));

            return redirect()->route('main.profile');
        } catch (\Exception $e) {
            $this->errorMessage = __('pages.payment.error');
        }
    }

    public function render()
    {
        return view('livewire.pages.payment')
            ->title(__('pages.payment.title'));
    }
}
