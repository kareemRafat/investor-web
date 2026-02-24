<?php

namespace App\Console\Commands;

use App\Enums\PlanType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ResetMonthlyCredits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-monthly-credits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset monthly contact credits for premium users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('plan_type', '!=', PlanType::FREE)
            ->where('credits_reset_at', '<=', Carbon::now())
            ->get();

        $count = 0;
        foreach ($users as $user) {
            $user->update([
                'contact_credits' => 10,
                'credits_reset_at' => Carbon::now()->addMonth(), // Or next year if plan is yearly
            ]);

            // If they have a yearly plan, maybe we reset every month or every year?
            // Usually monthly reset even for yearly plans is common (10/month).
            // The roadmap just says "Reset credits to 10 for active subscribers".

            if ($user->plan_type === PlanType::YEARLY) {
                // For yearly, we still reset monthly usually, or we give them 120 at once.
                // Let's assume 10 per month for both.
            }

            $count++;
        }

        $this->info("Successfully reset credits for {$count} users.");
    }
}
