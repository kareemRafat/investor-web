<div>
    <x-landing.navbar />
    <div class="pt-16 md:pt-20"></div>

    <!-- Ambient Glow Layers -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 hero-pattern opacity-40"></div>
        <div class="absolute -top-40 left-1/4 w-[600px] h-[600px] glow-blob-blue rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-40 w-[500px] h-[500px] glow-blob-gold rounded-full blur-3xl"></div>
    </div>

    <main class="relative z-10 pt-10 md:pt-14 pb-space-2xl max-w-[1280px] mx-auto px-space-md md:px-margin w-full">
        <!-- 1. Hero Section -->
        <section class="text-center max-w-3xl mx-auto mb-12 md:mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-low border border-outline-variant/50 mb-4 shadow-xs">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary-container opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary-fixed-dim"></span>
                </span>
                <span class="material-symbols-outlined text-primary text-[18px]">support_agent</span>
                <span class="text-primary font-semibold text-label-md font-label-md tracking-wide">{{ __('landing.footer.contact') }}</span>
            </div>
            <h1 class="font-headline-xl text-headline-xl-mobile md:text-display text-primary tracking-tight mb-4">
                {{ __('landing.footer.contact') }}
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                {{ __('landing.contactPage.heroSub') }}
            </p>
        </section>

        <!-- 2. Contact Form Grid -->
        <section class="max-w-5xl mx-auto mb-16 scroll-mt-24" id="contact-section">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left: Support Image Card -->
                <div class="lg:col-span-5 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 card-shadow overflow-hidden flex flex-col">
                    <div class="relative h-64 sm:h-72 w-full overflow-hidden shrink-0">
                        <img alt="{{ __('landing.contactPage.cardTitle') }}"
                            class="w-full h-full object-cover object-top transition-transform duration-700 hover:scale-105"
                            src="https://lh3.googleusercontent.com/aida/AEtjO1VY8KUu7kVpinfpIUxqSpezy5rVAY-0jH5KBJnIjxZbTyQ7-R-xfwsWtiWdrI_PLmYCzXRiGcRjfZy9EFD6xMNpAOpMb0fHZxZYT6UU2C0oHHQC87_xVZQDAvS2VnG5q85bnu4wvlddNCrvedh0zOtuiqaxVTMF4y1fT6FkoRVNAs7iQMLsQQpoQe43Culjkzt4kSpAZx9enznGdqwnczccymDBUju30E6Uhhy9FSp9l1KqyhSNDXYJXQ">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/30 to-transparent flex flex-col justify-end p-5 text-white">
                            <h3 class="font-title-md text-title-md font-bold text-white">{{ __('landing.contactPage.cardTitle') }}</h3>
                            <p class="font-body-sm text-body-sm text-white/85 leading-relaxed">{{ __('landing.contactPage.cardText') }}</p>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col gap-3 grow">
                        <a href="mailto:{{ __('pages.terms.contact.email') }}"
                            class="flex items-center gap-3 p-3 rounded-xl bg-surface-container-low border border-outline-variant/30 hover:border-primary/40 transition-colors">
                            <span class="w-10 h-10 rounded-lg custom-gradient-btn text-on-primary flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[20px]">mail</span>
                            </span>
                            <span class="min-w-0">
                                <span class="block font-label-md text-label-md font-bold text-on-surface">{{ __('landing.contactPage.info1title') }}</span>
                                <span class="block font-body-sm text-body-sm text-primary font-semibold truncate">{{ __('pages.terms.contact.email') }}</span>
                            </span>
                        </a>
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-surface-container-low border border-outline-variant/30">
                            <span class="w-10 h-10 rounded-lg bg-secondary-container text-on-secondary-fixed flex items-center justify-center shrink-0 golden-glow-sm">
                                <span class="material-symbols-outlined text-[20px]">schedule</span>
                            </span>
                            <span class="min-w-0">
                                <span class="block font-label-md text-label-md font-bold text-on-surface">{{ __('landing.contactPage.info2title') }}</span>
                                <span class="block font-body-sm text-body-sm text-on-surface-variant">{{ __('landing.contactPage.info2value') }}</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right: Form Card -->
                <div class="lg:col-span-7 bg-surface-container-lowest rounded-2xl border border-outline-variant/40 card-shadow p-6 md:p-8">
                    @if ($successMessage)
                        <div class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-surface-container-low border border-primary/30">
                            <span class="material-symbols-outlined text-[20px] text-primary shrink-0 mt-0.5">check_circle</span>
                            <p class="font-body-md text-body-md text-primary">{{ $successMessage }}</p>
                        </div>
                    @endif

                    <form wire:submit="submit" class="flex flex-col gap-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="min-w-0">
                                <label for="lc-name" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.name') }}</label>
                                <input id="lc-name" type="text" wire:model="name" placeholder="{{ __('pages.contact.name') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition @error('name') border-error ring-2 ring-error/20 @else border-outline-variant/60 @enderror" />
                                @error('name') <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p> @enderror
                            </div>
                            <div class="min-w-0">
                                <label for="lc-email" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.email') }}</label>
                                <input id="lc-email" type="email" wire:model="email" placeholder="{{ __('pages.contact.email') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition @error('email') border-error ring-2 ring-error/20 @else border-outline-variant/60 @enderror" />
                                @error('email') <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="min-w-0">
                                <label for="lc-phone" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.phone') }}</label>
                                <input id="lc-phone" type="tel" wire:model="phone" placeholder="{{ __('pages.contact.phone') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition @error('phone') border-error ring-2 ring-error/20 @else border-outline-variant/60 @enderror" />
                                @error('phone') <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p> @enderror
                            </div>
                            <div class="min-w-0">
                                <label for="lc-subject" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.subject') }}</label>
                                <input id="lc-subject" type="text" wire:model="subject" placeholder="{{ __('pages.contact.subject') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition @error('subject') border-error ring-2 ring-error/20 @else border-outline-variant/60 @enderror" />
                                @error('subject') <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="min-w-0">
                            <label for="lc-message" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.message') }}</label>
                            <textarea id="lc-message" wire:model="message" rows="5" placeholder="{{ __('pages.contact.message') }}"
                                class="w-full px-4 py-3 rounded-xl bg-surface-container-low border text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition resize-y @error('message') border-error ring-2 ring-error/20 @else border-outline-variant/60 @enderror"></textarea>
                            @error('message') <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" wire:loading.attr="disabled"
                            class="inline-flex items-center justify-center gap-2 custom-gradient-btn text-on-primary px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-semibold shadow-lg shadow-primary-container/25 hover:brightness-105 active:scale-[0.98] transition-all duration-150 disabled:opacity-60">
                            <span wire:loading.remove class="inline-flex items-center gap-2">
                                <span>{{ __('pages.contact.send') }}</span>
                                <span class="material-symbols-outlined text-[20px] rtl-flip">send</span>
                            </span>
                            <span wire:loading class="inline-flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                <span>{{ __('pages.contact.sending') }}...</span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- 3. Info Strip -->
        <section class="max-w-5xl mx-auto mb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-6 card-shadow card-shadow-hover transition-all duration-200 flex flex-col items-start">
                    <div class="w-12 h-12 rounded-xl custom-gradient-btn text-on-primary flex items-center justify-center mb-4 shadow-sm">
                        <span class="material-symbols-outlined text-[24px]">mail</span>
                    </div>
                    <span class="font-caption text-caption uppercase tracking-wider text-outline mb-1 font-semibold">{{ __('landing.contactPage.info1eyebrow') }}</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-1">{{ __('landing.contactPage.info1title') }}</h3>
                    <a class="font-body-md text-body-md text-primary font-semibold hover:underline mb-2 break-all" href="mailto:{{ __('pages.terms.contact.email') }}">
                        {{ __('pages.terms.contact.email') }}
                    </a>
                    <div class="mt-auto pt-3 border-t border-outline-variant/30 w-full flex items-center gap-1.5 font-caption text-caption text-on-surface-variant">
                        <span class="material-symbols-outlined text-[16px] text-primary">lock</span>
                        <span>{{ __('landing.contactPage.info1foot') }}</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-6 card-shadow card-shadow-hover transition-all duration-200 flex flex-col items-start relative">
                    <div class="w-12 h-12 rounded-xl bg-secondary-container text-on-surface flex items-center justify-center mb-4 shadow-sm golden-glow-sm">
                        <span class="material-symbols-outlined text-[24px]">schedule</span>
                    </div>
                    <span class="font-caption text-caption uppercase tracking-wider text-outline mb-1 font-semibold">{{ __('landing.contactPage.info2eyebrow') }}</span>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">{{ __('landing.contactPage.info2title') }}</h3>
                    <p class="font-headline-sm text-headline-sm text-primary mb-2">
                        {{ __('landing.contactPage.info2value') }}
                    </p>
                    <div class="mt-auto pt-3 border-t border-outline-variant/30 w-full flex items-center gap-1.5 font-caption text-caption text-on-surface-variant">
                        <span class="material-symbols-outlined text-[16px] text-secondary">bolt</span>
                        <span>{{ __('landing.contactPage.info2foot') }}</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-6 card-shadow card-shadow-hover transition-all duration-200 flex flex-col items-start">
                    <div class="w-12 h-12 rounded-xl bg-surface-container-high text-primary flex items-center justify-center mb-4 border border-outline-variant/40">
                        <span class="material-symbols-outlined text-[24px]">headset_mic</span>
                    </div>
                    <span class="font-caption text-caption uppercase tracking-wider text-outline mb-1 font-semibold">{{ __('landing.contactPage.info3eyebrow') }}</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-1">{{ __('landing.contactPage.info3title') }}</h3>
                    <p class="font-headline-sm text-headline-sm text-primary mb-2">
                        {{ __('landing.contactPage.info3value') }}
                    </p>
                    <div class="mt-auto pt-3 border-t border-outline-variant/30 w-full flex items-center gap-1.5 font-caption text-caption text-on-surface-variant">
                        <span class="material-symbols-outlined text-[16px] text-primary">public</span>
                        <span>{{ __('landing.contactPage.info3foot') }}</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-landing.footer />
</div>
