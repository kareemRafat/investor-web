<!-- Header -->
<header class="container my-3">
    <div class="row px-2 px-xl-0">
        <div class="d-flex align-items-center justify-content-between bg-white py-3 px-4 shadow-sm rounded-8">
            <!-- logo -->
            <a href="{{ route('main.home') }}" wire:navigate class="logo" title="Investment" aria-label="Investment">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="img-fluid" width="120" height="120" />
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
                        <x-nav-link route="investor.index" label="{{ __('header.investment') }}" />
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
                <!-- Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn text-primary rounded-4 d-flex align-items-center gap-2 dropdown-toggle"
                        type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        title="User Profile">
                        <!-- User Icon -->
                        <i class="bi bi-person-circle fs-5"></i>
                        <span class="d-none d-lg-inline">{{ auth()->user()->name ?? __('header.profile') }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-8 p-2 mt-2"
                        aria-labelledby="profileDropdown">
                        <!-- Profile Link -->
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-1 px-3 rounded-6 small"
                                href="#" wire:navigate>
                                <i class="bi bi-person-fill text-primary"></i>
                                <span>{{ __('header.profile') }}</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider my-2">
                        </li>
                        <!-- Logout Form -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                @csrf
                                <a class="dropdown-item d-flex align-items-center gap-2 py-1 px-3 rounded-6 text-danger small"
                                    href="#"
                                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        width="24" height="24" class="flex-shrink-0">
                                        <path fill-rule="evenodd"
                                            d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span>{{ __('header.logout') }}</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- language -->
                <div class="dropdown">
                    <button class="btn text-primary dropdown-toggle" type="button" id="languageDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false" title="Choose Language">
                        <i class="bi bi-globe2"></i>
                    </button>
                    <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="languageDropdown">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item text-center" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
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
                        <!-- make language as accordion! -->
                        <div class="accordion mt-3" id="languageAccordionMobile">
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingLanguageMobile">
                                    <button
                                        class="accordion-button collapsed bg-white text-dark mx-0 px-0 d-flex justify-content-between"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseLanguageMobile" aria-expanded="false"
                                        aria-controls="collapseLanguageMobile" title="Choose Language">
                                        Choose Language
                                    </button>
                                </h2>
                                <div id="collapseLanguageMobile" class="accordion-collapse collapse"
                                    aria-labelledby="headingLanguageMobile" data-bs-parent="#languageAccordionMobile">
                                    <div class="accordion-body px-0">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                                                <li><a class="text-dark py-2" hreflang="{{ $localeCode }}"
                                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                                </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="d-flex flex-column gap-3 mt-4">
                        <!-- User Profile Section in Mobile Menu -->
                        <div class="border-top pt-3">
                            <h6 class="text-muted mb-3">{{ __('header.user_account') }}</h6>
                            <ul class="list-unstyled d-flex flex-column gap-3">
                                <li>
                                    <a href="#" class="text-dark d-flex align-items-center gap-2 py-2">
                                        <i class="bi bi-person-fill fs-5 text-primary"></i>
                                        <span>{{ __('header.profile') }}</span>
                                    </a>
                                </li>
                                <li class="mt-2">
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
