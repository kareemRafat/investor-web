<div>
<x-landing.navbar />
<div class="pt-16 md:pt-20">

<!-- Page Hero -->
<section class="relative pt-14 md:pt-20 pb-10 md:pb-12 overflow-hidden hero-pattern">
<div class="absolute top-0 left-1/2 -translate-x-1/2 w-[720px] max-w-full h-[320px] rounded-full pointer-events-none -z-10 bg-gradient-to-b from-[#005ba5]/10 via-[#00437d]/5 to-transparent blur-3xl"></div>
<div class="max-w-3xl mx-auto px-space-md md:px-margin text-center">
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-container-lowest border border-outline-variant/40 shadow-sm mb-5">
<span class="material-symbols-outlined text-[18px] text-primary">gavel</span>
<span class="text-label-md font-label-md font-semibold text-primary">{{ __('pages.terms.title') }}</span>
</div>
<h1 class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mb-4">{{ __('pages.terms.title') }}</h1>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ __('pages.terms.intro') }}</p>
</div>
</section>

<!-- Quick Jump Pills -->
<div class="max-w-4xl mx-auto px-space-md md:px-margin pb-8">
<div class="flex flex-wrap items-center justify-center gap-2">
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-acceptance"><span class="text-primary font-bold">01</span> {{ __('pages.terms.acceptance.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-obligations"><span class="text-primary font-bold">02</span> {{ __('pages.terms.obligations.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-intellectual"><span class="text-primary font-bold">03</span> {{ __('pages.terms.intellectual.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-disclaimer"><span class="text-primary font-bold">04</span> {{ __('pages.terms.disclaimer.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-liability"><span class="text-primary font-bold">05</span> {{ __('pages.terms.liability.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-termination"><span class="text-primary font-bold">06</span> {{ __('pages.terms.termination.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-law"><span class="text-primary font-bold">07</span> {{ __('pages.terms.law.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-changes"><span class="text-primary font-bold">08</span> {{ __('pages.terms.changes.title') }}</a>
<a class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/40 text-label-md font-label-md font-semibold text-on-surface-variant hover:text-primary hover:border-primary transition-colors" href="#t-contact"><span class="text-primary font-bold">09</span> {{ __('pages.terms.contact.title') }}</a>
</div>
</div>

<!-- Terms Sections -->
<div class="max-w-4xl mx-auto px-space-md md:px-margin pb-16 flex flex-col gap-5">

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-acceptance">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">task_alt</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">01</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.acceptance.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ __('pages.terms.acceptance.text') }}</p>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-obligations">
<div class="flex items-center gap-4 mb-4">
<div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">checklist</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">02</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.obligations.title') }}</h2>
</div>
</div>
<div class="flex flex-col gap-3">
@foreach(__('pages.terms.obligations.items') as $item)
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-[22px] text-primary shrink-0 mt-0.5">check_circle</span>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ $item }}</p>
</div>
@endforeach
</div>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-intellectual">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">copyright</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">03</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.intellectual.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ __('pages.terms.intellectual.text') }}</p>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-disclaimer">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">info</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">04</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.disclaimer.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ __('pages.terms.disclaimer.text') }}</p>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-liability">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">shield</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">05</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.liability.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ __('pages.terms.liability.text') }}</p>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-termination">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">block</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">06</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.termination.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ __('pages.terms.termination.text') }}</p>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-law">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">gavel</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">07</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.law.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ __('pages.terms.law.text') }}</p>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-changes">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">update</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">08</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.changes.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">{{ __('pages.terms.changes.text') }}</p>
</div>

<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8 scroll-mt-24" id="t-contact">
<div class="flex items-center gap-4 mb-3">
<div class="w-11 h-11 rounded-xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center shadow-sm shrink-0">
<span class="material-symbols-outlined text-[24px]">mail</span>
</div>
<div>
<div class="text-label-md font-label-md font-bold text-primary">09</div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.terms.contact.title') }}</h2>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-4">{{ __('pages.terms.contact.text') }}</p>
<span class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-outline-variant/30 text-primary font-semibold text-body-sm font-body-sm">
<span class="material-symbols-outlined text-[20px]">mail</span>{{ __('pages.terms.contact.email') }}
</span>
</div>

</div>

<!-- Back To Register -->
<div class="max-w-4xl mx-auto px-space-md md:px-margin pb-16 text-center">
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

<!-- Shared Footer -->
<x-landing.footer />
</div>
