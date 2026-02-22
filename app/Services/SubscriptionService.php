<?php

namespace App\Services;

use App\Models\User;
use App\Enums\PlanType;
use App\Models\Subscription;
use App\Enums\SubscriptionStatus;
use App\Contracts\PaymentGatewayInterface;
use Carbon\Carbon;

class SubscriptionService
{
    public function __construct(
        protected PaymentGatewayInterface $paymentGateway
    ) {}

    /**
     * Mock a subscription for a user.
     */
    public function subscribe(User $user, PlanType $planType, ?string $paymentOrderId = null): Subscription
    {
        // Mock payment based on plan type
        $price = match($planType) {
            PlanType::YEARLY => 999.0,
            PlanType::MONTHLY => 99.0,
            PlanType::FREE => 0.0,
        };

        if ($price > 0) {
            if ($paymentOrderId) {
                // If an order ID is provided (e.g., from PayPal), capture it.
                $this->paymentGateway->capturePayment($paymentOrderId);
            } else {
                // Legacy support/Mock path
                $orderId = $this->paymentGateway->createOrder($price);
                $this->paymentGateway->capturePayment($orderId);
            }
        }

        // Cancel existing active subscriptions
        $user->subscriptions()->where('status', SubscriptionStatus::ACTIVE)->update([
            'status' => SubscriptionStatus::CANCELLED,
        ]);

        $durationMonths = match($planType) {
            PlanType::YEARLY => 12,
            PlanType::MONTHLY => 1,
            PlanType::FREE => null,
        };

        $startsAt = Carbon::now();
        $endsAt = $durationMonths ? $startsAt->copy()->addMonths($durationMonths) : null;

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'plan_type' => $planType,
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'status' => SubscriptionStatus::ACTIVE,
        ]);

        $user->update([
            'plan_type' => $planType,
            'contact_credits' => ($planType === PlanType::FREE) ? 0 : 10,
            'credits_reset_at' => ($planType === PlanType::FREE) ? null : $startsAt->copy()->addMonth(),
        ]);

        return $subscription;
    }

    /**
     * Reset credits for a user if they are on a paid plan.
     */
    public function resetCredits(User $user): void
    {
        if ($user->plan_type === PlanType::FREE) {
            return;
        }

        $user->update([
            'contact_credits' => 10,
            'credits_reset_at' => Carbon::now(),
        ]);
    }
}
