<footer class="app-footer mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="app-footer__top-line"></div>

    <div class="container position-relative">
        <div class="row g-4 py-5">
            <!-- Brand & About -->
            <div class="col-lg-5 col-md-12">
                <a href="{{ route('main.home') }}" class="app-footer__brand d-inline-flex align-items-center gap-2 mb-3"
                    aria-label="Investment">
                    <span class="app-footer__logo">
                        <img src="{{ asset('images/logo.webp') }}" alt="logo" height="36" />
                    </span>
                </a>
                <p class="app-footer__about mb-4">
                    {{ __('header.footer.about_text') }}
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="app-footer__social" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="app-footer__social" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="app-footer__social" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="app-footer__social" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="col-lg-3 col-md-5 col-6">
                <h6 class="app-footer__title">{{ __('header.footer.useful_links') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ route('main.home') }}"
                            class="app-footer__link">{{ __('header.home') }}</a></li>
                    <li><a href="{{ route('main.about') }}"
                            class="app-footer__link">{{ __('header.about') }}</a></li>
                    <li><a href="{{ route('idea.index') }}"
                            class="app-footer__link">{{ __('header.investment') }}</a></li>
                    <li><a href="{{ route('main.pricing') }}"
                            class="app-footer__link">{{ __('header.plans') }}</a></li>
                    <li><a href="{{ route('main.faq') }}"
                            class="app-footer__link">{{ __('header.faq') }}</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-lg-4 col-md-7 col-6">
                <h6 class="app-footer__title">{{ __('header.footer.categories') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ route('idea.index', ['field' => 'technology']) }}"
                            class="app-footer__link">{{ __('idea.steps.step1.options.technology') }}</a>
                    </li>
                    <li><a href="{{ route('idea.index', ['field' => 'health']) }}"
                            class="app-footer__link">{{ __('idea.steps.step1.options.health') }}</a>
                    </li>
                    <li><a href="{{ route('idea.index', ['field' => 'realestate']) }}"
                            class="app-footer__link">{{ __('idea.steps.step1.options.realestate') }}</a>
                    </li>
                    <li><a href="{{ route('idea.index', ['field' => 'food']) }}"
                            class="app-footer__link">{{ __('idea.steps.step1.options.food') }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="app-footer__bottom">
            <span class="app-footer__copy">
                {{ __('header.footer.copyright', ['year' => date('Y')]) }}
            </span>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('main.terms') }}" class="app-footer__legal">{{ __('header.terms') }}</a>
                <span class="app-footer__dot"></span>
                <a href="{{ route('main.privacypolicy') }}" class="app-footer__legal">{{ __('header.privacy') }}</a>
                <button type="button" class="app-footer__top" onclick="window.scrollTo({top:0,behavior:'smooth'})"
                    aria-label="Back to top" title="Back to top">
                    <i class="bi bi-arrow-up"></i>
                </button>
            </div>
        </div>
    </div>
</footer>
