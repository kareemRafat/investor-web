<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Livewire\Pages\Idea\IdeaForm;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReproductionStep5Test extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /** @test */
    public function it_fails_validation_if_staff_is_not_selected_even_if_number_is_filled()
    {
        Livewire::test(IdeaForm::class)
            ->set('currentStep', 5)
            ->set('state.step5.data.company', 'no')
            ->set('state.step5.data.staff', null) // Explicitly null
            ->set('state.step5.data.staff_number', 5) // Filled!
            ->set('state.step5.data.workers', 'no')
            ->set('state.step5.data.executive_spaces', 'no')
            ->set('state.step5.data.equipment', 'no')
            ->set('state.step5.data.software', 'no')
            ->set('state.step5.data.website', 'no')
            ->call('nextStep')
            ->assertHasErrors(['state.step5.data.staff']);
    }

    /** @test */
    public function it_fails_validation_if_staff_number_is_missing_when_staff_is_yes()
    {
        Livewire::test(IdeaForm::class)
            ->set('currentStep', 5)
            ->set('state.step5.data.company', 'no')
            ->set('state.step5.data.staff', 'yes')
            ->set('state.step5.data.staff_number', null) // Missing!
            ->set('state.step5.data.workers', 'no')
            ->set('state.step5.data.executive_spaces', 'no')
            ->set('state.step5.data.equipment', 'no')
            ->set('state.step5.data.software', 'no')
            ->set('state.step5.data.website', 'no')
            ->call('nextStep')
            ->assertHasErrors(['state.step5.data.staff_number']);
    }

    /** @test */
    public function it_clears_sub_fields_when_toggle_is_set_to_no()
    {
        Livewire::test(IdeaForm::class)
            ->set('state.step5.data.staff', 'yes')
            ->set('state.step5.data.staff_number', 10)
            ->set('state.step5.data.staff', 'no')
            ->assertSet('state.step5.data.staff_number', null);
    }
}
