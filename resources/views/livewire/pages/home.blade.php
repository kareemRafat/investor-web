<!-- Home Section -->
@php
    $arrowIcon = app()->getLocale() == 'ar' ? 'bi-arrow-left-short' : 'bi-arrow-right-short';
@endphp
<div class="container px-sm-0">
    <div class="row g-4 home-actions">
        <!-- Submit Idea -->
        <div class="col-lg-6 col-md-6 col-12">
            <a href="{{ route('idea.main') }}" wire:navigate class="hero-link">
                <div class="hero-card primary">
                    <div class="hero-content">
                        <h3>{{ __('pages/mainpage.submit_idea') }}</h3>
                        <p>{{ __('pages/mainpage.submit_idea_description') }}</p>
                        <span class="hero-cta d-flex align-items-end">
                            {{ __('pages/mainpage.submit_idea_cta') }}
                            <i class="bi {{ $arrowIcon }} mx-1 fs-5"></i>
                        </span>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('images/lamp-charge.png') }}" alt="">
                    </div>
                </div>
            </a>
        </div>

        <!-- Investor -->
        <div class="col-lg-6 col-md-6 col-12">
            <a href="{{ route('investor.main') }}" wire:navigate class="hero-link">
                <div class="hero-card success">
                    <div class="hero-content">
                        <h3>{{ __('pages/mainpage.investor') }}</h3>
                        <p>{{ __('pages/mainpage.investor_description') }}</p>
                        <span class="hero-cta d-flex align-items-end">
                            {{ __('pages/mainpage.investor_cta') }}
                            <i class="bi {{ $arrowIcon }} mx-1 fs-5"></i>
                        </span>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('images/investor.png') }}" alt="">
                    </div>
                </div>
            </a>
        </div>

        <!-- Explore Ideas -->
        <div class="col-lg-6 col-md-6 col-12">
            <a href="{{ route('idea.index') }}" wire:navigate class="hero-link">
                <div class="hero-card warning">
                    <div class="hero-content">
                        <h3>{{ __('pages/mainpage.explore_ideas') }}</h3>
                        <p>{{ __('pages/mainpage.explore_ideas_description') }}</p>
                        <span class="hero-cta d-flex align-items-end">
                            {{ __('pages/mainpage.explore_ideas_cta') }}
                            <i class="bi {{ $arrowIcon }} mx-1 fs-5"></i>
                        </span>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('images/search.png') }}" alt="">
                    </div>
                </div>
            </a>
        </div>

        <!-- Find Investor -->
        <div class="col-lg-6 col-md-6 col-12">
            <a href="{{ route('investor.index') }}" class="hero-link">
                <div class="hero-card info">
                    <div class="hero-content">
                        <h3>{{ __('pages/mainpage.find_investor') }}</h3>
                        <p>{{ __('pages/mainpage.find_investor_description') }}</p>
                        <span class="hero-cta d-flex align-items-end">
                            {{ __('pages/mainpage.find_investor_cta') }}
                            <i class="bi {{ $arrowIcon }} mx-1 fs-5"></i>
                        </span>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('images/investor-search.png') }}" alt="">
                    </div>
                </div>
            </a>
        </div>
    </div>
    {{-- <div class="row g-3 mt-2 mb-3">
        <div class="col-lg-6 col-12">
            <div class="card border-0 shadow-sm rounded-8">
                <div class="card-body">
                    <!-- Latest Ideas -->
                    <div class="d-flex flex-column">
                        <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                            <h5 class="mb-0 p-3 fw-bold text-center">
                                {{ __('pages/mainpage.latest_ideas') }}
                            </h5>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <!-- 1 -->
                            <div class="col-12">
                                <div class="card bg-light border-0 rounded-8">
                                    <div class="card-body">
                                        <div class="row mx-0 px-0 g-2">
                                            <!-- img -->
                                            <div class="col-12 col-lg-4 d-flex justify-content-center">
                                                <img src="{{ asset('images/idea.png') }}" alt="idea1"
                                                    class="img-fluid rounded-8 img_idea w-100" width="120"
                                                    height="120" />
                                            </div>
                                            <!-- data -->
                                            <div class="col-12 col-lg-8">
                                                <div class="d-flex flex-column mt-2 mt-lg-0 gap-1">
                                                    <h6 class="mb-0 fw-bold text-dark">
                                                        App for Booking Medical Appointments
                                                    </h6>
                                                    <p class="text-muted mb-0 small text-ellipsis-3 mt-2">
                                                        A digital platform that helps patients book appointments
                                                        with nearby clinics anytime.
                                                    </p>
                                                    <div
                                                        class="d-flex align-items-center flex-wrap justify-content-between gap-2 mt-2">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- person -->
                                                            <i class="bi bi-person text-primary"></i>
                                                            <span class="text-muted small">
                                                                Ahmed Mo
                                                            </span>
                                                        </div>
                                                        <!-- tags -->
                                                        <div class="d-flex align-items-center gap-1">
                                                            <i class="bi bi-tags text-primary"></i>
                                                            <span class="text-muted small">
                                                                Health / Technology
                                                            </span>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- calendar -->
                                                            <i class="bi bi-calendar3 text-primary small"></i>
                                                            <span class="text-muted small">
                                                                15 June 2025
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="col-12">
                                <div class="card bg-light border-0 rounded-8">
                                    <div class="card-body">
                                        <div class="row mx-0 px-0 g-2">
                                            <!-- img -->
                                            <div class="col-12 col-lg-4 d-flex justify-content-center">
                                                <img src="{{ asset('images/idea.png') }}" alt="idea1"
                                                    class="img-fluid rounded-8 img_idea w-100" width="120"
                                                    height="120" />
                                            </div>
                                            <!-- data -->
                                            <div class="col-12 col-lg-8">
                                                <div class="d-flex flex-column mt-2 mt-lg-0 gap-1">
                                                    <h6 class="mb-0 fw-bold text-dark">
                                                        App for Booking Medical Appointments
                                                    </h6>
                                                    <p class="text-muted mb-0 small text-ellipsis-3 mt-2">
                                                        A digital platform that helps patients book appointments
                                                        with nearby clinics anytime.
                                                    </p>
                                                    <div
                                                        class="d-flex align-items-center flex-wrap justify-content-between gap-2 mt-2">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- person -->
                                                            <i class="bi bi-person text-primary"></i>
                                                            <span class="text-muted small">
                                                                Ahmed Mo
                                                            </span>
                                                        </div>
                                                        <!-- tags -->
                                                        <div class="d-flex align-items-center gap-1">
                                                            <i class="bi bi-tags text-primary"></i>
                                                            <span class="text-muted small">
                                                                Health / Technology
                                                            </span>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- calendar -->
                                                            <i class="bi bi-calendar3 text-primary small"></i>
                                                            <span class="text-muted small">
                                                                15 June 2025
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card border-0 shadow-sm rounded-8">
                <div class="card-body">
                    <!-- Latest Investment Opportunities -->
                    <div class="d-flex flex-column">
                        <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                            <h5 class="mb-0 p-3 fw-bold text-center">
                                {{ __('pages/mainpage.latest_opportunities') }}
                            </h5>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <!-- 1 -->
                            <div class="col-12">
                                <div class="card bg-light border-0 rounded-8">
                                    <div class="card-body">
                                        <div class="row mx-0 px-0 g-2">
                                            <!-- img -->
                                            <div class="col-12 col-lg-4 d-flex justify-content-center">
                                                <img src="{{ asset('images/idea.png') }}" alt="idea1"
                                                    class="img-fluid rounded-8 img_idea w-100" width="120"
                                                    height="120" />
                                            </div>
                                            <!-- data -->
                                            <div class="col-12 col-lg-8">
                                                <div class="d-flex flex-column mt-2 mt-lg-0 gap-1">
                                                    <h6 class="mb-0 fw-bold text-dark">
                                                        App for Booking Medical Appointments
                                                    </h6>
                                                    <p class="text-muted mb-0 small text-ellipsis-3 mt-2">
                                                        A digital platform that helps patients book appointments
                                                        with nearby clinics anytime.
                                                    </p>
                                                    <div
                                                        class="d-flex align-items-center flex-wrap justify-content-between gap-2 mt-2">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- person -->
                                                            <i class="bi bi-person text-primary"></i>
                                                            <span class="text-muted small">
                                                                Ahmed Mo
                                                            </span>
                                                        </div>
                                                        <!-- tags -->
                                                        <div class="d-flex align-items-center gap-1">
                                                            <i class="bi bi-tags text-primary"></i>
                                                            <span class="text-muted small">
                                                                Health / Technology
                                                            </span>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- calendar -->
                                                            <i class="bi bi-calendar3 text-primary small"></i>
                                                            <span class="text-muted small">
                                                                15 June 2025
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="col-12">
                                <div class="card bg-light border-0 rounded-8">
                                    <div class="card-body">
                                        <div class="row mx-0 px-0 g-2">
                                            <!-- img -->
                                            <div class="col-12 col-lg-4 d-flex justify-content-center">
                                                <img src="{{ asset('images/idea.png') }}" alt="idea1"
                                                    class="img-fluid rounded-8 img_idea w-100" width="120"
                                                    height="120" />
                                            </div>
                                            <!-- data -->
                                            <div class="col-12 col-lg-8">
                                                <div class="d-flex flex-column mt-2 mt-lg-0 gap-1">
                                                    <h6 class="mb-0 fw-bold text-dark">
                                                        App for Booking Medical Appointments
                                                    </h6>
                                                    <p class="text-muted mb-0 small text-ellipsis-3 mt-2">
                                                        A digital platform that helps patients book appointments
                                                        with nearby clinics anytime.
                                                    </p>
                                                    <div
                                                        class="d-flex align-items-center flex-wrap justify-content-between gap-2 mt-2">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- person -->
                                                            <i class="bi bi-person text-primary"></i>
                                                            <span class="text-muted small">
                                                                Ahmed Mo
                                                            </span>
                                                        </div>
                                                        <!-- tags -->
                                                        <div class="d-flex align-items-center gap-1">
                                                            <i class="bi bi-tags text-primary"></i>
                                                            <span class="text-muted small">
                                                                Health / Technology
                                                            </span>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <!-- calendar -->
                                                            <i class="bi bi-calendar3 text-primary small"></i>
                                                            <span class="text-muted small">
                                                                15 June 2025
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
