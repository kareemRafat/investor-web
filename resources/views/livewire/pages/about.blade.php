<!-- Contact Section -->
<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('header.about') }}
                </h5>
            </div>
            <div class="card border-0 shadow-sm rounded-8">
                <div class="card-body">
                    <!--  WHO US-->
                    <div class="d-flex flex-column">
                        <div class="col-12">
                            <div class="card bg-transparent border-0">
                                <div class="card-body">
                                    <div class="row mx-0 px-0 g-2 align-items-center justify-content-between">
                                        <!-- data -->
                                        <div class="col-12 col-lg-6 align-self-start order-1 order-lg-0 mt-4 mt-lg-0">
                                            <h5 class="fw-bold mb-3">
                                                {{ __('pages.about.heading') }}

                                            </h5>
                                            <p class="line-height-2 text-secondary">
                                                {{ __('pages.about.text') }}
                                            </p>
                                        </div>
                                        <!-- img -->
                                        <div class="col-12 col-lg-5 d-flex justify-content-center order-0 order-lg-1">
                                            <img src="{{ asset('images/about.png') }}" alt="about"
                                                class="img-fluid rounded-8 w-100 img_about" width="500"
                                                height="500" />
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
