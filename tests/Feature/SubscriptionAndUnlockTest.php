<?php

namespace Tests\Feature;

use App\Enums\PlanType;
use App\Enums\SubscriptionStatus;
use App\Enums\UnlockMethod;
use App\Livewire\Components\UnlockContact;
use App\Models\Idea;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Livewire\Livewire;
use Tests\TestCase;

class SubscriptionAndUnlockTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_processes_expired_subscriptions_and_reverts_user_plan()
    {
        // Create a user with a monthly plan and an expired subscription
        $user = User::factory()->create([
            'plan_type' => PlanType::MONTHLY,
            'contact_credits' => 5,
        ]);

        $subscription = Subscription::factory()->expired()->create([
            'user_id' => $user->id,
            'plan_type' => PlanType::MONTHLY,
        ]);

        $this->assertEquals(PlanType::MONTHLY, $user->plan_type);
        $this->assertEquals(5, $user->contact_credits);
        $this->assertEquals(SubscriptionStatus::ACTIVE, $subscription->status);

        // Run the command
        Artisan::call('subscriptions:check-expired');

        // Refresh models
        $user->refresh();
        $subscription->refresh();

        // Assertions
        $this->assertEquals(PlanType::FREE, $user->plan_type);
        $this->assertEquals(0, $user->contact_credits);
        $this->assertEquals(SubscriptionStatus::EXPIRED, $subscription->status);
    }

    /** @test */
    public function it_allows_unlocking_with_exactly_one_credit()
    {
        $user = User::factory()->create([
            'contact_credits' => 1,
            'plan_type' => PlanType::MONTHLY,
        ]);

        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(UnlockContact::class, ['model' => $idea])
            ->call('unlock', resolve(\App\Services\UnlockService::class), UnlockMethod::CREDIT)
            ->assertSet('isUnlocked', true)
            ->assertSet('errorMessage', '');

        $user->refresh();
        $this->assertEquals(0, $user->contact_credits);
        $this->assertTrue($user->contactUnlocks()->where('unlockable_id', $idea->id)->exists());
    }

    /** @test */
    public function it_prevents_unlocking_with_zero_credits()
    {
        $user = User::factory()->create([
            'contact_credits' => 0,
            'plan_type' => PlanType::MONTHLY,
        ]);

        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(UnlockContact::class, ['model' => $idea])
            ->call('unlock', resolve(\App\Services\UnlockService::class), UnlockMethod::CREDIT)
            ->assertSet('isUnlocked', false)
            ->assertSet('errorMessage', __('pages.unlock_contact.error_no_credits'));

        $user->refresh();
        $this->assertEquals(0, $user->contact_credits);
        $this->assertFalse($user->contactUnlocks()->where('unlockable_id', $idea->id)->exists());
    }

    /** @test */
    public function it_allows_unlocking_with_pay_per_use_even_with_zero_credits()
    {
        $user = User::factory()->create([
            'contact_credits' => 0,
            'plan_type' => PlanType::FREE,
        ]);

        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(UnlockContact::class, ['model' => $idea])
            ->set('cardNumber', '1234123412341234')
            ->set('expiryDate', '12/25')
            ->set('cvv', '123')
            ->call('processPayment', resolve(\App\Services\UnlockService::class))
            ->assertSet('isUnlocked', true)
            ->assertSet('errorMessage', '');

        $user->refresh();
        $this->assertEquals(0, $user->contact_credits);
        $this->assertTrue($user->contactUnlocks()->where('unlockable_id', $idea->id)->exists());
    }

    /** @test */
    public function it_fails_to_unlock_if_subscription_expires_during_browsing()
    {
        $user = User::factory()->create([
            'contact_credits' => 1,
            'plan_type' => PlanType::MONTHLY,
        ]);

        Subscription::factory()->create([
            'user_id' => $user->id,
            'plan_type' => PlanType::MONTHLY,
            'ends_at' => now()->addHour(),
        ]);

        $idea = Idea::factory()->create();

        // Simulate user being on the page
        $component = Livewire::actingAs($user)
            ->test(UnlockContact::class, ['model' => $idea]);

        // Suddenly, subscription expires and command runs
        Artisan::call('subscriptions:check-expired', []); // In reality it might be time passing

        // Let's manually expire it for the test because check-expired looks at ends_at
        Subscription::where('user_id', $user->id)->update(['ends_at' => now()->subMinute()]);
        Artisan::call('subscriptions:check-expired');

        // IMPORTANT: Refresh the user object that Auth is holding
        auth()->user()->refresh();

        // User now tries to unlock
        $component->call('unlock', resolve(\App\Services\UnlockService::class), UnlockMethod::CREDIT)
            ->assertSet('isUnlocked', false)
            ->assertSet('errorMessage', __('pages.unlock_contact.error_no_credits'));

        $user->refresh();
        $this->assertEquals(0, $user->contact_credits);
    }
}
