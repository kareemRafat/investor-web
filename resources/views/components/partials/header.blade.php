<!-- Header -->
<header class="container my-3">
    <div class="@if (!request()->is('*/profile/*')) row px-2 px-xl-0 @endif ">
        <div class="d-flex align-items-center justify-content-between bg-white py-3 px-4 shadow-sm rounded-8">
            <!-- logo -->
            <a href="{{ route('main.landing') }}" class="logo" title="Investment" aria-label="Investment">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid" width="120" height="120" />
            </a>
            <!-- menu items -->
            <nav class="d-none d-xl-flex">
                <ul class="list-unstyled d-flex gap-xl-3 gap-xl-4 mb-0">
                    <li>
                        <x-nav-link route="main.home" label="{{ __('header.home') }}" />
                    </li>
                    <li>
                        <x-nav-link route="main.about" label="{{ __('header.about') }}" />
                    </li>
                    <!-- Investment Fund -->
                    <li>
                        <x-nav-link route="main.pricing" label="{{ __('header.plans') }}" />
                    </li>
                    <!-- Terms of Use -->
                    <li>
                        <x-nav-link route="main.terms" label="{{ __('header.terms') }}" />
                    </li>
                    <!-- Privacy Policy -->
                    <li>
                        <x-nav-link route="main.privacypolicy" label="{{ __('header.privacy') }}" />
                    </li>
                    <!-- FAQ -->
                    <li>
                        <x-nav-link route="main.faq" label="{{ __('header.faq') }}" />
                    </li>
                    <!--  Contact Us-->
                    <li>
                        <x-nav-link route="main.contact" label="{{ __('header.contact') }}" />
                    </li>
                </ul>
            </nav>
            <div class="d-none d-xl-flex gap-2 align-items-center">
                <!-- Credit Balance Widget -->
                @auth
                    <div class="d-flex align-items-center bg-light px-3 py-2 rounded-4 gap-2 border">
                        <i class="bi bi-coin text-warning"></i>
                        <span class="small fw-bold">{{ auth()->user()->contact_credits }}</span>
                        <small class="text-muted d-none d-lg-inline">{{ __('header.credits') }}</small>
                    </div>
                @endauth
                <!-- Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn text-primary rounded-4 d-flex align-items-center gap-2 dropdown-toggle"
                        type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        title="User Profile">
                        <!-- User Icon -->
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="d-none d-lg-inline">{{ auth()->user()->name ?? __('header.profile') }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-8 p-3 mt-2"
                        aria-labelledby="profileDropdown" style="min-width: 220px;">
                        <!-- Profile Link -->
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2 px-3 rounded-6"
                                href="{{ route('main.profile') }}" wire:navigate>
                                <i class="bi bi-person-fill text-primary fs-5"></i>
                                <span class="fw-medium">{{ __('header.profile') }}</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider my-2 opacity-50">
                        </li>

                        <!-- Language Section -->
                        <li class="px-3 py-2">
                            <div class="d-flex align-items-center gap-2 text-muted mb-2">
                                <i class="bi bi-globe2 small"></i>
                                <span class="small fw-bold text-uppercase tracking-wider">{{ __('landing.footer.language') }}</span>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item d-flex align-items-center justify-content-between py-2 px-3 rounded-6 small {{ app()->getLocale() == $localeCode ? 'bg-light text-primary fw-bold' : '' }}"
                                        rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <span>{{ $properties['native'] }}</span>
                                        @if(app()->getLocale() == $localeCode)
                                            <i class="bi bi-check2 text-primary"></i>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider my-2 opacity-50">
                        </li>

                        <!-- Logout Form -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                @csrf
                                <a class="dropdown-item d-flex align-items-center gap-3 py-2 px-3 rounded-6 text-danger"
                                    href="#"
                                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                    <i class="bi bi-box-arrow-right fs-5"></i>
                                    <span class="fw-medium">{{ __('header.logout') }}</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- hamburger menu for mobile -->
            <button class="btn btn-light rounded-circle border d-xl-none btn_list" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu"
                aria-label="Toggle navigation" title="menu">
                <i class="bi bi-list fs-5"></i>
            </button>
            <!-- offcanvas menu -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
                <div class="offcanvas-header border-bottom" dir="{{ app()->getLocale() == 'ar' ? 'ltr' : '' }}">
                    <h5 class="offcanvas-title" id="offcanvasMenuLabel">
                        {{ __('header.menu') }}
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav class="mt-2">
                        <ul class="list-unstyled d-flex flex-column gap-4">
                            <li><x-nav-link route="main.home" label="{{ __('header.home') }}" /></li>
                            <li><x-nav-link route="main.about" label="{{ __('header.about') }}" /></li>
                            <li><a href="/ideas_en.html" class="text-dark">Investment Fund</a></li>
                            <li><x-nav-link route="main.terms" label="{{ __('header.terms') }}" /></li>
                            <li><x-nav-link route="main.privacypolicy" label="{{ __('header.privacy') }}" /></li>
                            <li><x-nav-link route="main.faq" label="{{ __('header.faq') }}" /></li>
                            <li><x-nav-link route="main.contact" label="{{ __('header.contact') }}" /></li>

                        </ul>
                    </nav>
                    <div class="d-flex flex-column gap-3 mt-4">
                        <!-- User Profile Section in Mobile Menu -->
                        <div class="border-top pt-3">
                            <h6 class="text-muted mb-3">{{ __('header.user_account') }}</h6>
                            <ul class="list-unstyled d-flex flex-column gap-3">
                                @auth
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center bg-light px-3 py-2 rounded-4 gap-2 border">
                                            <i class="bi bi-coin text-warning"></i>
                                            <span class="small fw-bold">{{ auth()->user()->contact_credits }}</span>
                                            <small class="text-muted">{{ __('header.credits') }}</small>
                                        </div>
                                    </li>
                                @endauth
                                <li>
                                    <a href="{{ route('main.profile') }}" class="text-dark d-flex align-items-center gap-3 py-2">
                                        <i class="bi bi-person-fill fs-5 text-primary"></i>
                                        <span class="fw-medium">{{ __('header.profile') }}</span>
                                    </a>
                                </li>

                                <!-- Mobile Language Switcher -->
                                <li class="mt-2">
                                    <div class="bg-light p-3 rounded-4 border">
                                        <div class="d-flex align-items-center gap-2 text-muted mb-3">
                                            <i class="bi bi-globe2 small"></i>
                                            <span class="small fw-bold text-uppercase tracking-wider">{{ __('landing.footer.language') }}</span>
                                        </div>
                                        <div class="d-flex gap-2">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a class="flex-fill text-center py-2 px-3 rounded-3 small text-decoration-none {{ app()->getLocale() == $localeCode ? 'bg-primary text-white fw-bold' : 'bg-white text-dark border' }}"
                                                    rel="alternate" hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>

                                <li class="mt-3">
                                    <form method="POST" action="{{ route('logout') }}" id="logoutFormMobile">
                                        @csrf
                                        <a class="btn btn-outline-danger rounded-4 w-100 d-flex align-items-center justify-content-center gap-2 py-3"
                                            href="#"
                                            onclick="event.preventDefault(); document.getElementById('logoutFormMobile').submit();">
                                            <i class="bi bi-box-arrow-right fs-5"></i>
                                            <span>{{ __('header.logout') }}</span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
