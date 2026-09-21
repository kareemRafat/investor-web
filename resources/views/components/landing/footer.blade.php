@php
    $locale = app()->getLocale();
    $isLanding = Route::is('main.landing');
    $landingBase = LaravelLocalization::getLocalizedURL($locale, route('main.landing'));
    $anchor = fn(string $id) => $isLanding ? "#{$id}" : $landingBase . "#{$id}";
@endphp
<!-- Shared Public Footer (landing spirit) -->
<footer
    class="bg-surface-container dark:bg-inverse-surface border-t border-outline-variant/40 pt-space-2xl md:pt-space-3xl pb-10">
    <div class="max-w-[1280px] mx-auto px-space-md md:px-margin flex flex-col gap-space-xl">
        <!-- 4 Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Col 1: Brand & Bio -->
            <div class="lg:col-span-1 flex flex-col gap-4">
                <a class="inline-block group" href="{{ $landingBase }}">
                    <img alt="FIKRAPEDIA" class="h-12 w-auto object-contain"
                        src="{{ asset('images/logo.webp') }}">
                </a>
                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                    {{ __('landing.footer.desc') }}</p>
            </div>
            <!-- Col 2: Product -->
            <div>
                <h4 class="font-title-md text-title-md text-on-surface mb-4">{{ __('landing.footer.product') }}
                </h4>
                <ul class="flex flex-col gap-2.5">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-sm font-body-sm"
                            href="{{ $anchor('features') }}">{{ __('landing.nav.features') }}</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-sm font-body-sm"
                            href="{{ $anchor('how-it-works') }}">{{ __('landing.nav.howItWorks') }}</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-sm font-body-sm"
                            href="{{ $anchor('pricing') }}">{{ __('landing.footer.pricing') }}</a>
                    </li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-sm font-body-sm"
                            href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.faq.landing')) }}">{{ __('landing.footer.faq') }}</a>
                    </li>
                </ul>
            </div>
            <!-- Col 3: Company -->
            <div>
                <h4 class="font-title-md text-title-md text-on-surface mb-4">{{ __('landing.footer.company') }}
                </h4>
                <ul class="flex flex-col gap-2.5">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-sm font-body-sm"
                            href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.contact.landing')) }}">{{ __('landing.footer.contact') }}</a>
                    </li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-sm font-body-sm"
                            href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.privacy.landing')) }}">{{ __('landing.footer.privacy') }}</a>
                    </li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-sm font-body-sm"
                            href="{{ LaravelLocalization::getLocalizedURL($locale, route('main.terms.landing')) }}">{{ __('landing.footer.terms') }}</a>
                    </li>
                </ul>
            </div>
            <!-- Col 4: Locale -->
            <div>
                <h4 class="font-title-md text-title-md text-on-surface mb-3 flex items-center gap-2">
                    <x-heroicon-o-globe-alt class="w-5 h-5" />
                    <span>{{ __('landing.footer.locale') }}</span>
                </h4>
                <div class="grid grid-cols-2 gap-2">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if (app()->getLocale() === $localeCode)
                            <span
                                class="w-full py-2 px-3 text-center border rounded-lg text-label-md font-label-md font-bold bg-primary text-on-primary border-primary">{{ $properties['native'] }}</span>
                        @else
                            <a class="w-full py-2 px-3 text-center border border-outline-variant/40 rounded-lg text-label-md font-label-md font-bold bg-surface-container-lowest text-primary hover:border-primary transition-colors"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Bottom Bar -->
        <div
            class="pt-8 border-t border-outline-variant/30 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('landing.footer.copyright') }}</p>
            <!-- Social Links -->
            <div class="flex items-center gap-3">
                <a aria-label="Twitter/X"
                    class="w-9 h-9 rounded-full bg-surface-container-lowest border border-outline-variant/40 flex items-center justify-center text-on-surface-variant hover:text-primary hover:border-primary transition-colors"
                    href="#">
                    <x-heroicon-o-share class="w-[18px] h-[18px]" />
                </a>
                <a aria-label="LinkedIn"
                    class="w-9 h-9 rounded-full bg-surface-container-lowest border border-outline-variant/40 flex items-center justify-center text-on-surface-variant hover:text-primary hover:border-primary transition-colors"
                    href="#">
                    <x-heroicon-o-briefcase class="w-[18px] h-[18px]" />
                </a>
                <a aria-label="Community"
                    class="w-9 h-9 rounded-full bg-surface-container-lowest border border-outline-variant/40 flex items-center justify-center text-on-surface-variant hover:text-primary hover:border-primary transition-colors"
                    href="#">
                    <x-heroicon-o-globe-alt class="w-[18px] h-[18px]" />
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- Floating Scroll To Top Button with Progress Ring -->
<button aria-label="Scroll to top"
    class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-full bg-surface-container-lowest shadow-xl border border-outline-variant/40 flex items-center justify-center text-primary opacity-0 pointer-events-none transition-all duration-300 hover:scale-105 active:scale-95"
    id="scrollToTopBtn" onclick="scrollToTop()">
    <svg class="w-12 h-12 -rotate-90 absolute inset-0">
        <circle class="text-surface-container-high fill-none" cx="24" cy="24" r="20"
            stroke="currentColor" stroke-width="2.5"></circle>
        <circle class="text-primary fill-none transition-[stroke-dashoffset] duration-75" cx="24"
            cy="24" id="scrollProgress" r="20" stroke="currentColor" stroke-dasharray="125.6"
            stroke-dashoffset="125.6" stroke-width="2.5"></circle>
    </svg>
    <x-heroicon-o-chevron-up class="w-[22px] h-[22px] relative z-10" />
</button>
<script>
    // Mobile Menu Toggle (shared navbar)
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Scroll-to-Top with Circular Progress Indicator
    const scrollBtn = document.getElementById('scrollToTopBtn');
    const scrollCircle = document.getElementById('scrollProgress');
    const totalCircumference = 2 * Math.PI * 20; // radius = 20 => ~125.66

    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrollFraction = scrollHeight > 0 ? scrollTop / scrollHeight : 0;

        // Update circle progress
        const offset = totalCircumference - (scrollFraction * totalCircumference);
        if (scrollCircle) {
            scrollCircle.style.strokeDashoffset = offset;
        }

        // Show/Hide Button past 250px
        if (scrollTop > 250) {
            scrollBtn.classList.remove('opacity-0', 'pointer-events-none');
            scrollBtn.classList.add('opacity-100', 'pointer-events-auto');
        } else {
            scrollBtn.classList.add('opacity-0', 'pointer-events-none');
            scrollBtn.classList.remove('opacity-100', 'pointer-events-auto');
        }
    });

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>
