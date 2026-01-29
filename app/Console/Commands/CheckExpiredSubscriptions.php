<?php

namespace App
\Console\Commands;

use App\Models\User;
use App\Enums\PlanType;
use App\Models\Subscription;
use Illuminate\Console\Command;
use App\Enums\SubscriptionStatus;
use Illuminate\Support\Facades\DB;
use App\Notifications\SubscriptionExpiredNotification;

class CheckExpiredSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:check-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find and process expired subscriptions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking for expired subscriptions...');

        $expiredSubscriptions = Subscription::where('status', SubscriptionStatus::ACTIVE)
            ->where('ends_at', '<=', now())
            ->with('user')
            ->get();

        if ($expiredSubscriptions->isEmpty()) {
            $this->info('No expired subscriptions found.');
            return;
        }

        $count = 0;
        foreach ($expiredSubscriptions as $subscription) {
            DB::transaction(function () use ($subscription) {
                // Update subscription status
                $subscription->update([
                    'status' => SubscriptionStatus::EXPIRED,
                ]);

                // Revert user to free plan
                if ($subscription->user) {
                    $subscription->user->update([
                        'plan_type' => PlanType::FREE,
                        'contact_credits' => 0,
                    ]);

                    $subscription->user->notify(new SubscriptionExpiredNotification());
                }
            });
            $count++;
        }

        $this->info("Processed {$count} expired subscriptions.");
    }
}
