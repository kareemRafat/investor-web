<?php

namespace App\Services;

use App\Models\User;
use App\Enums\PlanType;
use App\Models\Subscription;
use App\Enums\SubscriptionStatus;
use Carbon\Carbon;

class SubscriptionService
{
    /**
     * Mock a subscription for a user.
     */
    public function subscribe(User $user, PlanType $planType): Subscription
    {
        // Cancel existing active subscriptions
        $user->subscriptions()->where('status', SubscriptionStatus::ACTIVE)->update([
            'status' => SubscriptionStatus::CANCELLED,
        ]);

        $durationMonths = ($planType === PlanType::YEARLY) ? 12 : 1;
        $startsAt = Carbon::now();
        $endsAt = $startsAt->copy()->addMonths($durationMonths);

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'plan_type' => $planType,
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'status' => SubscriptionStatus::ACTIVE,
        ]);

        $user->update([
            'plan_type' => $planType,
            'contact_credits' => 10,
            'credits_reset_at' => $startsAt,
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
