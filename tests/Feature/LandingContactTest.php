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
            ->call('save')
            ->assertHasNoErrors()
            ->assertSet('successMessage', __('pages.contact.success'));

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Jane Founder',
            'email' => 'jane@example.com',
            'subject' => 'Due Diligence Desk Request',
        ]);
    }

    /** @test */
    public function it_stores_message_via_fetch_endpoint(): void
    {
        $response = $this->postJson(route('main.contact.landing.store'), [
            'name' => 'Jane Founder',
            'email' => 'jane@example.com',
            'phone' => '+96170123456',
            'subject' => 'Due Diligence Desk Request',
            'message' => 'I would like to know more about your escrow process.',
        ]);

        $response->assertCreated()->assertJson(['message' => __('pages.contact.success')]);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Jane Founder',
            'email' => 'jane@example.com',
            'subject' => 'Due Diligence Desk Request',
        ]);
    }

    /** @test */
    public function it_validates_fetch_endpoint_and_stores_nothing_on_invalid_submit(): void
    {
        $response = $this->postJson(route('main.contact.landing.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'message' => 'short',
        ]);

        $response->assertUnprocessable()->assertJsonValidationErrors(['name', 'email', 'phone', 'subject', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);
    }

    /** @test */
    public function it_requires_phone_number(): void
    {
        $response = $this->postJson(route('main.contact.landing.store'), [
            'name' => 'Jane Founder',
            'email' => 'jane@example.com',
            'phone' => '',
            'subject' => 'General Inquiry',
            'message' => 'I would like to know more about your escrow process.',
        ]);

        $response->assertUnprocessable()->assertJsonValidationErrors(['phone']);

        $this->assertDatabaseCount('contact_messages', 0);
    }

    /** @test */
    public function it_rejects_invalid_phone_with_clear_message(): void
    {
        $response = $this->postJson(route('main.contact.landing.store'), [
            'name' => 'Jane Founder',
            'email' => 'jane@example.com',
            'phone' => 'not-a-phone!!!',
            'subject' => 'General Inquiry',
            'message' => 'I would like to know more about your escrow process.',
        ]);

        $response->assertUnprocessable()->assertJsonValidationErrors(['phone']);

        $this->assertDatabaseCount('contact_messages', 0);
    }

    /** @test */
    public function it_ignores_honeypot_bots_without_storing(): void
    {
        $response = $this->postJson(route('main.contact.landing.store'), [
            'name' => 'Bot',
            'email' => 'bot@example.com',
            'phone' => '+96170123456',
            'subject' => 'Spam',
            'message' => 'This is a long enough spam message.',
            'website' => 'http://spam.example',
        ]);

        $response->assertCreated();

        $this->assertDatabaseCount('contact_messages', 0);
    }

    /** @test */
    public function it_validates_and_stores_nothing_on_invalid_submit(): void
    {
        Livewire::test(LandingContact::class)
            ->set('name', '')
            ->set('email', 'not-an-email')
            ->set('message', 'short')
            ->call('save')
            ->assertHasErrors(['name', 'email', 'phone', 'subject', 'message'])
            ->assertSet('successMessage', null);

        $this->assertDatabaseCount('contact_messages', 0);
    }
}
