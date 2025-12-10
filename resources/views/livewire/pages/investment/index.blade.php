<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">

            {{-- page Title --}}
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('investor.index.page_title') }}
                </h5>
            </div>

            <livewire:pages.investment.components.investment-filters />

            <div class="d-flex flex-column gap-3 mt-4">
                <div class="row mx-0 px-0 g-3">
                    @forelse($investors as $investor)
                        <div class="col-12" wire:key="investor-{{ $investor->id }}">
                            <div class="card shadow-sm border-0 rounded-4">

                                <!-- Card Header -->
                                <div class="card-header bg-white border-0 pt-4 pb-3">
                                    <div class="row align-items-center g-3">
                                        <div class="col-auto">
                                            <div class="bg-primary bg-gradient text-white rounded-3 d-flex align-items-center justify-content-center fw-bold"
                                                style="width: 50px; height: 50px; font-size: 1.25rem;">
                                                {{ $loop->iteration }}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <small class="text-muted">{{ __('investor.index.investor_field_title') }}</small>
                                            <h5 class="mb-1 fw-bold" style="color:#0d6efd">
                                                {{ __("investor.steps.step1.options.{$investor->investor_field}") }}
                                            </h5>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ route('investor.info', $investor->id) }}" wire:navigate
                                                class="btn btn-sm btn-primary rounded-pill px-4">
                                                <span class="me-2">{{ __('investor.index.btn_more') }}</span>
                                                <i class="bi {{ app()->getLocale() === 'ar' ? 'bi-arrow-left' : 'bi-arrow-right' }}"></i>
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
                                                    <span class="text-muted small fw-semibold">{{ __('investor.index.capital_offered') }}</span>
                                                </div>
                                                @php
                                                    $contribution = $investor->contributions;
                                                    $range = $contribution?->contributionRange;
                                                @endphp
                                                <div class="fw-semibold text-dark">
                                                    @if ($range)
                                                        {!! $range->{app()->getLocale() == 'ar' ? 'label_ar' : 'label_en'} !!}
                                                    @elseif ($contribution?->money_contributions)
                                                        {{ $contribution->money_contribution_label }}
                                                    @else
                                                        <span class="text-muted">{{ __('investor.summary.not_defined') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Countries -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="border rounded-3 p-3 h-100 bg-light bg-opacity-50">
                                                <div class="d-flex align-items-center gap-2 mb-2">
                                                    <i class="bi bi-geo-alt text-info fs-5"></i>
                                                    <span class="text-muted small fw-semibold">{{ __('investor.index.desired_country') }}</span>
                                                </div>
                                                <div class="fw-semibold text-dark">
                                                    @forelse($investor->countries as $country)
                                                        @php
                                                            $options = __('investor.steps.step2.options');
                                                            $countryOption = collect($options)->firstWhere('code', $country->country);
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
                                                    <span class="text-muted small fw-semibold">{{ __('investor.index.contributions_offered') }}</span>
                                                </div>
                                                @php
                                                    $contributions = [];
                                                    if ($investor->contributions) {
                                                        $c = $investor->contributions;
                                                        $label = match ($c->contribute_type) {
                                                            'sell' => __('investor.steps.step4.sell'),
                                                            'idea' => __('investor.steps.step4.idea'),
                                                            'capital' => __('investor.steps.step4.capital'),
                                                            'personal' => __('investor.steps.step4.personal'),
                                                            'both' => __('investor.steps.step4.both'),
                                                            default => $c->contribute_type,
                                                        };
                                                        $contributions[] = $label;
                                                    }
                                                @endphp
                                                <div class="fw-semibold text-dark small">
                                                    @if (count($contributions) > 0)
                                                        {{ implode('، ', $contributions) }}
                                                    @else
                                                        <span class="text-muted">{{ __('investor.index.contributions_empty') }}</span>
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
                                <p class="text-muted mb-0">{{ __('investor.index.no_investors') }}</p>
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
                                {{ __('investor.index.btn_show_more') }}
                            </span>
                            <span wire:loading wire:target="loadMore">
                                <span class="spinner-border spinner-border-sm me-2"></span>
                                {{ __('investor.index.loading') }}
                            </span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
