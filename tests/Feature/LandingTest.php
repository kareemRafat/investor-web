<?php

namespace Tests\Feature;

use App\Livewire\Pages\Landing;
use App\Livewire\Pages\Landing\LandingFaq;
use App\Livewire\Pages\Landing\LandingPrivacy;
use App\Livewire\Pages\LandingTerms;
use Livewire\Livewire;
use Tests\TestCase;

class LandingTest extends TestCase
{
    /** @test */
    public function it_renders_landing_page(): void
    {
        Livewire::test(Landing::class)
            ->assertStatus(200)
            ->assertSee('FIKRAPEDIA', false);
    }

    /** @test */
    public function it_renders_landing_terms_page(): void
    {
        Livewire::test(LandingTerms::class)->assertStatus(200);
    }

    /** @test */
    public function it_renders_landing_faq_page(): void
    {
        Livewire::test(LandingFaq::class)->assertStatus(200);
    }

    /** @test */
    public function it_renders_landing_privacy_page(): void
    {
        Livewire::test(LandingPrivacy::class)->assertStatus(200);
    }

    /** @test */
    public function it_loads_local_landing_styles_instead_of_cdn(): void
    {
        Livewire::test(Landing::class)
            ->assertStatus(200)
            ->assertDontSee('cdn.tailwindcss.com', false)
            ->assertSee('/build/assets/landing-', false);
    }
}
