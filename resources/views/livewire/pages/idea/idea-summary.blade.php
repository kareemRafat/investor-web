<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <!-- عنوان الصفحة -->
            <div
                class="bg-light text-dark rounded-8 shadow-sm mb-3 d-flex justify-content-center gap-0 gap-md-3 gap-lg-4 flex-wrap">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('idea.summary.page_title') }}
                </h5>
            </div>

            <div class="d-flex flex-column gap-3">

                <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
                    <div class="mb-2">
                        <strong>{{ __('idea.summary.welcome_title') }} {{ auth()->user()->name ?? 'المستخدم' }}</strong>
                    </div>
                    <h6 class="fw-bold mb-0">
                        {{ __('idea.summary.welcome_message') }}
                    </h6>
                </div>

                <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
                    <h6 class="fw-bold mb-0">
                        {{ __('idea.summary.matching_title') }}
                    </h6>
                </div>

                <div class="row mx-0 px-0 g-2">

                    @forelse($investors as $investor)
                        <div class="col-12" wire:key="investor-{{ $investor->id }}">
                            <div class="card border-0 shadow-sm rounded-8 position-relative">

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

                                                    <div class="col-lg-3 col-md-6 col-12 p-4">
                                                        <h6 class="fw-bold mb-0 d-flex flex-column gap-3">
                                                            <span>{{ __('idea.summary.investor_field_title') }}</span>
                                                            <span
                                                                class="text-primary">{{ __("idea.steps.step1.options.{$investor->investor_field}") }}</span>

                                                        </h6>
                                                    </div>

                                                    <div
                                                        class="col-lg-4 col-md-6 col-12 p-4 border-start border-end border_custom_idea">
                                                        <h6 class="fw-bold mb-2 d-flex flex-column gap-1 ">
                                                            <span class="p-2 text-white bg-primary rounded-1">{{ __('idea.summary.capital_offered') }} =</span>
                                                            <span class="text-success line-height-1">
                                                                @php
                                                                    $contributionLabel =
                                                                        $investor->contributions
                                                                            ->money_contribution_label ?? null;
                                                                @endphp

                                                                {!! $contributionLabel ?? 'لايوجد' !!}
                                                            </span>
                                                        </h6>
                                                        <h6 class="fw-bold mb-0 mt-3">
                                                            {{ __('idea.summary.desired_country') }}
                                                            <span class="text-muted small">
                                                                @forelse($investor->countries as $country)
                                                                    @php
                                                                        $options = __('idea.steps.step2.options');
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
                                                                        'personal' => __(
                                                                            'investor.steps.step4.personal',
                                                                        ),
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

                                                    <div class="col-md-1 col-12 ">

                                                        <a class="btn underline d-flex gap-2 align-items-center text-primary"
                                                            wire:navigate
                                                            href="{{ route('investor.info', $investor->id) }}">
                                                            <span>{{ __('idea.summary.btn_more') }}</span>
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
                                {{ __('idea.summary.no_offers') }}
                            </div>
                        </div>
                    @endforelse

                </div>

                @if ($investors->count() >= $amount)
                    <div class="d-flex align-items-center gap-2 justify-content-center my-4">
                        <button type="button" wire:click="loadMore" wire:loading.attr="disabled"
                            class="btn btn-primary py-3 px-4">
                            <span class="small fw-bold" wire:loading.remove>
                                {{ __('idea.summary.btn_show_more') }}
                            </span>

                            <span class="small fw-bold" wire:loading>
                                {{ __('idea.summary.loading') }}
                            </span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
