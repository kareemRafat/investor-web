<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Support\SocialLinks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

class SocialLinksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_and_reads_settings_with_cache(): void
    {
        SiteSetting::set('social.x', 'https://x.com/fikrapedia');

        $this->assertSame('https://x.com/fikrapedia', site_setting('social.x'));
        $this->assertSame('https://x.com/fikrapedia', SiteSetting::get('social.x'));
    }

    /** @test */
    public function it_treats_empty_values_as_missing(): void
    {
        SiteSetting::set('social.facebook', '');

        $this->assertNull(site_setting('social.facebook'));
        $this->assertSame([], SocialLinks::links());
    }

    /** @test */
    public function it_returns_only_configured_links(): void
    {
        SiteSetting::set('social.x', 'https://x.com/fikrapedia');
        SiteSetting::set('social.youtube', 'https://youtube.com/@fikrapedia');

        $links = SocialLinks::links();

        $this->assertCount(2, $links);
        $this->assertSame('x', $links[0]['key']);
        $this->assertSame('https://x.com/fikrapedia', $links[0]['url']);
        $this->assertSame('youtube', $links[1]['key']);
    }

    /** @test */
    public function it_renders_nothing_when_all_links_are_empty(): void
    {
        $html = Blade::render('<x-social-links variant="landing" />');

        $this->assertSame('', trim($html));
    }

    /** @test */
    public function it_renders_only_configured_links_with_brand_icons(): void
    {
        SiteSetting::set('social.facebook', 'https://facebook.com/fikrapedia');

        $html = Blade::render('<x-social-links variant="landing" />');

        $this->assertStringContainsString('https://facebook.com/fikrapedia', $html);
        $this->assertStringContainsString('aria-label="Facebook"', $html);
        $this->assertStringNotContainsString('linkedin', strtolower($html));
    }

    /** @test */
    public function it_renders_app_variant_with_footer_styling(): void
    {
        SiteSetting::set('social.x', 'https://x.com/fikrapedia');

        $html = Blade::render('<x-social-links variant="app" />');

        $this->assertStringContainsString('app-footer__social', $html);
        $this->assertStringContainsString('https://x.com/fikrapedia', $html);
    }
}
