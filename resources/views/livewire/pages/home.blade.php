<!-- Home Section -->
<div class="container px-sm-0">
    <div class="row g-3">

        <!-- Submit Your Idea -->
        <div class="col-lg-3 col-md-6 col-6">
            <div class="d-flex flex-column h-100 ">
                <div class="card bg-white shadow-sm rounded-8 mb-3 h-100 card_custom">
                    <div class="card-body py-4 text-center d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/lamp-charge.png') }}" alt="lamp-charge" class="img-fluid mx-auto"
                            width="120" height="140" />
                    </div>
                </div>
                <a href="/idea_step1_en.html" aria-label="Submit Your Idea" title="Submit Your Idea" type="button"
                    class="btn bg-custom p-3 rounded-8 text-center shadow-sm">
                    <span class="fs-6 fw-bold">
                        {{ __('pages/mainpage.submit_idea') }}
                    </span>
                </a>
            </div>
        </div>

        <!-- Investor -->
        <div class="col-lg-3 col-md-6 col-6">
            <div class="d-flex flex-column h-100 ">
                <div class="card bg-white shadow-sm rounded-8 mb-3 h-100 card_custom">
                    <div class="card-body py-4 text-center d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/investor.png') }}" alt="investor" class="img-fluid mx-auto"
                            width="120" height="140" />
                    </div>
                </div>
                <a href="/investment_step1_en.html" aria-label="Investor" title="Investor" type="button"
                    class="btn bg-custom p-3 rounded-8 text-center shadow-sm">
                    <span class="fs-6 fw-bold">
                        {{ __('pages/mainpage.investor') }}
                    </span>
                </a>
            </div>
        </div>

        <!-- Explore Ideas -->
        <div class="col-lg-3 col-md-6 col-6">
            <div class="d-flex flex-column h-100 ">
                <div class="card bg-white shadow-sm rounded-8 mb-3 h-100 card_custom">
                    <div class="card-body py-4 text-center d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/search.png') }}" alt="search" class="img-fluid mx-auto"
                            width="120" height="140" />
                    </div>
                </div>
                <a href="/ideas_en.html" aria-label="Explore Ideas" title="Explore Ideas" type="button"
                    class="btn bg-custom p-3 rounded-8 text-center shadow-sm">
                    <span class="fs-6 fw-bold">
                        {{ __('pages/mainpage.explore_ideas') }}
                    </span>
                </a>
            </div>
        </div>

        <!-- Find an Investor -->
        <div class="col-lg-3 col-md-6 col-6">
            <div class="d-flex flex-column h-100">
                <div class="card bg-white shadow-sm rounded-8 mb-3 h-100 card_custom">
                    <div class="card-body py-4 text-center d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/investor-search.png') }}" alt="investor-search"
                            class="img-fluid mx-auto" width="120" height="140" />
                    </div>
                </div>
                <a href="/investor-search.html" aria-label="Find an Investor" title="Find an Investor" type="button"
                    class="btn bg-custom p-3 rounded-8 text-center shadow-sm">
                    <span class="fs-6 fw-bold">
                        {{ __('pages/mainpage.find_investor') }}
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="row g-3 mt-2 mb-3">
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
                            <!-- View All Ideas -->
                            <div class="col-12">
                                <a href="/ideas_en.html" class="btn bg-custom w-100 rounded-8 py-3">
                                    {{ __('pages/mainpage.view_all_ideas') }}
                                </a>
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
                            <!-- Latest Investment Opportunities -->
                            <div class="col-12">
                                <a href="/investment_en.html" class="btn bg-custom w-100 rounded-8 py-3">
                                    {{ __('pages/mainpage.view_all_opportunities') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
