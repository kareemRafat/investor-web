<div>
    <x-landing.navbar />
    <div class="pt-16 md:pt-20"></div>

    <!-- Page Hero -->
    <section class="relative pt-14 md:pt-20 pb-10 md:pb-12 overflow-hidden hero-pattern">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[720px] max-w-full h-[320px] rounded-full pointer-events-none -z-10 bg-gradient-to-b from-[#005ba5]/10 via-[#00437d]/5 to-transparent blur-3xl"></div>
        <div class="max-w-3xl mx-auto px-space-md md:px-margin text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-container-lowest border border-outline-variant/40 shadow-sm mb-5">
                <span class="material-symbols-outlined text-[18px] text-primary">shield</span>
                <span class="text-label-md font-label-md font-semibold text-primary">{{ __('landing.footer.privacy') }}</span>
            </div>
            <h1 class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mb-4">{{ __('landing.footer.privacy') }}</h1>
            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ __('pages.privacy.intro') }}</p>
        </div>
    </section>

    <!-- Privacy Sections -->
    <div class="max-w-4xl mx-auto px-space-md md:px-margin pb-16 flex flex-col gap-5">
        <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-3">
                <div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
                    <span class="material-symbols-outlined text-[24px]">database</span>
                </div>
                <h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.privacy.collect.title') }}</h2>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant mb-3">{{ __('pages.privacy.collect.subtitle') }}</p>
            <ul class="flex flex-col gap-2.5">
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.collect.items.name') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.collect.items.email') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.collect.items.phone') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.collect.items.user_type') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.collect.items.usage') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.collect.items.cookies') }}</li>
            </ul>
        </div>

        <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-3">
                <div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
                    <span class="material-symbols-outlined text-[24px]">task_alt</span>
                </div>
                <h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.privacy.use.title') }}</h2>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant mb-3">{{ __('pages.privacy.use.subtitle') }}</p>
            <ul class="flex flex-col gap-2.5">
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.use.items.experience') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.use.items.communicate') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.use.items.offers') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.use.items.analysis') }}</li>
            </ul>
        </div>

        <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-3">
                <div class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm shrink-0">
                    <span class="material-symbols-outlined text-[24px]">share</span>
                </div>
                <h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.privacy.sharing.title') }}</h2>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant mb-3">{{ __('pages.privacy.sharing.desc') }}</p>
            <ul class="flex flex-col gap-2.5">
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.sharing.items.consent') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.sharing.items.legal') }}</li>
                <li class="flex items-start gap-2.5 font-body-md text-body-md text-on-surface-variant"><span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.sharing.items.partners') }}</li>
            </ul>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8">
                <div class="w-11 h-11 rounded-xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center shadow-sm mb-3">
                    <span class="material-symbols-outlined text-[24px]">lock</span>
                </div>
                <h2 class="font-headline-sm text-headline-sm text-on-surface mb-2">{{ __('pages.privacy.security.title') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ __('pages.privacy.security.desc') }}</p>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8">
                <div class="w-11 h-11 rounded-xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center shadow-sm mb-3">
                    <span class="material-symbols-outlined text-[24px]">verified_user</span>
                </div>
                <h2 class="font-headline-sm text-headline-sm text-on-surface mb-2">{{ __('pages.privacy.rights.title') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-3">{{ __('pages.privacy.rights.desc') }}</p>
                <ul class="flex flex-col gap-2">
                    <li class="flex items-start gap-2 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.rights.items.access') }}</li>
                    <li class="flex items-start gap-2 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.rights.items.modify') }}</li>
                    <li class="flex items-start gap-2 font-body-sm text-body-sm text-on-surface-variant"><span class="material-symbols-outlined text-[18px] text-primary shrink-0 mt-0.5">check_circle</span>{{ __('pages.privacy.rights.items.withdraw') }}</li>
                </ul>
            </div>
        </div>

        <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-3">
                <div class="w-11 h-11 rounded-xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center shadow-sm shrink-0">
                    <span class="material-symbols-outlined text-[24px]">mail</span>
                </div>
                <h2 class="font-headline-sm text-headline-sm text-on-surface">{{ __('pages.privacy.contact.title') }}</h2>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-4">{{ __('pages.privacy.contact.desc') }}</p>
            <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.contact.landing')) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-surface-container-low border border-outline-variant/30 text-primary font-semibold text-body-sm font-body-sm hover:border-primary transition-colors">
                <span class="material-symbols-outlined text-[20px]">support_agent</span>{{ __('landing.footer.contact') }}
            </a>
        </div>
    </div>

    <x-landing.footer />
</div>
