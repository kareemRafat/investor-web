<?php

namespace Tests\Feature;

use App\Livewire\Pages\Investment\InvestmentForm;
use App\Models\Investor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class InvestmentFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_navigates_through_steps_with_validation()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(InvestmentForm::class)
            ->assertSet('currentStep', 1)
            // Try to go to step 2 without field - should fail
            ->call('nextStep')
            ->assertHasErrors(['state.step1.investorField' => 'required'])
            ->assertSet('currentStep', 1)

            // Set field and go to next step
            ->set('state.step1.investorField', 'industrial')
            ->call('nextStep')
            ->assertHasNoErrors()
            ->assertSet('currentStep', 2)

            // Step 2 validation
            ->call('nextStep')
            ->assertHasErrors(['state.step2.countries' => 'required'])

            ->set('state.step2.countries', ['US'])
            ->call('nextStep')
            ->assertHasNoErrors()
            ->assertSet('currentStep', 3);
    }

    /** @test */
    public function it_renders_the_summary_step_correctly()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(InvestmentForm::class)
            ->set('state.step1.investorField', 'industrial')
            ->set('state.step2.countries', ['US'])
            ->set('currentStep', 7)
            ->assertSee(__('investor.steps.step1.options.industrial'))
            ->assertSee('US');
    }

    /** @test */
    public function it_saves_the_entire_form_in_one_go()
    {
        $user = User::factory()->create([
            'contact_credits' => 10,
            'plan_type' => \App\Enums\PlanType::MONTHLY,
        ]);

        Livewire::actingAs($user)
            ->test(InvestmentForm::class)
            ->set('state.step1.investorField', 'industrial')
            ->set('state.step2.countries', ['US', 'SA'])
            ->set('state.step3.disableResources', false)
            ->set('state.step3.data.company', 'yes')
            ->set('state.step3.data.space_type', 'large')
            ->set('state.step3.data.staff', 'no')
            ->set('state.step3.data.workers', 'no')
            ->set('state.step3.data.executive_spaces', 'no')
            ->set('state.step3.data.equipment', 'no')
            ->set('state.step3.data.software', 'no')
            ->set('state.step3.data.website', 'no')
            ->set('state.step4.data.contribute_type', 'capital')
            ->set('state.step4.data.money_amount', 10000)
            ->set('state.step5.data.money_contributions', 1)
            ->set('state.step6.data.investor_title', 'Big Investor')
            ->set('state.step6.data.summary', 'I want to invest in tech projects.')
            ->set('state.step6.data.contact_visibility', 'open')
            ->call('save')
            ->assertRedirect();

        $this->assertDatabaseHas('investors', [
            'user_id' => $user->id,
            'title' => 'Big Investor',
            'investor_field' => 'industrial',
            'contact_visibility' => 'open',
        ]);

        $investor = Investor::where('user_id', $user->id)->first();

        $this->assertDatabaseHas('countryables', [
            'countryable_id' => $investor->id,
            'country' => 'US',
        ]);

        $this->assertDatabaseHas('investor_resources', [
            'investor_id' => $investor->id,
            'company' => 'yes',
        ]);

        $this->assertDatabaseHas('investor_contributions', [
            'investor_id' => $investor->id,
            'contribute_type' => 'capital',
            'money_amount' => 10000,
            'money_contributions' => 1,
        ]);

        $user->refresh();
        $this->assertEquals(9, $user->contact_credits);
    }
}
