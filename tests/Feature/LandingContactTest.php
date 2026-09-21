<?php

namespace Tests\Feature;

use App\Livewire\Pages\Landing\LandingContact;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LandingContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_contact_page(): void
    {
        Livewire::test(LandingContact::class)->assertStatus(200);
    }

    /** @test */
    public function it_stores_message_and_shows_success_immediately(): void
    {
        Livewire::test(LandingContact::class)
            ->set('name', 'Jane Founder')
            ->set('email', 'jane@example.com')
            ->set('phone', '+96170123456')
            ->set('subject', 'Due Diligence Desk Request')
            ->set('message', 'I would like to know more about your escrow process.')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('successMessage', __('pages.contact.success'))
            ->assertSee(__('pages.contact.success'));

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Jane Founder',
            'email' => 'jane@example.com',
            'subject' => 'Due Diligence Desk Request',
        ]);
    }

    /** @test */
    public function it_validates_and_stores_nothing_on_invalid_submit(): void
    {
        Livewire::test(LandingContact::class)
            ->set('name', '')
            ->set('email', 'not-an-email')
            ->set('message', 'short')
            ->call('submit')
            ->assertHasErrors(['name', 'email', 'subject', 'message'])
            ->assertSet('successMessage', null);

        $this->assertDatabaseCount('contact_messages', 0);
    }
}
