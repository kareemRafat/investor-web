<div class="card info-card shadow-sm">
    <div
        class="card-header bg-white border-0 py-3 d-flex flex-column flex-sm-row justify-content-between align-items-start">
        <div class="d-flex flex-column">
            <h5 class="mb-0 section-title fw-bold text-dark">{{ __('profile.ideas.title') }}</h5>
            <div class="d-flex flex-wrap justify-content-start align-items-center gap-3 mb-4 mt-2">
                {{-- زرار الكل --}}
                <div class="d-flex align-items-center __filter-item {{ $statusFilter === null ? '__filter-active' : '' }}"
                    wire:click="setStatusFilter(null)">
                    <div class="__filter-indicator mx-2" style="background-color: #6c757d;"></div>
                    <small class="text-muted">{{ __('profile.ideas.status.all') }}</small>
                </div>

                {{-- Approved --}}
                <div class="d-flex align-items-center __filter-item {{ $statusFilter === 'approved' ? '__filter-active' : '' }}"
                    wire:click="setStatusFilter('approved')">
                    <div class="bg-success __filter-indicator mx-2"></div>
                    <small class="text-muted">{{ __('profile.ideas.status.approved') }}</small>
                </div>

                {{-- Pending --}}
                <div class="d-flex align-items-center __filter-item {{ $statusFilter === 'pending' ? '__filter-active' : '' }}"
                    wire:click="setStatusFilter('pending')">
                    <div class="bg-warning __filter-indicator mx-2"></div>
                    <small class="text-muted">{{ __('profile.ideas.status.pending') }}</small>
                </div>

                {{-- Rejected --}}
                <div class="d-flex align-items-center __filter-item {{ $statusFilter === 'rejected' ? '__filter-active' : '' }}"
                    wire:click="setStatusFilter('rejected')">
                    <div class="bg-danger __filter-indicator mx-2"></div>
                    <small class="text-muted">{{ __('profile.ideas.status.rejected') }}</small>
                </div>
            </div>
        </div>
        <a wire:navigate href="{{ route('idea.index') }}"
            class="btn btn-sm btn-outline-primary fw-bold align-self-end align-self-sm-start">
            <i class="bi bi-eye me-1"></i>
            {{ __('profile.ideas.view_ideas') }}
        </a>
    </div>
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            <!-- Idea 1 -->
            <div class="row mx-0 px-0 g-3">
                @forelse($ideas as $idea)
                    <div class="col-12" wire:key="idea-{{ $idea->id }}">
                        <div class="card shadow-sm border-0 rounded-4">

                            <!-- Card Header -->
                            <div class="card-header bg-white border-0 pt-4 pb-3">
                                <div class="row align-items-center g-3">
                                    <div class="col-auto">
                                        @php
                                            $bg = match (true) {
                                                $idea->status->isApproved() => 'bg-success',
                                                $idea->status->isPending() => 'bg-warning',
                                                default => 'bg-danger',
                                            };
                                        @endphp

                                        <div class="{{ $bg }} bg-gradient text-white rounded-3 d-flex align-items-center justify-content-center fw-bold"
                                            style="width: 50px; height: 50px; font-size: 1.25rem;">
                                            {{ $loop->iteration }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <small class="text-muted">{{ __('idea.index.idea_field_title') }}</small>
                                        <h5 class="mb-1 fw-bold" style="color:#0d6efd">
                                            {{ __("idea.steps.step1.options.{$idea->idea_field}") }}</h5>
                                    </div>
                                    <div class="col-12 col-sm-auto d-flex justify-content-end">
                                        <a href="{{ route('idea.info', $idea->id) }}" wire:navigate
                                            class="btn btn-sm btn-primary rounded-pill px-4">
                                            <span class="me-2">{{ __('idea.index.btn_more') }}</span>
                                            <i
                                                class="bi {{ app()->getLocale() === 'ar' ? 'bi-arrow-left' : 'bi-arrow-right' }}"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body px-4 pb-4">
                                <div class="row g-3">

                                    <!-- Capital -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="border rounded-3 p-3 h-100 bg-light bg-opacity-50">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <i class="bi bi-wallet2 text-success fs-5"></i>
                                                <span
                                                    class="text-muted small fw-semibold">{{ __('idea.index.capital_offered') }}</span>
                                            </div>
                                            @php
                                                $cost = $idea->costs->first();
                                                $range = $cost?->range;
                                                $label = null;
                                                if ($range) {
                                                    $label =
                                                        app()->getLocale() === 'ar'
                                                            ? $range->label_ar
                                                            : $range->label_en;
                                                }
                                            @endphp
                                            <div class="fw-semibold text-dark">
                                                @if ($label)
                                                    {!! $label !!}
                                                @else
                                                    <span
                                                        class="text-muted">{{ __('idea.summary.not_defined') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Countries -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="border rounded-3 p-3 h-100 bg-light bg-opacity-50">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <i class="bi bi-geo-alt text-info fs-5"></i>
                                                <span
                                                    class="text-muted small fw-semibold">{{ __('idea.index.desired_country') }}</span>
                                            </div>
                                            <div class="fw-semibold text-dark">
                                                @forelse($idea->countries as $country)
                                                    @php
                                                        $options = __('idea.steps.step2.options');
                                                        $countryOption = collect($options)->firstWhere(
                                                            'code',
                                                            $country->country,
                                                        );
                                                        $countryName = $countryOption['name'] ?? $country->country;
                                                    @endphp
                                                    <span class="country-tag">{{ $countryName }}</span>
                                                @empty
                                                    <span class="text-muted">-</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Contributions -->
                                    <div class="col-lg-4 col-md-12">
                                        <div class="border rounded-3 p-3 h-100 bg-light bg-opacity-50">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <i class="bi bi-person-badge text-warning fs-5"></i>
                                                <span
                                                    class="text-muted small fw-semibold">{{ __('idea.index.contributions_title') }}</span>
                                            </div>
                                            @php
                                                $contributions = [];
                                                foreach ($idea->contributions as $c) {
                                                    $label = match ($c->contribute_type) {
                                                        'sell' => __('idea.steps.step7.sell'),
                                                        'idea' => __('idea.steps.step7.idea'),
                                                        'capital' => __('idea.steps.step7.capital'),
                                                        'personal' => __('idea.steps.step7.personal'),
                                                        'both' => __('idea.steps.step7.both'),
                                                        default => $c->contribute_type,
                                                    };
                                                    $contributions[] = $label;
                                                }
                                            @endphp
                                            <div class="fw-semibold text-dark small">
                                                @if (count($contributions) > 0)
                                                    {{ implode('، ', $contributions) }}
                                                @else
                                                    <span
                                                        class="text-muted">{{ __('idea.index.contributions_empty') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light border text-center py-5">
                            <i class="bi bi-inbox text-secondary d-block mb-3" style="font-size: 3rem;"></i>
                            <p class="text-muted mb-0">{{ __('idea.index.no_ideas') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- Load More Button -->
            @if ($hasMore)
                <div class="d-flex justify-content-center my-4">
                    <button type="button" wire:click="loadMore" wire:loading.attr="disabled"
                        class="btn btn-outline-primary rounded-pill px-5 py-2">
                        <span wire:loading.remove wire:target="loadMore">
                            <i class="bi bi-arrow-down-circle me-2"></i>
                            {{ __('idea.index.btn_show_more') }}
                        </span>
                        <span wire:loading wire:target="loadMore">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            {{ __('idea.index.loading') }}
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
