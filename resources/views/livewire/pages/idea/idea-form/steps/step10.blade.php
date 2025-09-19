<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step10.title') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
        <div class="row g-3">
            <!-- Project + Capital + Expected Profits + Best Countries -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- The project -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.project') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        <h6 class="text-white mb-0">
                                            {{ __('idea.steps.step10.classification') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The required capital -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.capital') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        <h6 class="text-white mb-0">
                                            {{ __('global.value') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The expected profit -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.expected_profit') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        <h6 class="text-white mb-0">
                                            {{ __('global.value') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The best countries to implement the idea are -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.best_countries') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        <h6 class="text-white mb-0">
                                            {{ __('global.example_countries') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- The preferred way to contact you is + Requirements for implementing the idea -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- The preferred way to contact you is -->
                    <div class="col-lg-4 col-md-6 col-12 h-100">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.contact_way') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        <ol class="mb-0 d-flex flex-wrap gap-4 p-3 justify-content-center">
                                            <li>{{ __('global.mobile_number') }}</li>
                                            <li>{{ __('global.email') }}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Requirements for implementing the idea -->
                    <div class="col-lg-8 col-md-6 col-12 h-100">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.requirements') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 px-2 py-3 h-100 d-flex align-items-center justify-content-center">
                                        <ol class="mb-0 row g-2 px-4">
                                            <li class="col-lg-4 col-6">{{ __('global.requirement_company') }}</li>
                                            <li class="col-lg-4 col-6">{{ __('global.requirement_employees') }}</li>
                                            <li class="col-lg-4 col-6">{{ __('global.requirement_workers') }}</li>
                                            <li class="col-lg-4 col-6">{{ __('global.requirement_equipment') }}</li>
                                            <li class="col-lg-4 col-6">{{ __('global.requirement_office') }}</li>
                                            <li class="col-lg-4 col-6">{{ __('global.requirement_website') }}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- You will contribute by + Your requirements are + Distribution of the required capital -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- You will contribute by -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.contribution') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        {{ __('global.example_contribution') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Your requirements are -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.your_requirements') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        {{ __('global.example_requirements') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Distribution of the required capital -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.capital_distribution') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        {{ __('global.example_distribution') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- attached files + Idea summary -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- attached files -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column h-100">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.attachments') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center gap-2 justify-content-center">
                                        <img src="{{ asset('images/Container.png') }}" alt="PDF" width="30"
                                            height="32" />
                                        <div class="text-start">
                                            <div class="fw-bold small">File Title.pdf</div>
                                            <small class="text-white small" dir="ltr">913 KB . 31 Aug,
                                                2022</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Idea summary -->
                    <div class="col-lg-9 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0">
                                <div class="d-flex flex-column h-100">
                                    <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                        <h6 class="mb-0 fw-bold">
                                            {{ __('idea.steps.step10.summary') }}
                                        </h6>
                                    </div>
                                    <div
                                        class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                        {{ __('idea.steps.step10.summary') }}
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
