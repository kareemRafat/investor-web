<!-- Header -->
<header class="container my-3">
    <div class="row px-2 px-xl-0">
        <div class="d-flex align-items-center justify-content-between bg-white py-3 px-4 shadow-sm rounded-8">
            <!-- logo -->
            <a href="/index_en.html" class="logo" title="Investment" aria-label="Investment">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="img-fluid" width="120" height="120" />
            </a>
            <!-- menu items -->
            <nav class="d-none d-xl-flex">
                <ul class="list-unstyled d-flex gap-xl-3 gap-xl-4 mb-0">
                    <li>
                        <x-nav-link route="main.home" label="Home" />
                    </li>
                    <li>
                        <x-nav-link route="main.about" label="About Us" />
                    </li>
                    <!-- Investment Fund -->
                    <li>
                        <a href="/ideas_en.html" class="text-dark">
                            Investment Fund
                        </a>
                    </li>
                    <!-- Terms of Use -->
                    <li>
                        <x-nav-link route="main.terms" label="Terms of Use" />
                    </li>
                    <!-- Privacy Policy -->
                    <li>
                        <x-nav-link route="main.privacypolicy" label="Privacy Policy" />
                    </li>
                    <!-- FAQ -->
                    <li>
                        <x-nav-link route="main.faq" label="FAQ" />
                    </li>
                    <!--  Contact Us-->
                    <li>
                        <x-nav-link route="main.contact" label="Contact Us" />
                    </li>
                </ul>
            </nav>
            <div class="d-none d-xl-flex gap-2">
                <!-- login button -->
                <a href="/login_en.html" class="btn btn-primary rounded-4 pt-2" title="login" aria-label="login">
                    <span class="small fw-semibold">
                        Login
                    </span>
                </a>
                <!-- language -->
                <div class="dropdown">
                    <button class="btn text-primary dropdown-toggle" type="button" id="languageDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false" title="Choose Language">
                        <i class="bi bi-globe2"></i>
                    </button>
                    <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item text-center" href="./index.html">العربية</a></li>
                        <li><a class="dropdown-item text-center" href="./index_en.html">English</a></li>
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
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasMenuLabel">menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav class="mt-2">
                        <ul class="list-unstyled d-flex flex-column gap-4">
                            <li><a href="/index_en.html" class="text-dark active">Home</a></li>
                            <li><a href="/about_en.html" class="text-dark">About Us</a></li>
                            <li><a href="/ideas_en.html" class="text-dark">Investment Fund</a></li>
                            <li><a href="/terms_en.html" class="text-dark">Terms of Use</a></li>
                            <li><a href="/privacy_en.html" class="text-dark">Privacy Policy</a></li>
                            <li><a href="/faq_en.html" class="text-dark">FAQ</a></li>
                            <li><a href="/contact_en.html" class="text-dark">Contact Us</a></li>
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
                                        <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                                            <li><a class="text-dark py-2" href="#">العربية</a></li>
                                            <li><a class="text-dark py-2" href="#">English</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="d-flex flex-column gap-3 mt-4">
                        <!-- login button -->
                        <a href="/login_en.html" class="btn btn-primary rounded-4 py-3" title="login"
                            aria-label="login">
                            <span class="small fw-semibold">
                                Login
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
