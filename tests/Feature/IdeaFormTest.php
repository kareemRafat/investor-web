<?php

namespace Tests\Feature;

use App\Livewire\Pages\Idea\IdeaForm;
use App\Models\CostProfitRange;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class IdeaFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_navigates_through_steps_with_validation()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(IdeaForm::class)
            ->assertSet('currentStep', 1)
            // Step 1
            ->call('nextStep')
            ->assertHasErrors(['state.step1.ideaField' => 'required'])
            ->set('state.step1.ideaField', 'tech')
            ->call('nextStep')
            ->assertHasNoErrors()
            ->assertSet('currentStep', 2)
            // Step 2
            ->call('nextStep')
            ->assertHasErrors(['state.step2.countries' => 'required'])
            ->set('state.step2.countries', ['US'])
            ->call('nextStep')
            ->assertHasNoErrors()
            ->assertSet('currentStep', 3);
    }

    /** @test */
    public function it_saves_the_entire_idea_form_in_one_go()
    {
        $user = User::factory()->create([
            'contact_credits' => 10,
            'plan_type' => \App\Enums\PlanType::MONTHLY,
        ]);

        $costRange = CostProfitRange::create(['type' => 'one-time', 'label_en' => '10k', 'label_ar' => '10k']);
        $profitRange = CostProfitRange::create(['type' => 'annual', 'label_en' => '50k', 'label_ar' => '50k']);

        Livewire::actingAs($user)
            ->test(IdeaForm::class)
            ->set('state.step1.ideaField', 'tech')
            ->set('state.step2.countries', ['US'])
            ->set('state.step3.cost_type', 'one-time')
            ->set('state.step3.range_id', $costRange->id)
            ->set('state.step4.profit_type', 'annual')
            ->set('state.step4.profit_range_id', $profitRange->id)
            ->set('state.step5.data.company', 'yes')
            ->set('state.step5.data.staff', 'no')
            ->set('state.step5.data.workers', 'no')
            ->set('state.step5.data.executive_spaces', 'no')
            ->set('state.step5.data.equipment', 'no')
            ->set('state.step5.data.software', 'no')
            ->set('state.step5.data.website', 'no')
            ->set('state.step6.data.company', 20)
            ->set('state.step6.data.assets', 20)
            ->set('state.step6.data.salaries', 20)
            ->set('state.step6.data.operating', 20)
            ->set('state.step6.data.other', 20)
            ->set('state.step7.data.contribute_type', 'idea')
            ->set('state.step8.data.return_type', 'profit')
            ->set('state.step8.data.profit_only_percentage', 20)
            ->set('state.step9.data.idea_title', 'New AI Startup')
            ->set('state.step9.data.summary', 'An AI that writes code.')
            ->set('state.step9.data.contact_visibility', 'open')
            ->call('save')
            ->assertRedirect();

        $this->assertDatabaseHas('ideas', [
            'user_id' => $user->id,
            'title' => 'New AI Startup',
            'contact_visibility' => 'open',
        ]);

        $idea = Idea::where('user_id', $user->id)->first();

        $this->assertDatabaseHas('countryables', [
            'countryable_id' => $idea->id,
            'country' => 'US',
        ]);

        $this->assertDatabaseHas('idea_costs', [
            'idea_id' => $idea->id,
            'cost_type' => 'one-time',
            'range_id' => $costRange->id,
        ]);

        $this->assertDatabaseHas('idea_expenses', [
            'idea_id' => $idea->id,
            'company' => 20,
        ]);

        $user->refresh();
        $this->assertEquals(9, $user->contact_credits);
    }
}
