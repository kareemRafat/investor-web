<!-- Terms Section -->
<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('pages.terms.title') }}
                </h5>
            </div>
            <div class="card border-0 shadow-sm rounded-8">
                <div class="card-body">
                    <!-- Terms of Use -->
                    <div class="d-flex flex-column">
                        <div class="col-12">
                            <div class="card bg-transparent border-0">
                                <div class="card-body">
                                    <p class="text-secondary mb-3">
                                        {{ __('pages.terms.intro') }}
                                    </p>
                                    <ol class="text-secondary line-height-2 row g-2">
                                        <div class="col-lg-6 col-12 d-flex flex-column gap-2">
                                            <li>
                                                <strong>{{ __('pages.terms.acceptance.title') }}</strong>
                                                <p>{{ __('pages.terms.acceptance.text') }}</p>
                                            </li>
                                            <li>
                                                <strong>{{ __('pages.terms.obligations.title') }}</strong>
                                                <ul class="ul_square pe-3">
                                                    @foreach(__('pages.terms.obligations.items') as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <strong>{{ __('pages.terms.intellectual.title') }}</strong>
                                                <p>{{ __('pages.terms.intellectual.text') }}</p>
                                            </li>
                                            <li>
                                                <strong>{{ __('pages.terms.disclaimer.title') }}</strong>
                                                <p>{{ __('pages.terms.disclaimer.text') }}</p>
                                            </li>
                                        </div>
                                        <div class="col-lg-6 col-12 d-flex flex-column gap-2">
                                            <li>
                                                <strong>{{ __('pages.terms.liability.title') }}</strong>
                                                <p>{{ __('pages.terms.liability.text') }}</p>
                                            </li>
                                            <li>
                                                <strong>{{ __('pages.terms.termination.title') }}</strong>
                                                <p>{{ __('pages.terms.termination.text') }}</p>
                                            </li>
                                            <li>
                                                <strong>{{ __('pages.terms.law.title') }}</strong>
                                                <p>{{ __('pages.terms.law.text') }}</p>
                                            </li>
                                            <li>
                                                <strong>{{ __('pages.terms.changes.title') }}</strong>
                                                <p>{{ __('pages.terms.changes.text') }}</p>
                                            </li>
                                            <li>
                                                <strong>{{ __('pages.terms.contact.title') }}</strong>
                                                <p>
                                                    {{ __('pages.terms.contact.text') }} <br>
                                                    <span class="d-inline-block mt-2">
                                                        <i class="bi bi-envelope"></i>
                                                        {{ __('pages.terms.contact.email') }}
                                                    </span>
                                                </p>
                                            </li>
                                        </div>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
