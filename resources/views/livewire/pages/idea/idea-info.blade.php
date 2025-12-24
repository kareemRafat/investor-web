<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">

            {{-- page Title --}}
            <div class="bg-light text-dark rounded-3 shadow-sm mb-4">
                <h5 class="mb-0 p-3 fw-semibold text-center">
                    {{ __('idea.summary.title') }}
                </h5>
            </div>

            {{-- Main Content Card --}}
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    {{-- Section 1: Core Info --}}
                    <div class="row g-3 mb-4">

                        {{-- title --}}
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
                                            {{ $idea->title }}
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
                                            {{ $idea->created_at->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- الوقت المنقضي -->
                                <div class="d-flex align-items-center gap-2 align-self-end">
                                    <i class="bi bi-hourglass-split text-secondary"></i>
                                    <span class="badge bg-light text-dark border p-2">
                                        {{ $idea->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Project --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="border rounded-3 p-3 h-100 bg-primary bg-opacity-10">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-lightbulb text-primary fs-5"></i>
                                    <small class="text-muted fw-semibold">{{ __('idea.steps.step10.project') }}</small>
                                </div>
                                <h6 class="mb-0 fw-bold text-primary">
                                    {{ __('idea.steps.step1.options.' . ($idea->idea_field ?? '-')) }}
                                </h6>
                            </div>
                        </div>

                        {{-- Capital --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="border rounded-3 p-3 h-100 bg-success bg-opacity-10">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-cash-stack text-success fs-5"></i>
                                    <small class="text-muted fw-semibold">{{ __('idea.steps.step10.capital') }}</small>
                                </div>
                                <div class="fw-semibold text-dark small">
                                    @forelse($idea->costs as $cost)
                                        <div>{!! app()->getLocale() === 'ar' ? $cost->range->label_ar : $cost->range->label_en !!}</div>
                                        <small
                                            class="text-muted">{{ __('idea.steps.step3.types.' . ($cost->cost_type ?? __('idea.common.unspecified'))) }}</small>
                                    @empty
                                        <span class="text-muted">{{ __('idea.common.unspecified') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        {{-- Expected Profit --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="border rounded-3 p-3 h-100 bg-warning bg-opacity-10">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-graph-up-arrow text-warning fs-5"></i>
                                    <small
                                        class="text-muted fw-semibold">{{ __('idea.steps.step10.expected_profit') }}</small>
                                </div>
                                <div class="fw-semibold text-dark small">
                                    @forelse($idea->profits as $profit)
                                        <div>{!! app()->getLocale() === 'ar' ? $profit->range->label_ar : $profit->range->label_en !!}</div>
                                        <small
                                            class="text-muted">{{ __('idea.steps.step4.types.' . (str_replace('-', '_', $profit->profit_type) ?? '-')) }}</small>
                                    @empty
                                        <span class="text-muted">{{ __('idea.common.unspecified') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        {{-- Best Countries --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="border rounded-3 p-3 h-100 bg-info bg-opacity-10">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bi bi-globe-americas text-info fs-5"></i>
                                    <small
                                        class="text-muted fw-semibold">{{ __('idea.steps.step10.best_countries') }}</small>
                                </div>
                                <div class="fw-semibold text-dark small">
                                    @forelse($idea->countries as $country)
                                        @php
                                            $countryOption = collect(__('idea.steps.step2.options'))->firstWhere(
                                                'code',
                                                $country->country,
                                            );
                                            $countryName = $countryOption['name'] ?? $country->country;
                                        @endphp
                                        {{ $countryName }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @empty
                                        {{ __('idea.common.unspecified') }}
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- Section 2: Details --}}
                    <div class="row g-3 mb-4">

                        {{-- Contact Way --}}
                        <div class="col-lg-4">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-telephone text-primary fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('idea.steps.step10.contact_way') }}</h6>
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

                        {{-- Resources --}}
                        <div class="col-lg-8">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-list-check text-primary fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('idea.steps.step10.resources') }}</h6>
                                </div>
                                <div class="row g-2">
                                    @forelse(array_slice($idea->resources->translated_requirements ?? [], 0, 6) as $index => $resource)
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start gap-2">
                                                <span class="badge bg-primary rounded-circle"
                                                    style="width: 24px; height: 24px; padding: 4px;">{{ $index + 1 }}</span>
                                                <small class="text-dark">{{ $resource }}</small>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center text-muted">{{ __('idea.common.unspecified') }}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- Section 3: Financial --}}
                    <div class="row g-3 mb-4">

                        {{-- Contribution --}}
                        <div class="col-lg-4">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-person-check text-success fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('idea.steps.step10.contribution') }}</h6>
                                </div>
                                @forelse ($idea->contributions as $contribution)
                                    @php
                                        $lines = $contribution->formatted_contribution ?? ['-'];
                                    @endphp
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($lines as $line)
                                            <li class="small text-dark mb-1">• {{ $line }}</li>
                                        @endforeach
                                    </ul>
                                @empty
                                    <span class="text-muted small">{{ __('idea.common.unspecified') }}</span>
                                @endforelse
                            </div>
                        </div>

                        {{-- Returns --}}
                        <div class="col-lg-4">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-trophy text-warning fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('idea.steps.step10.returns') }}</h6>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    @forelse($idea->returns->formatted_returns ?? [] as $return)
                                        <li class="small text-dark mb-1">• {{ $return }}</li>
                                    @empty
                                        <li class="text-muted small">{{ __('idea.common.unspecified') }}</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        {{-- Capital Distribution --}}
                        <div class="col-lg-4">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-pie-chart text-info fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('idea.steps.step10.capital_distribution') }}</h6>
                                </div>
                                <div class="small text-dark">
                                    @if (optional($idea->expenses)->capital_distribution)
                                        @foreach (optional($idea->expenses)->capital_distribution as $expense)
                                            <span>{{ $expense }}</span>
                                            @if (!$loop->last)
                                                <span class="mx-1">+</span>
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="text-muted">{{ __('idea.common.unspecified') }}</span>
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
                                    <h6 class="mb-0 fw-bold">{{ __('idea.steps.step10.summary') }}</h6>
                                </div>
                                <p class="mb-0 text-dark">
                                    {{ $idea->summary ?? __('idea.common.unspecified') }}
                                </p>
                            </div>
                        </div>

                        {{-- Attachments --}}
                        <div class="col-lg-3">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-paperclip text-secondary fs-5"></i>
                                    <h6 class="mb-0 fw-bold">{{ __('idea.steps.step10.attachments') }}</h6>
                                </div>
                                @forelse($idea->attachments as $file)
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
                                        {{ __('idea.common.unspecified') }}
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            {{-- Contact Button --}}
            <div class="mt-4">
                <a href="#" class="btn btn-primary btn-lg rounded-3 w-100 py-3 shadow-sm">
                    <i class="bi bi-chat-dots me-2"></i>
                    <span class="fw-semibold">
                        {{ __('idea.summary.contact_owner') }}
                    </span>
                </a>
            </div>

        </div>
    </div>
</div>
