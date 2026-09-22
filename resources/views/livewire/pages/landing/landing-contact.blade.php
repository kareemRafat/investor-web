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
                <x-heroicon-o-lifebuoy class="w-[18px] h-[18px] text-primary" />
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
                                <x-heroicon-o-envelope class="w-5 h-5" />
                            </span>
                            <span class="min-w-0">
                                <span class="block font-label-md text-label-md font-bold text-on-surface">{{ __('landing.contactPage.info1title') }}</span>
                                <span class="block font-body-sm text-body-sm text-primary font-semibold truncate">{{ __('pages.terms.contact.email') }}</span>
                            </span>
                        </a>
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-surface-container-low border border-outline-variant/30">
                            <span class="w-10 h-10 rounded-lg bg-secondary-container text-on-secondary-fixed flex items-center justify-center shrink-0 golden-glow-sm">
                                <x-heroicon-o-clock class="w-5 h-5" />
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
                    <div id="lc-success" hidden class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-green-50 border border-green-500/40">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-600 shrink-0 mt-0.5" />
                        <p id="lc-success-text" class="font-body-md text-body-md text-green-700"></p>
                    </div>

                    <div id="lc-form-error" hidden class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-surface-container-low border border-error/40">
                        <x-heroicon-o-exclamation-circle class="w-5 h-5 text-error shrink-0 mt-0.5" />
                        <p id="lc-form-error-text" class="font-body-md text-body-md text-error"></p>
                    </div>

                    @php($rtl = app()->getLocale() === 'ar')
                    <form id="lc-contact-form" action="{{ route('main.contact.landing.store') }}" method="POST" novalidate class="flex flex-col gap-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="min-w-0">
                                <label for="lc-name" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.name') }}</label>
                                <input id="lc-name" name="name" type="text" dir="{{ $rtl ? 'rtl' : 'ltr' }}" value="{{ old('name', $name ?? '') }}" placeholder="{{ __('pages.contact.name') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border border-outline-variant/60 text-on-surface font-body-md text-body-md {{ $rtl ? 'text-right' : 'text-left' }} placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition" />
                                <p data-error="name" hidden class="mt-1 font-body-sm text-body-sm font-bold text-error"></p>
                            </div>
                            <div class="min-w-0">
                                <label for="lc-email" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.email') }}</label>
                                <input id="lc-email" name="email" type="email" dir="{{ $rtl ? 'rtl' : 'ltr' }}" value="{{ old('email', $email ?? '') }}" placeholder="{{ __('pages.contact.email') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border border-outline-variant/60 text-on-surface font-body-md text-body-md {{ $rtl ? 'text-right' : 'text-left' }} placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition" />
                                <p data-error="email" hidden class="mt-1 font-body-sm text-body-sm font-bold text-error"></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="min-w-0">
                                <label for="lc-phone" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.phone') }}</label>
                                <input id="lc-phone" name="phone" type="tel" dir="{{ $rtl ? 'rtl' : 'ltr' }}" value="{{ old('phone', $phone ?? '') }}" placeholder="{{ __('pages.contact.phone') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border border-outline-variant/60 text-on-surface font-body-md text-body-md {{ $rtl ? 'text-right' : 'text-left' }} placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition" />
                                <p data-error="phone" hidden class="mt-1 font-body-sm text-body-sm font-bold text-error"></p>
                            </div>
                            <div class="min-w-0">
                                <label for="lc-subject" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.subject') }}</label>
                                <input id="lc-subject" name="subject" type="text" dir="{{ $rtl ? 'rtl' : 'ltr' }}" value="{{ old('subject', $subject ?? '') }}" placeholder="{{ __('pages.contact.subject') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-surface-container-low border border-outline-variant/60 text-on-surface font-body-md text-body-md {{ $rtl ? 'text-right' : 'text-left' }} placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition" />
                                <p data-error="subject" hidden class="mt-1 font-body-sm text-body-sm font-bold text-error"></p>
                            </div>
                        </div>

                        <div class="min-w-0">
                            <label for="lc-message" class="block font-label-lg text-label-lg font-semibold text-on-surface mb-1.5">{{ __('pages.contact.message') }}</label>
                            <textarea id="lc-message" name="message" rows="5" dir="{{ $rtl ? 'rtl' : 'ltr' }}" placeholder="{{ __('pages.contact.message') }}"
                                class="w-full px-4 py-3 rounded-xl bg-surface-container-low border border-outline-variant/60 text-on-surface font-body-md text-body-md {{ $rtl ? 'text-right' : 'text-left' }} placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition resize-y">{{ old('message', $message ?? '') }}</textarea>
                            <p data-error="message" hidden class="mt-1 font-body-sm text-body-sm font-bold text-error"></p>
                        </div>

                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website" value="" tabindex="-1" autocomplete="off" />
                        </div>

                        <button id="lc-submit-btn" type="submit"
                            class="inline-flex items-center justify-center gap-2 custom-gradient-btn text-on-primary px-8 py-4 rounded-lg font-headline-sm text-headline-sm font-semibold shadow-lg shadow-primary-container/25 hover:brightness-105 active:scale-[0.98] transition-all duration-150 disabled:opacity-60">
                            <span data-role="label-default" class="inline-flex items-center gap-2">
                                <span>{{ __('pages.contact.send') }}</span>
                                <x-heroicon-o-paper-airplane class="w-5 h-5 rtl-flip" />
                            </span>
                            <span data-role="label-sending" hidden class="inline-flex items-center gap-2">
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
                        <x-heroicon-o-envelope class="w-6 h-6" />
                    </div>
                    <span class="font-caption text-caption uppercase tracking-wider text-outline mb-1 font-semibold">{{ __('landing.contactPage.info1eyebrow') }}</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-1">{{ __('landing.contactPage.info1title') }}</h3>
                    <a class="font-body-md text-body-md text-primary font-semibold hover:underline mb-2 break-all" href="mailto:{{ __('pages.terms.contact.email') }}">
                        {{ __('pages.terms.contact.email') }}
                    </a>
                    <div class="mt-auto pt-3 border-t border-outline-variant/30 w-full flex items-center gap-1.5 font-caption text-caption text-on-surface-variant">
                        <x-heroicon-o-lock-closed class="w-4 h-4 text-primary" />
                        <span>{{ __('landing.contactPage.info1foot') }}</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-6 card-shadow card-shadow-hover transition-all duration-200 flex flex-col items-start relative">
                    <div class="w-12 h-12 rounded-xl bg-secondary-container text-on-surface flex items-center justify-center mb-4 shadow-sm golden-glow-sm">
                        <x-heroicon-o-clock class="w-6 h-6" />
                    </div>
                    <span class="font-caption text-caption uppercase tracking-wider text-outline mb-1 font-semibold">{{ __('landing.contactPage.info2eyebrow') }}</span>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-1">{{ __('landing.contactPage.info2title') }}</h3>
                    <p class="font-headline-sm text-headline-sm text-primary mb-2">
                        {{ __('landing.contactPage.info2value') }}
                    </p>
                    <div class="mt-auto pt-3 border-t border-outline-variant/30 w-full flex items-center gap-1.5 font-caption text-caption text-on-surface-variant">
                        <x-heroicon-s-bolt class="w-4 h-4 text-secondary" />
                        <span>{{ __('landing.contactPage.info2foot') }}</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-6 card-shadow card-shadow-hover transition-all duration-200 flex flex-col items-start">
                    <div class="w-12 h-12 rounded-xl bg-surface-container-high text-primary flex items-center justify-center mb-4 border border-outline-variant/40">
                        <x-heroicon-o-phone class="w-6 h-6" />
                    </div>
                    <span class="font-caption text-caption uppercase tracking-wider text-outline mb-1 font-semibold">{{ __('landing.contactPage.info3eyebrow') }}</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-1">{{ __('landing.contactPage.info3title') }}</h3>
                    <p class="font-headline-sm text-headline-sm text-primary mb-2">
                        {{ __('landing.contactPage.info3value') }}
                    </p>
                    <div class="mt-auto pt-3 border-t border-outline-variant/30 w-full flex items-center gap-1.5 font-caption text-caption text-on-surface-variant">
                        <x-heroicon-o-globe-alt class="w-4 h-4 text-primary" />
                        <span>{{ __('landing.contactPage.info3foot') }}</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-landing.footer />
</div>

@push('scripts')
<script>
(function () {
    function initLandingContactForm() {
        var form = document.getElementById('lc-contact-form');
        if (!form || form.dataset.bound === '1') return;
        form.dataset.bound = '1';

        var btn = document.getElementById('lc-submit-btn');
        var successBox = document.getElementById('lc-success');
        var successText = document.getElementById('lc-success-text');
        var formErrorBox = document.getElementById('lc-form-error');
        var formErrorText = document.getElementById('lc-form-error-text');

        function setLoading(loading) {
            if (!btn) return;
            btn.disabled = loading;
            var def = btn.querySelector('[data-role="label-default"]');
            var sending = btn.querySelector('[data-role="label-sending"]');
            if (def) def.hidden = loading;
            if (sending) sending.hidden = !loading;
        }

        function clearErrors() {
            form.querySelectorAll('[data-error]').forEach(function (el) {
                el.hidden = true;
                el.textContent = '';
            });
            ['lc-name', 'lc-email', 'lc-phone', 'lc-subject', 'lc-message'].forEach(function (id) {
                var input = document.getElementById(id);
                if (input) input.classList.remove('border-error', 'ring-2', 'ring-error/20');
            });
            if (formErrorBox) formErrorBox.hidden = true;
        }

        function showErrors(errors) {
            Object.keys(errors).forEach(function (field) {
                var messages = errors[field];
                var text = Array.isArray(messages) ? messages[0] : messages;
                var errEl = form.querySelector('[data-error="' + field + '"]');
                if (errEl) {
                    errEl.textContent = text;
                    errEl.hidden = false;
                }
                var map = { name: 'lc-name', email: 'lc-email', phone: 'lc-phone', subject: 'lc-subject', message: 'lc-message' };
                var input = document.getElementById(map[field]);
                if (input) input.classList.add('border-error', 'ring-2', 'ring-error/20');
            });
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            clearErrors();
            if (successBox) successBox.hidden = true;
            setLoading(true);

            var token = document.querySelector('meta[name="csrf-token"]');
            var data = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': token ? token.getAttribute('content') : ''
                },
                body: data
            }).then(function (response) {
                return response.json().then(function (json) {
                    return { status: response.status, ok: response.ok, json: json };
                }).catch(function () {
                    return { status: response.status, ok: response.ok, json: {} };
                });
            }).then(function (result) {
                if (result.ok) {
                    if (successText) successText.textContent = result.json.message || '';
                    if (successBox) successBox.hidden = false;
                    form.reset();
                    if (successBox && successBox.scrollIntoView) {
                        successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } else if (result.status === 422 && result.json.errors) {
                    showErrors(result.json.errors);
                } else if (result.status === 429) {
                    if (formErrorText) formErrorText.textContent = 'Too many attempts. Please try again in a minute.';
                    if (formErrorBox) formErrorBox.hidden = false;
                } else {
                    if (formErrorText) formErrorText.textContent = (result.json && result.json.message) ? result.json.message : 'Something went wrong. Please try again.';
                    if (formErrorBox) formErrorBox.hidden = false;
                }
            }).catch(function () {
                if (formErrorText) formErrorText.textContent = 'Network error. Please check your connection and try again.';
                if (formErrorBox) formErrorBox.hidden = false;
            }).finally(function () {
                setLoading(false);
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLandingContactForm);
    } else {
        initLandingContactForm();
    }
})();
</script>
@endpush
