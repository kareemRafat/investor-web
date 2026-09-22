<?php

namespace App\View\Components;

use App\Support\SocialLinks as SocialLinksService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialLinks extends Component
{
    /**
     * @param  'landing'|'app'  $variant
     */
    public function __construct(
        public string $variant = 'landing',
    ) {}

    /**
     * @return array<int, array{key: string, label: string, url: string}>
     */
    public function links(): array
    {
        return SocialLinksService::links();
    }

    public function render(): View
    {
        return view('components.social-links');
    }
}
