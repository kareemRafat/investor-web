<!-- Terms Section -->
<div class="container px-sm-0" id="top">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('pages.terms.title') }}
                </h5>
            </div>
        </div>
    </div>

    <!-- Intro -->
    <div class="card border-0 shadow-sm rounded-8 mb-3">
        <div class="card-body p-4 d-flex gap-3">
            <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1 align-self-start"><i class="bi bi-info-circle fs-5"></i></span>
            <p class="text-secondary mb-0">{{ __('pages.terms.intro') }}</p>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <!-- Table of contents -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-8 sticky-top">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-list-ul fs-6"></i></span>
                        {{ __('pages.terms.toc') }}
                    </h6>
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-acceptance"><span class="text-primary fw-bold">01</span> &ndash; {{ __('pages.terms.acceptance.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-obligations"><span class="text-primary fw-bold">02</span> &ndash; {{ __('pages.terms.obligations.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-intellectual"><span class="text-primary fw-bold">03</span> &ndash; {{ __('pages.terms.intellectual.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-disclaimer"><span class="text-primary fw-bold">04</span> &ndash; {{ __('pages.terms.disclaimer.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-liability"><span class="text-primary fw-bold">05</span> &ndash; {{ __('pages.terms.liability.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-termination"><span class="text-primary fw-bold">06</span> &ndash; {{ __('pages.terms.termination.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-law"><span class="text-primary fw-bold">07</span> &ndash; {{ __('pages.terms.law.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-changes"><span class="text-primary fw-bold">08</span> &ndash; {{ __('pages.terms.changes.title') }}</a>
                        <a class="list-group-item list-group-item-action border-0 px-0 py-2 small text-secondary" href="#section-contact"><span class="text-primary fw-bold">09</span> &ndash; {{ __('pages.terms.contact.title') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terms of Use -->
        <div class="col-lg-8 d-flex flex-column gap-3">
            <div class="card border-0 shadow-sm rounded-8" id="section-acceptance">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-patch-check fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">01</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.acceptance.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-0">{{ __('pages.terms.acceptance.text') }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-obligations">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-list-check fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">02</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.obligations.title') }}</h6>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        @foreach(__('pages.terms.obligations.items') as $item)
                            <div class="d-flex gap-2 text-secondary">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                                <span>{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-intellectual">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-award fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">03</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.intellectual.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-0">{{ __('pages.terms.intellectual.text') }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-disclaimer">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-exclamation-triangle fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">04</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.disclaimer.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-0">{{ __('pages.terms.disclaimer.text') }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-liability">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-shield-exclamation fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">05</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.liability.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-0">{{ __('pages.terms.liability.text') }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-termination">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-x-octagon fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">06</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.termination.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-0">{{ __('pages.terms.termination.text') }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-law">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-bank fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">07</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.law.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-0">{{ __('pages.terms.law.text') }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-changes">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-arrow-clockwise fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">08</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.changes.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-0">{{ __('pages.terms.changes.text') }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-8" id="section-contact">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 px-2 py-1"><i class="bi bi-envelope fs-5"></i></span>
                        <div>
                            <span class="text-primary fw-bold small">09</span>
                            <h6 class="fw-bold text-dark mb-0">{{ __('pages.terms.contact.title') }}</h6>
                        </div>
                    </div>
                    <p class="text-secondary mb-2">{{ __('pages.terms.contact.text') }}</p>
                    <span class="badge bg-light text-primary border fw-semibold px-3 py-2 d-inline-flex align-items-center gap-1">
                        <i class="bi bi-envelope"></i>{{ __('pages.terms.contact.email') }}
                    </span>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-end flex-wrap gap-2 pt-1">
                <a href="#top" class="btn btn-sm btn-outline-primary rounded-4 d-inline-flex align-items-center gap-1">
                    <i class="bi bi-arrow-up"></i>{{ __('pages.terms.top') }}
                </a>
            </div>
        </div>
    </div>
</div>
