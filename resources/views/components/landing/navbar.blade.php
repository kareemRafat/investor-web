@php
    $isLanding = Route::is('main.landing');
    $locale = app()->getLocale();
    $landingBase = LaravelLocalization::getLocalizedURL($locale, route('main.landing'));
    $anchor = fn(string $id) => $isLanding ? "#{$id}" : $landingBase . "#{$id}";
@endphp
<!-- Shared Public Navbar (landing spirit) -->
<header
    class="bg-surface-container-lowest/80 dark:bg-inverse-surface/80 backdrop-blur-md top-0 fixed z-50 shadow-sm border-b border-outline-variant/30 transition-all duration-200 w-full">
    <div class="flex justify-between items-center w-full px-space-md md:px-margin mx-auto h-16 md:h-20 px-8">
        <!-- Logo image -->
        <a class="flex items-center gap-2 group transition-transform duration-200 hover:scale-[1.02]"
            href="{{ $landingBase }}">
            <img alt="FIKRAPEDIA Logo" class="h-12 md:h-14 w-auto object-contain"
                src="{{ asset('images/logo.webp') }}">
        </a>
        <!-- Desktop Links: anchors + public pages -->
        <nav class="hidden md:flex items-center gap-6">
            <a data-nav="about"
                class="text-on-surface-variant border-b-2 border-transparent pb-1 hover:text-primary transition-colors duration-200 font-label-lg text-label-lg font-medium"
                href="{{ $anchor('about') }}">{{ __('landing.nav.about') }}</a>
            <a data-nav="features"
                class="text-on-surface-variant border-b-2 border-transparent pb-1 hover:text-primary transition-colors duration-200 font-label-lg text-label-lg font-medium"
                href="{{ $anchor('features') }}">{{ __('landing.nav.features') }}</a>
            <a data-nav="how-it-works"
                class="text-on-surface-variant border-b-2 border-transparent pb-1 hover:text-primary transition-colors duration-200 font-label-lg text-label-lg font-medium"
                href="{{ $anchor('how-it-works') }}">{{ __('landing.nav.howItWorks') }}</a>
            <a data-nav="pricing"
                class="text-on-surface-variant border-b-2 border-transparent pb-1 hover:text-primary transition-colors duration-200 font-label-lg text-label-lg font-medium"
                href="{{ $anchor('pricing') }}">{{ __('landing.nav.pricing') }}</a>
            <a class="text-on-surface-variant border-b-2 border-transparent pb-1 hover:text-primary transition-colors duration-200 font-label-lg text-label-lg font-medium {{ Route::is('main.faq.landing') ? '!text-primary !border-primary' : '' }}"
                href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.faq.landing')) }}">{{ __('landing.nav.faq') }}</a>
            <a class="text-on-surface-variant border-b-2 border-transparent pb-1 hover:text-primary transition-colors duration-200 font-label-lg text-label-lg font-medium {{ Route::is('main.contact.landing') ? '!text-primary !border-primary' : '' }}"
                href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.contact.landing')) }}">{{ __('landing.nav.contact') }}</a>
        </nav>
        <!-- Desktop Actions + Lang Switcher -->
        <div class="hidden md:flex items-center gap-4">
            @guest
                <a class="px-4 py-2 rounded-lg text-label-lg font-label-lg text-primary font-semibold hover:bg-surface-container-high transition-colors duration-150"
                    href="{{ LaravelLocalization::getLocalizedURL($locale, route('login')) }}">{{ __('landing.nav.signIn') }}</a>
                <a class="custom-gradient-btn text-on-primary px-5 py-2.5 rounded-lg text-label-lg font-label-lg font-semibold shadow-md shadow-primary-container/20 hover:brightness-110 active:scale-[0.98] transition-all duration-150 flex items-center gap-1.5"
                    href="{{ LaravelLocalization::getLocalizedURL($locale, route('register')) }}">{{ __('landing.nav.getStarted') }}</a>
            @endguest
            @auth
                <a class="custom-gradient-btn text-on-primary px-5 py-2.5 rounded-lg text-label-lg font-label-lg font-semibold shadow-md shadow-primary-container/20 hover:brightness-110 active:scale-[0.98] transition-all duration-150 flex items-center gap-1.5"
                    href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.home')) }}">{{ __('landing.nav.startNow') }}</a>
            @endauth
            <!-- Language Switcher Pill -->
            <div
                class="flex items-center border border-outline-variant/40 bg-surface-container-low p-1 rounded-full text-label-md">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if (app()->getLocale() === $localeCode)
                        <span
                            class="px-3 py-1 rounded-full text-label-md font-label-md transition-all duration-150 font-bold bg-primary text-on-primary shadow-sm">{{ $localeCode === 'ar' ? 'عربي' : 'EN' }}</span>
                    @else
                        <a class="px-3 py-1 rounded-full text-label-md font-label-md transition-all duration-150 font-medium text-on-surface-variant hover:text-primary"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $localeCode === 'ar' ? 'عربي' : 'EN' }}</a>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- Mobile Hamburger Button -->
        <div class="flex items-center gap-2 md:hidden">
            <button aria-label="Toggle Navigation Menu" class="p-2 text-primary focus:outline-none"
                id="mobile-menu-btn">
                <x-heroicon-o-bars-3 class="w-7 h-7" />
            </button>
        </div>
    </div>
    <!-- Mobile Drawer -->
    <div class="hidden md:hidden bg-surface-container-lowest border-b border-outline-variant/30 px-space-md py-4 shadow-lg transition-all"
        id="mobile-menu">
        <div class="flex flex-col gap-3">
            <a data-nav="about" class="text-on-surface-variant hover:text-primary py-2 font-label-lg text-label-lg"
                href="{{ $anchor('about') }}">{{ __('landing.nav.about') }}</a>
            <a data-nav="features"
                class="text-on-surface-variant hover:text-primary py-2 font-label-lg text-label-lg"
                href="{{ $anchor('features') }}">{{ __('landing.nav.features') }}</a>
            <a data-nav="stats" class="text-on-surface-variant hover:text-primary py-2 font-label-lg text-label-lg"
                href="{{ $anchor('stats') }}">{{ __('landing.nav.stats') }}</a>
            <a data-nav="how-it-works"
                class="text-on-surface-variant hover:text-primary py-2 font-label-lg text-label-lg"
                href="{{ $anchor('how-it-works') }}">{{ __('landing.nav.howItWorks') }}</a>
            <a data-nav="pricing" class="text-on-surface-variant hover:text-primary py-2 font-label-lg text-label-lg"
                href="{{ $anchor('pricing') }}">{{ __('landing.nav.pricing') }}</a>
            <div class="pt-3 border-t border-outline-variant/20 flex flex-col gap-3">
                <a class="text-on-surface-variant hover:text-primary py-1 font-label-lg text-label-lg font-semibold"
                    href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.faq.landing')) }}">{{ __('landing.nav.faq') }}</a>
                <a class="text-on-surface-variant hover:text-primary py-1 font-label-lg text-label-lg font-semibold"
                    href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.contact.landing')) }}">{{ __('landing.nav.contact') }}</a>
                <a class="text-on-surface-variant hover:text-primary py-1 font-label-lg text-label-lg"
                    href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.terms.landing')) }}">{{ __('landing.nav.terms') }}</a>
            </div>
            <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                <span
                    class="text-label-md font-label-md text-on-surface-variant">{{ __('landing.nav.language') }}</span>
                <div
                    class="flex items-center bg-surface-container-high p-1 rounded-full border border-outline-variant/40">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if (app()->getLocale() === $localeCode)
                            <span
                                class="px-3 py-1 rounded-full text-label-md font-label-md font-bold bg-primary text-on-primary">{{ $localeCode === 'ar' ? 'عربي' : 'EN' }}</span>
                        @else
                            <a class="px-3 py-1 rounded-full text-label-md font-label-md font-medium text-on-surface-variant"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $localeCode === 'ar' ? 'عربي' : 'EN' }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 pt-2">
                @guest
                    <a class="text-center py-2.5 rounded-lg border border-primary text-primary font-semibold text-label-lg font-label-lg"
                        href="{{ LaravelLocalization::getLocalizedURL($locale, route('login')) }}">{{ __('landing.nav.signIn') }}</a>
                    <a class="text-center custom-gradient-btn text-on-primary py-2.5 rounded-lg font-semibold text-label-lg font-label-lg"
                        href="{{ LaravelLocalization::getLocalizedURL($locale, route('register')) }}">{{ __('landing.nav.getStarted') }}</a>
                @endguest
                @auth
                    <a class="text-center custom-gradient-btn text-on-primary py-2.5 rounded-lg font-semibold text-label-lg font-label-lg col-span-2"
                        href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.home')) }}">{{ __('landing.nav.startNow') }}</a>
                @endauth
            </div>
        </div>
    </div>
</header>
