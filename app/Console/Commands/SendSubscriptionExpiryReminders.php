<?php

namespace App\Console\Commands;

use App\Enums\SubscriptionStatus;
use App\Models\Subscription;
use App\Notifications\SubscriptionExpiryReminderNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendSubscriptionExpiryReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-subscription-expiry-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders to users whose subscription expires in 3 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $targetDate = Carbon::now()->addDays(3)->toDateString();

        $subscriptions = Subscription::query()
            ->where('status', SubscriptionStatus::ACTIVE)
            ->whereDate('ends_at', $targetDate)
            ->with('user')
            ->get();

        $count = 0;
        foreach ($subscriptions as $subscription) {
            if ($subscription->user) {
                $subscription->user->notify(new SubscriptionExpiryReminderNotification($subscription->plan_type->getLabel()));
                $count++;
            }
        }

        $this->info("Successfully sent {$count} subscription expiry reminders.");
    }
}
