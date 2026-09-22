<div>
    <x-landing.navbar />
    <!-- Hero Section -->
    <section class="relative pt-28 md:pt-36 pb-space-2xl md:pb-space-3xl overflow-hidden hero-pattern">
        <!-- Ambient Blue Radial Glows -->
        <div
            class="absolute top-10 left-1/2 -translate-x-1/2 w-[720px] max-w-full h-[420px] rounded-full pointer-events-none -z-10 bg-gradient-to-b from-[#005ba5]/10 via-[#00437d]/5 to-transparent blur-3xl">
        </div>
        <div
            class="absolute top-1/4 right-1/4 translate-x-1/3 w-[360px] h-[280px] rounded-full pointer-events-none -z-10 bg-gradient-to-br from-[#fedc00]/15 via-[#ffe252]/5 to-transparent blur-3xl">
        </div>
        <div class="max-w-[1280px] mx-auto px-space-md md:px-margin text-center">
            <!-- Feature Pill Badge -->
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-container-lowest border border-outline-variant/40 shadow-sm mb-6">
                <x-heroicon-s-bolt class="w-[18px] h-[18px] text-secondary-container" />
                <span
                    class="text-label-md font-label-md font-semibold text-primary">{{ __('landing.hero.pill') }}</span>
            </div>
            <!-- Headline -->
            <h1
                class="font-headline-xl md:font-display text-headline-xl-mobile md:text-display text-on-surface max-w-4xl mx-auto leading-tight md:leading-[1.15] mb-6">
                <span>{{ __('landing.hero.title1') }}</span>
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#005BA5] via-[#00437d] to-[#6d5e00]">{{ __('landing.hero.titleHighlight') }}</span>
                <span>{{ __('landing.hero.title2') }}</span>
            </h1>
            <!-- Subtitle -->
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mb-10">
                {{ __('landing.hero.subtitle') }}</p>
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
                <a class="w-full sm:w-auto custom-gradient-btn text-on-primary px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-semibold shadow-lg shadow-primary-container/25 hover:brightness-105 active:scale-[0.98] transition-all duration-150 flex items-center justify-center gap-2 group"
                    href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('investor.index')) }}">
                    <span>{{ __('landing.hero.ctaPrimary') }}</span>
                    <x-heroicon-o-arrow-right
                        class="w-5 h-5 text-secondary-container group-hover:translate-x-1 rtl-flip transition-transform" />
                </a>
                <a class="w-full sm:w-auto bg-surface-container-lowest border-2 border-primary-container text-primary px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-semibold hover:bg-surface-container-high transition-colors duration-150 text-center"
                    href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('idea.index')) }}">{{ __('landing.hero.ctaSecondary') }}</a>
            </div>
            <!-- Trust Badges -->
            <div
                class="flex flex-wrap items-center justify-center gap-6 md:gap-10 pt-4 border-t border-outline-variant/30 max-w-2xl mx-auto">
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-primary"></span>
                    <span
                        class="font-label-md text-label-md font-semibold text-on-surface">{{ __('landing.hero.trust1') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-primary"></span>
                    <span
                        class="font-label-md text-label-md font-semibold text-on-surface">{{ __('landing.hero.trust2') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-primary"></span>
                    <span
                        class="font-label-md text-label-md font-semibold text-on-surface">{{ __('landing.hero.trust3') }}</span>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section
        class="py-space-2xl md:py-space-3xl bg-surface-container-low border-y border-outline-variant/30 scroll-mt-16 md:scroll-mt-20"
        id="about">
        <div class="max-w-[1280px] mx-auto px-space-md md:px-margin">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span
                    class="px-3.5 py-1 rounded-full bg-tertiary-fixed text-primary font-label-md text-label-md font-semibold">{{ __('landing.about.tag') }}</span>
                <h2
                    class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mt-3 mb-4">
                    {{ __('landing.about.heading') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.about.subheading') }}</p>
            </div>
            <!-- Two-Column Showcase -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch mb-16">
                <!-- Left Storytelling Column (lg:col-span-7) -->
                <div
                    class="lg:col-span-7 bg-surface-container-lowest p-8 md:p-10 rounded-2xl border border-outline-variant/40 shadow-sm flex flex-col justify-between relative overflow-hidden">
                    <!-- Ambient Glow Background Element -->
                    <div
                        class="absolute -top-16 -right-16 w-48 h-48 bg-gradient-to-br from-[#005ba5]/10 to-transparent rounded-full blur-2xl pointer-events-none -z-10">
                    </div>
                    <div
                        class="absolute -bottom-16 -left-16 w-48 h-48 bg-gradient-to-tr from-[#fedc00]/10 to-transparent rounded-full blur-2xl pointer-events-none -z-10">
                    </div>

                    <div>
                        <!-- Branded Pill Badge -->
                        <div
                            class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-surface-container-low border border-outline-variant/40 mb-4">
                            <x-heroicon-o-chart-bar class="w-4 h-4 text-primary" />
                            <span
                                class="font-label-md text-label-md font-bold tracking-wider text-primary uppercase">{{ __('landing.about.storyBadge') }}</span>
                        </div>

                        <!-- Narrative Heading -->
                        <h3
                            class="font-headline-lg md:font-headline-xl text-headline-sm md:text-headline-md font-bold text-on-surface tracking-tight mb-4">
                            {{ __('landing.about.storyTitle') }}
                        </h3>

                        <!-- Narrative Story Text -->
                        <div class="space-y-3 mb-8">
                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                                {{ __('landing.about.p1') }}
                            </p>
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                                {{ __('landing.about.p2') }}
                            </p>
                        </div>

                        <!-- 2-Column Mini-Card Feature Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                            <!-- Card 1: Precision Matchmaking Engine -->
                            <div
                                class="p-4 rounded-xl bg-surface-container-low/70 border border-outline-variant/30 hover:border-primary/40 transition-colors flex flex-col gap-2.5">
                                <div
                                    class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center text-primary flex-shrink-0">
                                    <x-heroicon-o-circle-stack class="w-[22px] h-[22px]" />
                                </div>
                                <div>
                                    <h4 class="font-title-md text-body-md font-bold text-on-surface mb-1">
                                        {{ __('landing.about.mini1Title') }}</h4>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                                        {{ __('landing.about.mini1Desc') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Card 2: Institutional Deal Rooms -->
                            <div
                                class="p-4 rounded-xl bg-surface-container-low/70 border border-outline-variant/30 hover:border-primary/40 transition-colors flex flex-col gap-2.5">
                                <div
                                    class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center text-primary flex-shrink-0">
                                    <x-heroicon-o-shield-check class="w-[22px] h-[22px]" />
                                </div>
                                <div>
                                    <h4 class="font-title-md text-body-md font-bold text-on-surface mb-1">
                                        {{ __('landing.about.mini2Title') }}</h4>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                                        {{ __('landing.about.mini2Desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trust Badge Pills Row -->
                    <div class="pt-4 border-t border-outline-variant/30 flex flex-wrap items-center gap-2.5">
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-label-md font-semibold">
                            <span class="text-secondary font-bold">✓</span> {{ __('landing.about.badge1') }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-label-md font-semibold">
                            <span class="text-secondary font-bold">✓</span> {{ __('landing.about.badge2') }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container/30 text-on-surface text-label-md font-semibold">
                            <span class="text-primary font-bold">✓</span> {{ __('landing.about.badge3') }}
                        </span>
                    </div>
                </div>

                <!-- Right Stat Showcase Column (lg:col-span-5) -->
                <div class="lg:col-span-5 flex flex-col">
                    <div
                        class="relative bg-gradient-to-br from-surface-container-lowest via-surface-container-low to-surface-container-high p-8 md:p-10 rounded-2xl border border-primary/20 shadow-md flex flex-col justify-start gap-8 h-full overflow-hidden">
                        <!-- Top Branded Indicator Pill -->
                        <div class="flex items-center justify-between">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-fixed font-label-md text-label-md font-bold shadow-sm">
                                <span class="h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                                <span>{{ __('landing.about.verifiedPill') }}</span>
                            </div>
                            <div
                                class="w-9 h-9 rounded-lg bg-surface-container flex items-center justify-center text-primary border border-outline-variant/30">
                                <x-heroicon-o-trophy class="w-5 h-5" />
                            </div>
                        </div>

                        <!-- Metric Stats Block -->
                        <div class="flex flex-col gap-6">
                            <!-- Stat 1 -->
                            <div class="flex flex-col">
                                <div
                                    class="font-display text-display text-primary leading-none font-extrabold flex items-baseline gap-1">
                                    <span
                                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary-container">5+</span>
                                </div>
                                <div class="font-title-md text-title-md text-on-surface font-bold mt-2">
                                    {{ __('landing.about.yearsTitle') }}</div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
                                    {{ __('landing.about.yearsDesc') }}
                                </p>
                            </div>

                            <!-- Divider Line -->
                            <div
                                class="h-px w-full bg-gradient-to-r from-outline-variant/40 via-outline-variant/20 to-transparent">
                            </div>

                            <!-- Stat 2 -->
                            <div class="flex flex-col">
                                <div
                                    class="font-display text-display text-primary leading-none font-extrabold flex items-baseline gap-1">
                                    <span
                                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary-container">50+</span>
                                </div>
                                <div class="font-title-md text-title-md text-on-surface font-bold mt-2">
                                    {{ __('landing.about.countriesTitle') }}</div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">
                                    {{ __('landing.about.countriesDesc') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Feature Cards: Mission, Vision, Values -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6"><!-- Mission -->
                <div
                    class="group bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div
                            class="w-full h-44 rounded-xl overflow-hidden mb-5 bg-surface-container-low border border-outline-variant/30 group-hover:scale-[1.02] transition-transform duration-300">
                            <img src="{{ asset('images/landing/mission.webp') }}"
                                alt="{{ __('landing.about.missionTitle') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
                                <x-heroicon-o-viewfinder-circle class="w-5 h-5" />
                            </div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                {{ __('landing.about.missionTitle') }}</h4>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            {{ __('landing.about.missionDesc') }}</p>
                    </div>
                </div>
                <!-- Vision -->
                <div
                    class="group bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div
                            class="w-full h-44 rounded-xl overflow-hidden mb-5 bg-surface-container-low border border-outline-variant/30 group-hover:scale-[1.02] transition-transform duration-300">
                            <img src="{{ asset('images/landing/vision.webp') }}"
                                alt="{{ __('landing.about.visionTitle') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
                                <x-heroicon-o-eye class="w-5 h-5" />
                            </div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                {{ __('landing.about.visionTitle') }}</h4>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            {{ __('landing.about.visionDesc') }}</p>
                    </div>
                </div>
                <!-- Values -->
                <div
                    class="group bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/40 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div
                            class="w-full h-44 rounded-xl overflow-hidden mb-5 bg-surface-container-low border border-outline-variant/30 group-hover:scale-[1.02] transition-transform duration-300">
                            <img src="{{ asset('images/landing/values.webp') }}"
                                alt="{{ __('landing.about.valuesTitle') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
                                <x-heroicon-s-heart class="w-5 h-5" />
                            </div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface">
                                {{ __('landing.about.valuesTitle') }}</h4>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            {{ __('landing.about.valuesDesc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section -->
    <section class="py-space-2xl md:py-space-3xl bg-surface-container-lowest scroll-mt-16 md:scroll-mt-20"
        id="features">
        <div class="max-w-[1280px] mx-auto px-space-md md:px-margin">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span
                    class="px-3.5 py-1 rounded-full bg-secondary-container text-on-secondary-fixed font-label-md text-label-md font-bold">{{ __('landing.features.tag') }}</span>
                <h2
                    class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mt-3 mb-4">
                    {{ __('landing.features.title') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.features.subtitle') }}</p>
            </div>
            <!-- 6 Interactive Cards (3-column grid) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="p-8 rounded-2xl border border-outline-variant/40 bg-surface-container-lowest hover:border-primary-container/60 hover:-translate-y-1 transition-all duration-200 hover:shadow-lg">
                    <div
                        class="w-14 h-14 rounded-2xl bg-surface-container flex items-center justify-center text-primary mb-6 border border-outline-variant/30">
                        <x-heroicon-o-light-bulb class="w-[30px] h-[30px]" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">
                        {{ __('landing.features.f1Title') }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.features.f1Desc') }}
                    </p>
                </div>
                <!-- Feature 2 -->
                <div
                    class="p-8 rounded-2xl border border-outline-variant/40 bg-surface-container-lowest hover:border-primary-container/60 hover:-translate-y-1 transition-all duration-200 hover:shadow-lg">
                    <div
                        class="w-14 h-14 rounded-2xl bg-surface-container flex items-center justify-center text-primary mb-6 border border-outline-variant/30">
                        <x-heroicon-o-user-group class="w-[30px] h-[30px]" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">
                        {{ __('landing.features.f2Title') }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.features.f2Desc') }}
                    </p>
                </div>
                <!-- Feature 3 -->
                <div
                    class="p-8 rounded-2xl border border-outline-variant/40 bg-surface-container-lowest hover:border-primary-container/60 hover:-translate-y-1 transition-all duration-200 hover:shadow-lg">
                    <div
                        class="w-14 h-14 rounded-2xl bg-surface-container flex items-center justify-center text-primary mb-6 border border-outline-variant/30">
                        <x-heroicon-o-users class="w-[30px] h-[30px]" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">
                        {{ __('landing.features.f3Title') }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.features.f3Desc') }}
                    </p>
                </div>
                <!-- Feature 4 -->
                <div
                    class="p-8 rounded-2xl border border-outline-variant/40 bg-surface-container-lowest hover:border-primary-container/60 hover:-translate-y-1 transition-all duration-200 hover:shadow-lg">
                    <div
                        class="w-14 h-14 rounded-2xl bg-surface-container flex items-center justify-center text-primary mb-6 border border-outline-variant/30">
                        <x-heroicon-o-shield-check class="w-[30px] h-[30px]" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">
                        {{ __('landing.features.f4Title') }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.features.f4Desc') }}
                    </p>
                </div>
                <!-- Feature 5 -->
                <div
                    class="p-8 rounded-2xl border border-outline-variant/40 bg-surface-container-lowest hover:border-primary-container/60 hover:-translate-y-1 transition-all duration-200 hover:shadow-lg">
                    <div
                        class="w-14 h-14 rounded-2xl bg-surface-container flex items-center justify-center text-primary mb-6 border border-outline-variant/30">
                        <x-heroicon-o-chart-bar-square class="w-[30px] h-[30px]" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">
                        {{ __('landing.features.f5Title') }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.features.f5Desc') }}
                    </p>
                </div>
                <!-- Feature 6 -->
                <div
                    class="p-8 rounded-2xl border border-outline-variant/40 bg-surface-container-lowest hover:border-primary-container/60 hover:-translate-y-1 transition-all duration-200 hover:shadow-lg">
                    <div
                        class="w-14 h-14 rounded-2xl bg-surface-container flex items-center justify-center text-primary mb-6 border border-outline-variant/30">
                        <x-heroicon-s-bolt class="w-[30px] h-[30px]" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">
                        {{ __('landing.features.f6Title') }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.features.f6Desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Stats Band -->
    <section
        class="relative py-16 md:py-20 custom-gradient-btn text-on-primary overflow-hidden scroll-mt-16 md:scroll-mt-20"
        id="stats">
        <div
            class="absolute -top-20 -left-20 w-72 h-72 bg-secondary-container/10 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute -bottom-20 -right-20 w-72 h-72 bg-primary-container/20 rounded-full blur-3xl pointer-events-none">
        </div>
        <div class="max-w-[1100px] mx-auto px-space-md md:px-margin relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span
                    class="text-secondary-container font-label-md text-label-md font-semibold uppercase tracking-wider">{{ __('landing.stats.tag') }}</span>
                <h2
                    class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-primary mt-2 mb-3">
                    {{ __('landing.stats.title') }}</h2>
                <p class="font-body-md text-body-md text-tertiary-fixed">{{ __('landing.stats.subtitle') }}</p>
            </div>
            @php($pctSuffix = app()->getLocale() === 'ar' ? '٪' : '%')
            <div
                class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-white/20 border border-white/20 rounded-2xl overflow-hidden shadow-lg">
                <div class="bg-surface-container-lowest py-8 px-6 text-center">
                    <div class="font-headline-lg text-headline-lg font-extrabold text-primary leading-none"><span
                            class="count-up" data-target="90" data-decimals="0" data-prefix=""
                            data-suffix="{{ $pctSuffix }}">{{ app()->getLocale() === 'ar' ? '٩٠٪' : '90%' }}</span></div>
                    <div class="font-body-sm text-body-sm text-on-surface-variant font-medium mt-2">
                        {{ __('landing.stats.c1Label') }}</div>
                </div>
                <div class="bg-surface-container-lowest py-8 px-6 text-center">
                    <div class="font-headline-lg text-headline-lg font-extrabold text-primary leading-none"><span
                            class="count-up" data-target="88" data-decimals="0" data-prefix=""
                            data-suffix="{{ $pctSuffix }}">{{ app()->getLocale() === 'ar' ? '٨٨٪' : '88%' }}</span></div>
                    <div class="font-body-sm text-body-sm text-on-surface-variant font-medium mt-2">
                        {{ __('landing.stats.c2Label') }}</div>
                </div>
                <div class="bg-surface-container-lowest py-8 px-6 text-center">
                    <div class="font-headline-lg text-headline-lg font-extrabold text-primary leading-none"><span
                            class="count-up" data-target="75" data-decimals="0" data-prefix=""
                            data-suffix="{{ $pctSuffix }}">{{ app()->getLocale() === 'ar' ? '٧٥٪' : '75%' }}</span></div>
                    <div class="font-body-sm text-body-sm text-on-surface-variant font-medium mt-2">
                        {{ __('landing.stats.c3Label') }}</div>
                </div>
                <div class="bg-surface-container-lowest py-8 px-6 text-center">
                    <div class="font-headline-lg text-headline-lg font-extrabold text-primary leading-none"><span
                            class="count-up" data-target="98" data-decimals="0" data-prefix=""
                            data-suffix="{{ $pctSuffix }}">{{ app()->getLocale() === 'ar' ? '٩٨٪' : '98%' }}</span></div>
                    <div class="font-body-sm text-body-sm text-on-surface-variant font-medium mt-2">
                        {{ __('landing.stats.c4Label') }}</div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Works Section -->
    <section
        class="py-space-2xl md:py-space-3xl bg-surface-container-low border-t border-outline-variant/30 relative scroll-mt-16 md:scroll-mt-20"
        id="how-it-works">
        <div class="max-w-[1280px] mx-auto px-space-md md:px-margin">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span
                    class="px-3.5 py-1 rounded-full bg-tertiary-fixed text-primary font-label-md text-label-md font-semibold">{{ __('landing.hiw.tag') }}</span>
                <h2
                    class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mt-3 mb-4">
                    {{ __('landing.hiw.title') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ __('landing.hiw.subtitle') }}</p>
            </div>
            <!-- 4 Connected Steps Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative">
                <!-- Step 1 -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 flex flex-col justify-between shadow-sm relative group hover:border-primary transition-colors">
                    <div>
                        <div
                            class="w-12 h-12 rounded-xl custom-gradient-btn text-on-primary font-bold font-headline-sm text-headline-sm flex items-center justify-center mb-6 shadow-sm">
                            01
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">
                            {{ __('landing.hiw.s1Title') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('landing.hiw.s1Desc') }}
                        </p>
                    </div>
                    <div
                        class="mt-6 pt-4 border-t border-outline-variant/20 flex items-center text-primary font-label-md text-label-md font-semibold gap-1">
                        <span>{{ __('landing.hiw.s1Foot') }}</span>
                        <x-heroicon-o-chevron-right class="w-4 h-4 rtl-flip" />
                    </div>
                </div>
                <!-- Step 2 -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 flex flex-col justify-between shadow-sm relative group hover:border-primary transition-colors">
                    <div>
                        <div
                            class="w-12 h-12 rounded-xl custom-gradient-btn text-on-primary font-bold font-headline-sm text-headline-sm flex items-center justify-center mb-6 shadow-sm">
                            02
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">
                            {{ __('landing.hiw.s2Title') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('landing.hiw.s2Desc') }}
                        </p>
                    </div>
                    <div
                        class="mt-6 pt-4 border-t border-outline-variant/20 flex items-center text-primary font-label-md text-label-md font-semibold gap-1">
                        <span>{{ __('landing.hiw.s2Foot') }}</span>
                        <x-heroicon-o-chevron-right class="w-4 h-4 rtl-flip" />
                    </div>
                </div>
                <!-- Step 3 -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 flex flex-col justify-between shadow-sm relative group hover:border-primary transition-colors">
                    <div>
                        <div
                            class="w-12 h-12 rounded-xl custom-gradient-btn text-on-primary font-bold font-headline-sm text-headline-sm flex items-center justify-center mb-6 shadow-sm">
                            03
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">
                            {{ __('landing.hiw.s3Title') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('landing.hiw.s3Desc') }}
                        </p>
                    </div>
                    <div
                        class="mt-6 pt-4 border-t border-outline-variant/20 flex items-center text-primary font-label-md text-label-md font-semibold gap-1">
                        <span>{{ __('landing.hiw.s3Foot') }}</span>
                        <x-heroicon-o-chevron-right class="w-4 h-4 rtl-flip" />
                    </div>
                </div>
                <!-- Step 4 -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 flex flex-col justify-between shadow-sm relative group hover:border-primary transition-colors">
                    <div>
                        <div
                            class="w-12 h-12 rounded-xl bg-secondary-container text-on-secondary-fixed font-bold font-headline-sm text-headline-sm flex items-center justify-center mb-6 shadow-sm">
                            04
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">
                            {{ __('landing.hiw.s4Title') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('landing.hiw.s4Desc') }}
                        </p>
                    </div>
                    <div
                        class="mt-6 pt-4 border-t border-outline-variant/20 flex items-center text-primary font-label-md text-label-md font-semibold gap-1">
                        <span>{{ __('landing.hiw.s4Foot') }}</span>
                        <x-heroicon-o-chevron-right class="w-4 h-4 rtl-flip" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section -->
    <section
        class="py-space-2xl md:py-space-3xl bg-surface-container-lowest border-t border-outline-variant/30 scroll-mt-16 md:scroll-mt-20"
        id="pricing">
        <div class="max-w-[1280px] mx-auto px-space-md md:px-margin">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span
                    class="px-3.5 py-1 rounded-full bg-secondary-container text-on-secondary-fixed font-label-md text-label-md font-bold">{{ __('landing.footer.pricing') }}</span>
                <h2
                    class="font-headline-lg md:font-headline-xl text-headline-lg-mobile md:text-headline-xl text-on-surface mt-3 mb-4">
                    {{ __('pages.pricing.title') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ __('pages.pricing.subtitle') }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch pt-6">
                <!-- Free -->
                <div
                    class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl border {{ $this->isUpgrade('free') ? 'border-primary shadow-lg' : 'border-outline-variant/40' }} flex flex-col">
                    @if ($this->isUpgrade('free'))
                        <span
                            class="self-center -mt-10 mb-4 px-4 py-1.5 rounded-full bg-primary text-on-primary text-label-md font-label-md font-bold shadow">{{ __('pages.pricing.upgrade') }}</span>
                    @endif
                    <div
                        class="w-11 h-11 rounded-xl bg-secondary-container/40 text-primary flex items-center justify-center mb-4">
                        <x-heroicon-o-rocket-launch class="w-6 h-6" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">
                        {{ __('pages.pricing.free_title') }}</h3>
                    <p class="font-display text-display text-on-surface font-extrabold leading-none mb-6">
                        {{ __('pages.pricing.price_free') }}</p>
                    <ul class="flex flex-col gap-3 mb-8 grow">
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.browse_ideas') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.browse_investors') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.support') }}
                        </li>
                    </ul>
                    @guest
                        <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}"
                            class="text-center border-2 border-primary text-primary px-6 py-3 rounded-lg font-headline-sm text-headline-sm font-semibold hover:bg-surface-container-high transition-colors">{{ __('pages.pricing.choose_plan') }}</a>
                    @else
                        <button wire:click="selectPlan('free')" @disabled(auth()->user()?->plan_type === \App\Enums\PlanType::FREE)
                            class="border-2 border-primary text-primary px-6 py-3 rounded-lg font-headline-sm text-headline-sm font-semibold hover:bg-surface-container-high transition-colors disabled:opacity-50">{{ auth()->user()?->plan_type === \App\Enums\PlanType::FREE ? __('pages.pricing.current_plan') : __('pages.pricing.choose_plan') }}</button>
                    @endguest
                </div>

                <!-- Monthly -->
                <div
                    class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl border {{ $this->isUpgrade('monthly') ? 'border-primary shadow-lg' : 'border-outline-variant/40' }} flex flex-col relative">
                    @if ($this->isUpgrade('monthly'))
                        <span
                            class="self-center -mt-10 mb-4 px-4 py-1.5 rounded-full bg-primary text-on-primary text-label-md font-label-md font-bold shadow">{{ __('pages.pricing.upgrade') }}</span>
                    @endif
                    <div
                        class="w-11 h-11 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center shadow-sm mb-4">
                        <x-heroicon-o-sparkles class="w-6 h-6" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">
                        {{ __('pages.pricing.monthly_title') }}</h3>
                    <p class="mb-6"><span
                            class="font-display text-display text-primary font-extrabold leading-none">{{ __('pages.pricing.price_monthly') }}</span>
                        <span
                            class="font-body-sm text-body-sm text-on-surface-variant">{{ __('pages.pricing.per_month') }}</span>
                    </p>
                    <ul class="flex flex-col gap-3 mb-8 grow">
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.browse_ideas') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.browse_investors') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.monthly_credits') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.open_contact_posts') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.priority_support') }}
                        </li>
                    </ul>
                    @guest
                        <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}"
                            class="text-center custom-gradient-btn text-on-primary px-6 py-3 rounded-lg font-headline-sm text-headline-sm font-semibold shadow-lg shadow-primary-container/25 hover:brightness-105 active:scale-[0.98] transition-all">{{ __('pages.pricing.choose_plan') }}</a>
                    @else
                        <a href="{{ route('payment.page', ['plan' => 'monthly']) }}"
                            class="text-center custom-gradient-btn text-on-primary px-6 py-3 rounded-lg font-headline-sm text-headline-sm font-semibold shadow-lg shadow-primary-container/25 hover:brightness-105 active:scale-[0.98] transition-all">{{ auth()->user()?->plan_type === \App\Enums\PlanType::MONTHLY ? __('pages.pricing.current_plan') : __('pages.pricing.choose_plan') }}</a>
                    @endauth
                </div>

                <!-- Yearly -->
                <div
                    class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl border {{ $this->isUpgrade('yearly') ? 'border-primary shadow-lg' : 'border-outline-variant/40' }} flex flex-col relative">
                    <span
                        class="absolute top-4 end-4 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-fixed text-label-md font-label-md font-bold">{{ __('pages.pricing.save_20') }}</span>
                    @if ($this->isUpgrade('yearly'))
                        <span
                            class="self-center -mt-10 mb-4 px-4 py-1.5 rounded-full bg-primary text-on-primary text-label-md font-label-md font-bold shadow">{{ __('pages.pricing.upgrade') }}</span>
                    @endif
                    <div
                        class="w-11 h-11 rounded-xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center shadow-sm mb-4">
                        <x-heroicon-o-trophy class="w-6 h-6" />
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">
                        {{ __('pages.pricing.yearly_title') }}</h3>
                    <p class="mb-6"><span
                            class="font-display text-display text-on-surface font-extrabold leading-none">{{ __('pages.pricing.price_yearly') }}</span>
                        <span
                            class="font-body-sm text-body-sm text-on-surface-variant">{{ __('pages.pricing.per_year') }}</span>
                    </p>
                    <ul class="flex flex-col gap-3 mb-8 grow">
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.browse_ideas') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.browse_investors') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.monthly_credits') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.open_contact_posts') }}
                        </li>
                        <li class="flex items-start gap-2.5 font-body-sm text-body-sm text-on-surface-variant"><x-heroicon-o-check-circle class="w-5 h-5 text-primary shrink-0" />{{ __('pages.pricing.features.whatsapp_support') }}
                        </li>
                    </ul>
                    @guest
                        <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}"
                            class="text-center border-2 border-primary text-primary px-6 py-3 rounded-lg font-headline-sm text-headline-sm font-semibold hover:bg-surface-container-high transition-colors">{{ __('pages.pricing.choose_plan') }}</a>
                    @else
                        <a href="{{ route('payment.page', ['plan' => 'yearly']) }}"
                            class="text-center border-2 border-primary text-primary px-6 py-3 rounded-lg font-headline-sm text-headline-sm font-semibold hover:bg-surface-container-high transition-colors">{{ auth()->user()?->plan_type === \App\Enums\PlanType::YEARLY ? __('pages.pricing.current_plan') : __('pages.pricing.choose_plan') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
    <!-- Final CTA Band -->
    <section
        class="relative py-space-2xl md:py-space-3xl overflow-hidden custom-gradient-btn text-on-primary scroll-mt-16 md:scroll-mt-20"
        id="cta">
        <!-- Subtle Golden/Blue ambient glow circles -->
        <div
            class="absolute -top-24 -left-24 w-96 h-96 bg-secondary-container/10 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary-container/20 rounded-full blur-3xl pointer-events-none">
        </div>
        <div class="max-w-[1280px] mx-auto px-space-md md:px-margin text-center relative z-10">
            <h2
                class="font-headline-xl md:font-display text-headline-xl-mobile md:text-display max-w-3xl mx-auto leading-tight mb-6">
                {{ __('landing.cta.title') }}</h2>
            <p class="font-body-lg text-body-lg text-tertiary-fixed max-w-2xl mx-auto mb-10">
                {{ __('landing.cta.subtitle') }}</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                @guest
                    <a class="w-full sm:w-auto bg-secondary-container text-on-secondary-fixed px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-bold shadow-lg hover:brightness-105 active:scale-[0.98] transition-all duration-150 flex items-center justify-center gap-2"
                        href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}">
                        <span>{{ __('landing.cta.btnPrimary') }}</span>
                        <x-heroicon-o-arrow-right class="w-5 h-5 rtl-flip" />
                    </a>
                @endguest
                @auth
                    <a class="w-full sm:w-auto bg-secondary-container text-on-secondary-fixed px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-bold shadow-lg hover:brightness-105 active:scale-[0.98] transition-all duration-150 flex items-center justify-center gap-2"
                        href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.home')) }}">
                        <span>{{ __('landing.cta.startNow') }}</span>
                        <x-heroicon-o-arrow-right class="w-5 h-5 rtl-flip" />
                    </a>
                @endauth
            </div>
        </div>
    </section>
    <x-landing.footer />
    <!-- Landing-specific JavaScript (scroll-spy + count-up). Mobile menu + scroll-to-top live in x-landing.footer. -->
    <script>

        // Navbar scroll-spy: highlight the link of the section currently in view
        const navLinks = document.querySelectorAll('[data-nav]');
        const spySections = ['about', 'features', 'stats', 'how-it-works', 'pricing']
            .map((id) => document.getElementById(id))
            .filter(Boolean);

        function setActiveNav(id) {
            navLinks.forEach((link) => {
                const active = link.dataset.nav === id;
                const inDrawer = !!link.closest('#mobile-menu');
                link.classList.toggle('text-primary', active);
                link.classList.toggle('text-on-surface-variant', !active);
                if (!inDrawer) {
                    link.classList.toggle('border-primary', active);
                    link.classList.toggle('border-transparent', !active);
                }
            });
        }
        setActiveNav('about');
        if ('IntersectionObserver' in window && spySections.length) {
            const spy = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        setActiveNav(entry.target.id);
                    }
                });
            }, {
                rootMargin: '-40% 0px -55% 0px'
            });
            spySections.forEach((section) => spy.observe(section));
        }

        // Animated Count-Up for Stat Numbers (runs once when scrolled into view)
        function animateCountUp(el) {
            const target = parseFloat(el.dataset.target || '0');
            const decimals = parseInt(el.dataset.decimals || '0', 10);
            const prefix = el.dataset.prefix || '';
            const suffix = el.dataset.suffix || '';
            const numberLocale = document.documentElement.lang === 'ar' ? 'ar-EG' : 'en-US';
            const duration = 2000;
            const startTime = performance.now();

            function tick(now) {
                const progress = Math.min((now - startTime) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const value = target * eased;
                el.textContent = prefix + value.toLocaleString(numberLocale, {
                    minimumFractionDigits: decimals,
                    maximumFractionDigits: decimals
                }) + suffix;
                if (progress < 1) {
                    requestAnimationFrame(tick);
                }
            }
            requestAnimationFrame(tick);
        }

        const counters = document.querySelectorAll('.count-up');
        if (counters.length) {
            if ('IntersectionObserver' in window) {
                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateCountUp(entry.target);
                            counterObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.4
                });
                counters.forEach((el) => counterObserver.observe(el));
            } else {
                counters.forEach(animateCountUp);
            }
        }
    </script>
</div>
