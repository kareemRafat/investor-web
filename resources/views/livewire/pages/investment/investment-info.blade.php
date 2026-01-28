<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">

            {{-- page Title --}}
            <div class="bg-light text-dark rounded-3 shadow-sm mb-4">
                <h5 class="mb-0 p-3 fw-semibold text-center">
                    {{ __('investor.summary.title') }}
                </h5>
            </div>

            {{-- Main Content Card --}}
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    {{-- Refuse --}}
                    @if ($investor->status->value === 'rejected')
                        <div class="alert alert-danger d-flex align-items-start gap-3 shadow-sm mb-4" role="alert"
                            style="border-radius: 12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 mt-1" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.964 0L.165 13.233c-.457.778.091 1.767.982 1.767h13.706c.89 0 1.438-.99.982-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>

                            <div>
                                <h6 class="alert-heading mb-2 fw-bold">{{ __('idea.info.refuse_title') }}</h6>
                                <p class="mb-0">
                                    {{ __('idea.info.refuse_reason') }} :
                                    <span class="fw-semibold">
                                        {{ $investor->admin_note }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- Section 1: Core Info --}}
                    <div class="row g-3 mb-4">
                        <div class="mb-3">
                            <div
                                class="card__title-card bg-gradient-primary text-white rounded-3 p-3 position-relative overflow-hidden">
                                <!-- خلفية زخرفية -->
                                <div class="position-absolute top-0 end-0 opacity-25">
                                    <i class="bi bi-stars" style="font-size: 4rem;"></i>
                                </div>
                                <div class="position-relative z-1">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="bi bi-quote fs-4 opacity-75"></i>
                                        <h5 class="mb-0 fw-bold" style="text-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                            {{ $investor->title }}
                                        </h5>
                                        <i class="bi bi-quote fs-4 opacity-75" style="transform: rotate(180deg);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- time --}}
                        <div class="pb-2 pt-0">
                            <div
                                class="d-flex flex-column flex-sm-row align-items-center justify-content-between border-top border-bottom py-2 gap-3">
                                <div class="d-flex align-items-center gap-3 align-self-start">
                                    <!-- التاريخ -->
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-calendar3 text-primary"></i>
                                        <small class="text-muted">{{ __('profile.investment_offers.created_at') }} :
                                        </small>
                                        <span class="fw-semibold text-dark">
                                            {{ $investor->created_at->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- الوقت المنقضي -->
                                <div class="d-flex align-items-center gap-2 align-self-end">
                                    <i class="bi bi-hourglass-split text-secondary"></i>
                                    <span class="badge bg-light text-dark border p-2">
                                        {{ $investor->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Project --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="border rounded-3 p-3 h-100 bg-primary bg-opacity-10">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-briefcase text-primary fs-5"></i>
                                    <small
                                        class="text-muted fw-semibold">{{ __('investor.steps.step7.project') }}</small>
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
                                        class="text-muted fw-semibold">{{ __('investor.steps.step7.required_capital') }}</small>
                                </div>
                                <div class="fw-semibold text-dark small">
                                    {!! $investor->contributions?->money_contribution_label ?? __('investor.common.unspecified') !!}
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
                                            {{ __('investor.common.unspecified') }}
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
                                            <div class="col-12 text-center text-muted">
                                                {{ __('investor.common.unspecified') }}</div>
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
                                        @if ($investor->contributions?->contribute_type)
                                            {{ __('investor.steps.step4.' . $investor->contributions->contribute_type) }}
                                        @else
                                            {{ __('investor.common.unspecified') }}
                                        @endif
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
                                        {{ $investor->summary ?? __('investor.common.unspecified') }}
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
                                        <div class="text-center text-muted small">
                                            {{ __('investor.common.unspecified') }}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Button --}}
                <div class="mt-4">
                    <livewire:components.unlock-contact :model="$investor" />
                </div>

            </div>
        </div>
    </div>
