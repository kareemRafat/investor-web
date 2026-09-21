<div>
    <x-landing.navbar />
    <div class="pt-16 md:pt-20"></div>

    <!-- Page Hero -->
    <section class="relative pt-14 md:pt-20 pb-10 md:pb-12 overflow-hidden hero-pattern">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[720px] max-w-full h-[320px] rounded-full pointer-events-none -z-10 bg-gradient-to-b from-[#005ba5]/10 via-[#00437d]/5 to-transparent blur-3xl"></div>
        <div class="max-w-3xl mx-auto px-space-md md:px-margin text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-container-lowest border border-outline-variant/40 shadow-sm mb-5">
                <span class="material-symbols-outlined text-[18px] text-primary">help</span>
                <span class="text-label-md font-label-md font-semibold text-primary">{{ __('landing.footer.faq') }}</span>
            </div>
            <h1 class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mb-4">{{ __('landing.footer.faq') }}</h1>
            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ __('landing.features.subtitle') }}</p>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <div class="max-w-3xl mx-auto px-space-md md:px-margin pb-16 flex flex-col gap-4">
        @foreach (range(1, 7) as $i)
            <details class="group bg-surface-container-lowest border border-outline-variant/30 rounded-2xl open:border-primary/40 transition-colors" @if($i === 1) open @endif>
                <summary class="flex items-center justify-between gap-4 p-5 md:p-6 cursor-pointer list-none font-headline-sm text-headline-sm text-on-surface [&::-webkit-details-marker]:hidden">
                    <span>{{ __('pages.faq.q' . $i) }}</span>
                    <span class="material-symbols-outlined text-[24px] text-primary shrink-0 transition-transform group-open:rotate-180">expand_more</span>
                </summary>
                <div class="px-5 md:px-6 pb-5 md:pb-6 font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    {{ __('pages.faq.a' . $i) }}
                </div>
            </details>
        @endforeach
    </div>

    <!-- CTA -->
    <div class="max-w-4xl mx-auto px-space-md md:px-margin pb-16 text-center">
        <p class="font-body-md text-body-md text-on-surface-variant mb-5">{{ __('landing.cta.subtitle') }}</p>
        @guest
            <a class="inline-flex items-center justify-center gap-2 custom-gradient-btn text-on-primary px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-semibold shadow-lg shadow-primary-container/25 hover:brightness-105 active:scale-[0.98] transition-all duration-150" href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}">
                <span>{{ __('landing.cta.btnPrimary') }}</span>
                <span class="material-symbols-outlined text-[20px] rtl-flip">arrow_forward</span>
            </a>
        @endguest
        @auth
            <a class="inline-flex items-center justify-center gap-2 custom-gradient-btn text-on-primary px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-semibold shadow-lg shadow-primary-container/25 hover:brightness-105 active:scale-[0.98] transition-all duration-150" href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.home')) }}">
                <span>{{ __('landing.cta.startNow') }}</span>
                <span class="material-symbols-outlined text-[20px] rtl-flip">arrow_forward</span>
            </a>
        @endauth
    </div>

    <x-landing.footer />
</div>
