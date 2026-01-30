<div x-data="{
    mobileMenuOpen: false,
    scrolled: false,
    scrollPercent: 0,
    showScrollTop: false,
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
            this.showScrollTop = window.scrollY > 300;

            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            this.scrollPercent = (winScroll / height) * 100;
        });
    },
    scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 glass py-3">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center shadow-glow group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><line x1="12" x2="12" y1="20" y2="10"></line><line x1="18" x2="18" y1="20" y2="4"></line><line x1="6" x2="6" y1="20" y2="16"></line></svg>
                    </div>
                    <span class="font-heading font-bold text-xl">{{ __('landing.brand') }}</span>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#about" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.about') }}</a>
                    <a href="#features" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.features') }}</a>
                    <a href="#how-it-works" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.howItWorks') }}</a>
                    <a href="#stats" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.stats') }}</a>
                </div>

                <!-- Desktop Buttons -->
                <div class="hidden md:flex items-center gap-4">
                    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('login')) }}" wire:navigate class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring h-10 px-4 py-2 hover:bg-accent hover:text-accent-foreground">
                        {{ __('landing.nav.signIn') }}
                    </a>
                    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}" wire:navigate class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring h-10 px-4 py-2 bg-primary text-primary-foreground shadow-glow hover:shadow-[0_0_80px_-10px_hsl(var(--primary)/0.5)] hover:scale-105">
                        {{ __('landing.nav.getStarted') }}
                    </a>
                </div>

                <!-- Mobile Toggle -->
                <button class="md:hidden text-foreground" @click="mobileMenuOpen = !mobileMenuOpen">
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
                    <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="md:hidden mt-4 pb-4 border-t border-border pt-4" x-cloak>
                <div class="flex flex-col gap-4">
                    <a href="#about" @click="mobileMenuOpen = false" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.about') }}</a>
                    <a href="#features" @click="mobileMenuOpen = false" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.features') }}</a>
                    <a href="#how-it-works" @click="mobileMenuOpen = false" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.howItWorks') }}</a>
                    <a href="#stats" @click="mobileMenuOpen = false" class="text-muted-foreground hover:text-foreground transition-colors">{{ __('landing.nav.stats') }}</a>
                    <div class="flex flex-col gap-2 pt-4 border-t border-border">
                        <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('login')) }}" wire:navigate class="inline-flex items-center justify-start gap-2 h-10 px-4 text-muted-foreground hover:text-foreground">{{ __('landing.nav.signIn') }}</a>
                        <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}" wire:navigate class="inline-flex items-center justify-center gap-2 h-12 px-4 bg-primary text-primary-foreground font-semibold rounded-md shadow-glow">{{ __('landing.nav.getStarted') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-hero pt-20">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-glow rounded-full blur-3xl animate-pulse-glow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-glow rounded-full blur-3xl animate-pulse-glow" style="animation-delay: 1.5s"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(hsl(var(--foreground)) 1px, transparent 1px), linear-gradient(90deg, hsl(var(--foreground)) 1px, transparent 1px); background-size: 60px 60px"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass mb-8 animate-slide-up">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-primary"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                    <span class="text-sm text-muted-foreground">{{ __('landing.hero.badge') }}</span>
                </div>
                <h1 class="font-heading text-5xl md:text-6xl font-bold leading-tight mb-6 animate-slide-up" style="animation-delay: 0.1s">
                    {{ __('landing.hero.title') }} <span class="text-gradient">{{ __('landing.hero.titleHighlight') }}</span> {{ __('landing.hero.titleEnd') }}
                </h1>
                <p class="text-xl md:text-2xl text-muted-foreground max-w-2xl mx-auto mb-10 animate-slide-up" style="animation-delay: 0.2s">
                    {{ __('landing.hero.subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-slide-up" style="animation-delay: 0.3s">
                    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('investor.index')) }}" wire:navigate class="inline-flex items-center justify-center gap-2 h-14 px-10 rounded-lg text-base bg-primary text-primary-foreground font-semibold shadow-glow hover:shadow-[0_0_80px_-10px_hsl(var(--primary)/0.5)] hover:scale-105 transition-all duration-300">
                        {{ __('landing.hero.cta') }}
                        @if(LaravelLocalization::getCurrentLocaleDirection() === 'rtl')
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ms-1"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ms-1"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        @endif
                    </a>
                    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('idea.index')) }}" wire:navigate class="inline-flex items-center justify-center gap-2 h-14 px-10 rounded-lg text-base border-2 border-primary/50 text-foreground hover:border-primary hover:bg-primary/10 transition-all duration-300">
                        {{ __('landing.hero.ctaSecondary') }}
                    </a>
                </div>

                <div class="mt-16 flex flex-wrap items-center justify-center gap-8 text-muted-foreground animate-slide-up" style="animation-delay: 0.4s">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                        <span class="text-sm">{{ __('landing.hero.noFees') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                        <span class="text-sm">{{ __('landing.hero.secure') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                        <span class="text-sm">{{ __('landing.hero.support') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-background to-transparent"></div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-secondary/30 relative">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ __('landing.about.title') }} <span class="text-gradient">{{ __('landing.brand') }}</span>
                </h2>
                <p class="text-muted-foreground text-lg leading-relaxed">{{ __('landing.about.description') }}</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center mb-20">
                <div>
                    <h3 class="font-heading text-2xl md:text-3xl font-bold mb-6">
                        {{ __('landing.about.story.title') }} <span class="text-gradient">{{ __('landing.about.story.titleHighlight') }}</span>
                    </h3>
                    <p class="text-muted-foreground leading-relaxed mb-4">{{ __('landing.about.story.p1') }}</p>
                    <p class="text-muted-foreground leading-relaxed mb-4">{{ __('landing.about.story.p2') }}</p>
                    <p class="text-muted-foreground leading-relaxed">{{ __('landing.about.story.p3') }}</p>
                </div>
                <div class="relative">
                    <div class="aspect-square rounded-3xl bg-gradient-to-br from-primary/10 to-primary/5 border border-border flex items-center justify-center shadow-elevated text-center p-8">
                        <div>
                            <div class="font-heading text-6xl md:text-7xl font-bold text-gradient mb-4">5+</div>
                            <div class="text-muted-foreground text-lg">{{ __('landing.about.yearsOfExcellence') }}</div>
                            <div class="mt-6 pt-6 border-t border-border">
                                <div class="font-heading text-3xl font-bold text-foreground mb-1">50+</div>
                                <div class="text-muted-foreground text-sm">{{ __('landing.about.countriesServed') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary/10 rounded-full blur-2xl"></div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 text-center">
                <!-- Mission -->
                <div class="p-8 rounded-2xl bg-background border border-border hover:border-primary/30 transition-all duration-500 hover:shadow-glow group">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold mb-3">{{ __('landing.about.mission.title') }}</h3>
                    <p class="text-muted-foreground leading-relaxed">{{ __('landing.about.mission.description') }}</p>
                </div>
                <!-- Vision -->
                <div class="p-8 rounded-2xl bg-background border border-border hover:border-primary/30 transition-all duration-500 hover:shadow-glow group">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold mb-3">{{ __('landing.about.vision.title') }}</h3>
                    <p class="text-muted-foreground leading-relaxed">{{ __('landing.about.vision.description') }}</p>
                </div>
                <!-- Values -->
                <div class="p-8 rounded-2xl bg-background border border-border hover:border-primary/30 transition-all duration-500 hover:shadow-glow group">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold mb-3">{{ __('landing.about.values.title') }}</h3>
                    <p class="text-muted-foreground leading-relaxed">{{ __('landing.about.values.description') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-background relative">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-2xl mx-auto mb-16">
                <h2 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ __('landing.features.title') }} <span class="text-gradient">{{ __('landing.features.titleHighlight') }}</span>
                </h2>
                <p class="text-muted-foreground text-lg">{{ __('landing.features.subtitle') }}</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(['shareIdeas', 'createOffers', 'connect', 'secure', 'track', 'fast'] as $feature)
                <div class="group p-8 rounded-2xl bg-gradient-card border border-border hover:border-primary/30 transition-all duration-500 hover:shadow-glow text-start">
                    <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary/20 transition-colors text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7"><circle cx="12" cy="12" r="10"></circle><line x1="12" x2="12" y1="8" y2="12"></line><line x1="12" x2="12.01" y1="16" y2="16"></line></svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold mb-3">{{ __('landing.features.'.$feature.'.title') }}</h3>
                    <p class="text-muted-foreground leading-relaxed">{{ __('landing.features.'.$feature.'.description') }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-24 bg-gradient-hero relative overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-glow rounded-full blur-3xl opacity-50"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="max-w-2xl mx-auto mb-16">
                <h2 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ __('landing.howItWorks.title') }} <span class="text-gradient">{{ __('landing.howItWorks.titleHighlight') }}</span>
                </h2>
                <p class="text-muted-foreground text-lg">{{ __('landing.howItWorks.subtitle') }}</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach(['1', '2', '3', '4'] as $step)
                <div class="relative">
                    @if(!$loop->last)
                    <div class="hidden lg:block absolute top-12 w-full h-[2px]
                        {{ LaravelLocalization::getCurrentLocaleDirection() === 'rtl' ? 'right-[60%] bg-gradient-to-l' : 'left-[60%] bg-gradient-to-r' }} from-primary/50 to-transparent"></div>
                    @endif
                    <div class="relative p-6 rounded-2xl glass text-center group hover:shadow-glow transition-all duration-500">
                        <span class="absolute -top-3 w-8 h-8 rounded-full bg-primary text-primary-foreground text-sm font-bold flex items-center justify-center {{ LaravelLocalization::getCurrentLocaleDirection() === 'rtl' ? '-left-3' : '-right-3' }}">
                            0{{ $step }}
                        </span>
                        <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <h3 class="font-heading text-xl font-semibold mb-3">{{ __('landing.howItWorks.step'.$step.'.title') }}</h3>
                        <p class="text-muted-foreground text-sm leading-relaxed">{{ __('landing.howItWorks.step'.$step.'.description') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="py-24 bg-background relative">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-2xl mx-auto mb-16">
                <h2 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ __('landing.stats.title') }} <span class="text-gradient">{{ __('landing.stats.titleHighlight') }}</span>
                </h2>
                <p class="text-muted-foreground text-lg">{{ __('landing.stats.subtitle') }}</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(['totalInvestments', 'activeInvestors', 'fundedProjects', 'satisfaction'] as $stat)
                <div class="p-8 rounded-2xl bg-gradient-card border border-border text-center hover:border-primary/30 transition-all duration-500 hover:shadow-glow group">
                    <div class="font-heading text-4xl md:text-5xl font-bold text-gradient mb-2">{{ __('landing.stats.'.$stat.'.value') }}</div>
                    <div class="font-semibold text-foreground mb-1">{{ __('landing.stats.'.$stat.'.label') }}</div>
                    <div class="text-sm text-muted-foreground">{{ __('landing.stats.'.$stat.'.description') }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gradient-hero relative overflow-hidden">
        <div class="absolute inset-0 bg-glow opacity-30"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/50 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/50 to-transparent"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="font-heading text-4xl md:text-6xl font-bold mb-6">
                    {{ __('landing.cta.title') }} <span class="text-gradient">{{ __('landing.cta.titleHighlight') }}</span>
                </h2>
                <p class="text-xl text-muted-foreground mb-10 max-w-xl mx-auto">{{ __('landing.cta.subtitle') }}</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('register')) }}" wire:navigate class="inline-flex items-center justify-center gap-2 h-14 px-10 rounded-lg text-base bg-primary text-primary-foreground font-semibold shadow-glow hover:shadow-[0_0_80px_-10px_hsl(var(--primary)/0.5)] hover:scale-105 transition-all duration-300">
                        {{ __('landing.cta.button') }}
                        @if(LaravelLocalization::getCurrentLocaleDirection() === 'rtl')
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ms-1"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ms-1"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        @endif
                    </a>
                    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.contact')) }}" wire:navigate class="inline-flex items-center justify-center gap-2 h-14 px-10 rounded-lg text-base border-2 border-primary/50 text-foreground hover:border-primary hover:bg-primary/10 transition-all duration-300">
                        {{ __('landing.cta.buttonSecondary') }}
                    </a>
                </div>
                <p class="mt-8 text-sm text-muted-foreground">{{ __('landing.cta.trust') }}</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-card border-t border-border py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-5 gap-12 mb-12">
                <div class="md:col-span-1">
                    <a href="/" class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><line x1="12" x2="12" y1="20" y2="10"></line><line x1="18" x2="18" y1="20" y2="4"></line><line x1="6" x2="6" y1="20" y2="16"></line></svg>
                        </div>
                        <span class="font-heading font-bold text-xl">{{ __('landing.brand') }}</span>
                    </a>
                    <p class="text-muted-foreground text-sm leading-relaxed">{{ __('landing.footer.description') }}</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-foreground">{{ __('landing.footer.product') }}</h4>
                    <ul class="space-y-3 text-sm text-muted-foreground">
                        <li><a href="#features" class="hover:text-foreground transition-colors">{{ __('landing.footer.features') }}</a></li>
                        <li><a href="#how-it-works" class="hover:text-foreground transition-colors">{{ __('landing.footer.howItWorks') }}</a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.pricing')) }}" wire:navigate class="hover:text-foreground transition-colors">{{ __('landing.footer.pricing') }}</a></li>
                        <li><a href="#" class="hover:text-foreground transition-colors">{{ __('landing.footer.api') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-foreground">{{ __('landing.footer.company') }}</h4>
                    <ul class="space-y-3 text-sm text-muted-foreground">
                        <li><a href="#about" class="hover:text-foreground transition-colors">{{ __('landing.footer.aboutLink') }}</a></li>
                        <li><a href="#" class="hover:text-foreground transition-colors">{{ __('landing.footer.blog') }}</a></li>
                        <li><a href="#" class="hover:text-foreground transition-colors">{{ __('landing.footer.careers') }}</a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.contact')) }}" wire:navigate class="hover:text-foreground transition-colors">{{ __('landing.footer.contact') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-foreground">{{ __('landing.footer.legal') }}</h4>
                    <ul class="space-y-3 text-sm text-muted-foreground">
                        <li><a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.privacypolicy')) }}" wire:navigate class="hover:text-foreground transition-colors">{{ __('landing.footer.privacy') }}</a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('main.terms')) }}" wire:navigate class="hover:text-foreground transition-colors">{{ __('landing.footer.terms') }}</a></li>
                        <li><a href="#" class="hover:text-foreground transition-colors">{{ __('landing.footer.cookies') }}</a></li>
                        <li><a href="#" class="hover:text-foreground transition-colors">{{ __('landing.footer.security') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 flex items-center gap-2 text-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
                        {{ __('landing.footer.language') }}
                    </h4>
                    <div class="flex flex-col gap-2">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           class="inline-flex items-center justify-start gap-2 h-9 px-3 rounded-md text-sm font-medium transition-colors {{ app()->getLocale() === $localeCode ? 'bg-primary text-primary-foreground' : 'border border-input bg-background hover:bg-accent hover:text-accent-foreground' }}">
                            {{ $properties['native'] }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="pt-8 border-t border-border flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-muted-foreground">{{ __('landing.footer.copyright') }}</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="w-10 h-10 rounded-lg bg-secondary flex items-center justify-center text-muted-foreground hover:text-foreground hover:bg-primary/20 transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg></a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-secondary flex items-center justify-center text-muted-foreground hover:text-foreground hover:bg-primary/20 transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button x-show="showScrollTop" @click="scrollToTop()"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            class="fixed bottom-6 right-6 z-50 group cursor-pointer" aria-label="Scroll to top" x-cloak>
        <div class="relative w-12 h-12">
            <svg class="w-12 h-12 -rotate-90 absolute inset-0">
                <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="2" fill="none" class="text-muted"></circle>
                <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                        class="text-primary transition-all duration-100"
                        :style="`stroke-dasharray: 125.66; stroke-dashoffset: ${125.66 - (scrollPercent / 100 * 125.66)}`"></circle>
            </svg>
            <div class="absolute inset-1 rounded-full bg-background/80 backdrop-blur-sm border border-border shadow-lg flex items-center justify-center transition-all duration-300 group-hover:bg-primary group-hover:border-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-foreground transition-all duration-300 group-hover:text-primary-foreground group-hover:-translate-y-0.5"><path d="m18 15-6-6-6 6"></path></svg>
            </div>
        </div>
    </button>
</div>
