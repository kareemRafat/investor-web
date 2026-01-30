<footer class="bg-white rounded-4 shadow-sm mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="container">
        <div class="row py-5 g-4">
            <!-- Brand & About -->
            <div class="col-lg-4 col-md-12">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('images/logo.svg') }}" alt="logo" width="40" height="40" />
                    <h4 class="fw-bold mb-0 text-primary">Investor</h4>
                </div>
                <p class="text-muted mb-4 pe-lg-4">
                    {{ __('header.footer.about_text') }}
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-muted fs-4 hover-primary" aria-label="Facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a href="#" class="text-muted fs-4 hover-primary" aria-label="Instagram"><i
                            class="bi bi-instagram"></i></a>
                    <a href="#" class="text-muted fs-4 hover-primary" aria-label="Twitter"><i
                            class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-muted fs-4 hover-primary" aria-label="YouTube"><i
                            class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="fw-bold text-dark mb-4">{{ __('header.footer.useful_links') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-3 small">
                    <li><a href="{{ route('main.home') }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('header.home') }}</a></li>
                    <li><a href="{{ route('main.about') }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('header.about') }}</a></li>
                    <li><a href="{{ route('idea.index') }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('header.investment') }}</a></li>
                    <li><a href="{{ route('main.pricing') }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('header.plans') }}</a></li>
                    <li><a href="{{ route('main.faq') }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('header.faq') }}</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="fw-bold text-dark mb-4">{{ __('header.footer.categories') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-3 small">
                    <li><a href="{{ route('idea.index', ['field' => 'technology']) }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('idea.steps.step1.options.technology') }}</a>
                    </li>
                    <li><a href="{{ route('idea.index', ['field' => 'health']) }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('idea.steps.step1.options.health') }}</a>
                    </li>
                    <li><a href="{{ route('idea.index', ['field' => 'realestate']) }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('idea.steps.step1.options.realestate') }}</a>
                    </li>
                    <li><a href="{{ route('idea.index', ['field' => 'food']) }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('idea.steps.step1.options.food') }}</a>
                    </li>
                    <li><a href="{{ route('main.contact') }}"
                            class="text-muted text-decoration-none hover-primary">{{ __('header.footer.support') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-4 col-md-4 col-12">
                <h6 class="fw-bold text-dark mb-4">{{ __('header.footer.newsletter_title') }}</h6>
                <p class="text-muted small mb-3">{{ __('header.footer.newsletter_text') }}</p>
                <div class="input-group mb-3">
                    <input type="email"
                        class="form-control form-control-sm border-end-0 rounded-pill rounded-end-0 ps-3"
                        placeholder="email@example.com">
                    <button class="btn btn-primary btn-sm rounded-pill px-3 fw-bold {{ app()->getLocale() == 'ar' ? 'rounded-end-0' : 'rounded-start-0' }}"
                    type="button">
                    {{ __('header.footer.subscribe') }}
                    </button>
                </div>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle px-3"
                            type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-translate me-1"></i>
                            {{ LaravelLocalization::getCurrentLocaleNative() }}
                        </button>
                        <ul class="dropdown-menu shadow border-0">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item small" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr class="text-muted opacity-10">

        <!-- Copyright -->
        <div class="row pt-3">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="small text-muted">
                    {{ __('header.footer.copyright', ['year' => date('Y')]) }}
                </span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0 small">
                    <li class="list-inline-item mx-2"><a href="{{ route('main.terms') }}"
                            class="text-muted text-decoration-none">{{ __('header.terms') }}</a></li>
                    <li class="list-inline-item mx-2"><a href="{{ route('main.privacypolicy') }}"
                            class="text-muted text-decoration-none">{{ __('header.privacy') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
