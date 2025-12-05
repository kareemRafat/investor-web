<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <!-- عنوان الصفحة -->
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('investor.index.page_title') }}
                </h5>
            </div>

            <livewire:pages.investment.components.investment-filters />

            <div class="row mx-0 px-0 g-2">
                @forelse($investors as $investor)
                    <div class="col-12" wire:key="investor-{{ $investor->id }}">
                        <div class="card border-0 shadow-sm rounded-8 position-relative">
                            <!-- index -->
                            <div class="bg-custom position-absolute
                            {{ app()->getLocale() === 'ar' ? 'top-0 end-0' : '' }}
                            bg_idea_num rounded-circle m-1"
                                style="background-color: #0d6efd; width: 30px; height: 30px;">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    <span class="text-white fw-bold fs-6">{{ $loop->iteration }}</span>
                                </div>
                            </div>

                            <div class="card-body py-0">
                                <div class="d-flex flex-column">
                                    <div class="card bg-transparent border-0 py-0">
                                        <div class="card-body py-0 my-0">
                                            <div class="row mx-0 px-0 my-0 py-0 align-items-center">
                                                <!-- المجال الاستثماري -->
                                                <div class="col-lg-3 col-md-6 col-12 p-4">
                                                    <h6 class="fw-bold mb-0 d-flex flex-column gap-3">
                                                        <span>{{ __('investor.index.investor_field_title') }}</span>
                                                        <span
                                                            class="text-primary">{{ __("investor.steps.step1.options.{$investor->investor_field}") }}</span>
                                                    </h6>
                                                </div>

                                                <!-- رأس المال + الدول -->
                                                <div
                                                    class="col-lg-4 col-md-6 col-12 p-4 border-start border-end border_custom_idea">
                                                    @php
                                                        $contribution = $investor->contributions;
                                                        $range = $contribution?->contributionRange;
                                                    @endphp

                                                    <h6 class="fw-bold mb-2">
                                                        <span
                                                            class="d-block mb-2">{{ __('investor.index.capital_offered') }}
                                                            =</span>

                                                        @if ($range)
                                                            {{--  cost_profit_ranges --}}
                                                            <span class="text-success">
                                                                {!! $range->{app()->getLocale() == 'ar' ? 'label_ar' : 'label_en'} !!}
                                                            </span>
                                                        @elseif ($contribution?->money_contributions)
                                                            <span class="text-success">
                                                                {{ $contribution->money_contribution_label }}
                                                            </span>
                                                        @else
                                                            <span class="text-muted">غير محدد</span>
                                                        @endif
                                                    </h6>

                                                    <h6 class="fw-bold mb-0 mt-3">
                                                        <span class="me-1">{{ __('investor.index.desired_country') }}</span>
                                                        <span class="text-muted small" style="line-height: 25px">
                                                            @forelse($investor->countries as $country)
                                                                @php
                                                                    $options = __('investor.steps.step2.options');
                                                                    $countryOption = collect($options)->firstWhere(
                                                                        'code',
                                                                        $country->country,
                                                                    );
                                                                    $countryName =
                                                                        $countryOption['name'] ?? $country->country;
                                                                @endphp

                                                                {{ $countryName }}@if (!$loop->last)
                                                                    -
                                                                @endif
                                                            @empty
                                                                -
                                                            @endforelse
                                                        </span>
                                                    </h6>
                                                </div>

                                                <!-- المساهمات -->
                                                <div class="col-lg-4 col-md-6 col-12 p-4">
                                                    <h6 class="fw-bold mb-0 line-height-1">
                                                        {{ __('investor.index.contributions_offered') }} :
                                                    </h6>

                                                    <p class="text-muted small mt-2 mb-0">
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

                                                        @if (count($contributions) > 0)
                                                            {{ implode('، ', $contributions) }}
                                                        @else
                                                            {{ __('investor.index.contributions_empty') }}
                                                        @endif
                                                    </p>
                                                </div>

                                                <!-- زر تفاصيل -->
                                                <div class="col-md-1 col-12">
                                                    <a class="btn underline d-flex gap-2 align-items-center text-primary"
                                                        wire:navigate
                                                        href="{{ route('investor.info', $investor->id) }}">
                                                        <span>{{ __('investor.index.btn_more') }}</span>
                                                        @if (app()->getLocale() === 'ar')
                                                            <i class="bi bi-arrow-left fw-bold mt-1"></i>
                                                        @else
                                                            <i class="bi bi-arrow-right fw-bold mt-1"></i>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            {{ __('investor.index.no_investors') }}
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- زر تحميل المزيد -->
            @if ($hasMore)
                <div class="d-flex align-items-center gap-2 justify-content-center mt-4">
                    <button type="button" wire:click="loadMore" wire:loading.attr="disabled" wire:target="loadMore"
                        class="btn btn-primary py-2 px-4">
                        <span class="small fw-bold" wire:loading.remove wire:target="loadMore">
                            {{ __('investor.index.btn_show_more') }}
                        </span>
                        <span class="small fw-bold" wire:loading wire:target="loadMore">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            {{ __('investor.index.loading') }}
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
