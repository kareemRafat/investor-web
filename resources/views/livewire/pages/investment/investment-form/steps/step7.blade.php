<div>
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step7.title') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
        <div class="row g-3">

            <!-- Project + Capital + Expected Profit + Best Countries -->
            <div class="col-12">

                {{-- Section 1: Core Info --}}
                <div class="row g-3 mb-4">

                    {{-- Project --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="border rounded-3 p-3 h-100 bg-primary bg-opacity-10">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-briefcase text-primary fs-5"></i>
                                <small class="text-muted fw-semibold">{{ __('investor.steps.step7.project') }}</small>
                            </div>
                            <h6 class="mb-0 fw-bold text-primary">
                                {{ __('investor.steps.step1.options.' . ($investor->investor_field ?? '-')) }}
                            </h6>
                        </div>
                    </div>

                    {{-- Contribution Amount --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="border rounded-3 p-3 h-100 bg-success bg-opacity-10">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-cash-stack text-success fs-5"></i>
                                <small
                                    class="text-muted fw-semibold">{{ __('investor.steps.step7.contribution') }}</small>
                            </div>
                            <div class="fw-semibold text-dark small">
                                {!! $investor->contributions->money_contribution_label ?? '-' !!}
                            </div>
                        </div>
                    </div>

                    {{-- Best Countries --}}
                    <div class="col-lg-6">
                        <div class="border rounded-3 p-3 h-100 bg-info bg-opacity-10">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-globe-americas text-info fs-5"></i>
                                <small
                                    class="text-muted fw-semibold">{{ __('investor.steps.step7.best_countries') }}</small>
                            </div>
                            <div class="fw-semibold text-dark small">
                                @forelse($investor->countries as $country)
                                    @php
                                        $countryOption = collect(__('investor.steps.step2.options'))->firstWhere(
                                            'code',
                                            $country->country,
                                        );
                                        $countryName = $countryOption['name'] ?? $country->country;
                                    @endphp
                                    {{ $countryName }}@if (!$loop->last)
                                        ,
                                    @endif
                                    @empty
                                        -
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- Section 2: Contact & Requirements --}}
                    <div class="row g-3 mb-4">

                        {{-- Contact Way --}}
                        <div class="col-lg-4">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-telephone text-primary fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.preferred_contact') }}</h6>
                                </div>
                                <ul class="list-unstyled mb-0 ps-4">
                                    <li class="mb-2">
                                        <i class="bi bi-phone text-success me-2"></i>
                                        @if (app()->getLocale() === 'ar')
                                            الهاتف النقال
                                        @else
                                            Mobile Phone
                                        @endif
                                    </li>
                                    <li>
                                        <i class="bi bi-envelope text-danger me-2"></i>
                                        @if (app()->getLocale() === 'ar')
                                            البريد الإلكتروني
                                        @else
                                            Email
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- Requirements --}}
                        <div class="col-lg-8">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-list-check text-primary fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.requirements') }}</h6>
                                </div>
                                <div class="row g-2">
                                    @forelse(array_slice($investor->resources->translated_requirements ?? [], 0, 6) as $index => $resource)
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start gap-2">
                                                <span class="badge bg-primary rounded-circle"
                                                    style="width: 24px; height: 24px; padding: 4px;">{{ $index + 1 }}</span>
                                                <small class="text-dark">{{ $resource }}</small>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center text-muted">-</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- Section 3: Contribution Type --}}
                    <div class="row g-3 mb-4">

                        <div class="col-12">
                            <div class="border rounded-3 p-3 bg-warning bg-opacity-10">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-person-check text-warning fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.contribution') }}</h6>
                                </div>
                                <div class="fw-semibold text-dark">
                                    {{ __('investor.steps.step4.' . $investor->contributions->contribute_type) }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- Section 4: Summary & Attachments --}}
                    <div class="row g-3">

                        {{-- Summary --}}
                        <div class="col-lg-9">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-file-text text-primary fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.summary') }}</h6>
                                </div>
                                <p class="mb-0 text-dark">
                                    {{ $investor->summary ?? '-' }}
                                </p>
                            </div>
                        </div>

                        {{-- Attachments --}}
                        <div class="col-lg-3">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-paperclip text-secondary fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.attachments') }}</h6>
                                </div>
                                @forelse($investor->attachments as $file)
                                    <div class="d-flex align-items-center gap-2 mb-2 p-2 bg-white rounded-2">
                                        <i class="bi bi-file-earmark-pdf text-danger"></i>
                                        <div class="flex-grow-1" style="min-width: 0;">
                                            <div class="text-truncate small fw-semibold">
                                                {{ $file->original_name ?? basename($file->path) }}
                                            </div>
                                            <small class="text-muted" style="font-size: 0.7rem;">
                                                {{ $file->size_kb }}
                                            </small>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-muted small">-</div>
                                @endforelse
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
