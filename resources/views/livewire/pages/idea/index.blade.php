<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">

            {{-- page Title --}}
            <div
                class="bg-light text-dark rounded-8 shadow-sm mb-3 d-flex justify-content-center gap-0 gap-md-3 gap-lg-4 flex-wrap">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('idea.index.page_title') }}
                </h5>
            </div>

            <livewire:pages.idea.components.idea-filters />

            <div class="d-flex flex-column gap-3 mt-4">
                <div class="row mx-0 px-0 g-2">
                    @forelse($ideas as $idea)
                        <div class="col-12" wire:key="idea-{{ $idea->id }}">
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

                                                    <!-- عنوان الفكرة / المجال -->
                                                    <div class="col-lg-3 col-md-6 col-12 p-4">
                                                        <h6 class="fw-bold mb-0 d-flex flex-column gap-3">
                                                            <span>{{ __('idea.index.idea_field_title') }}</span>

                                                            <span
                                                                class="text-primary">{{ __("idea.steps.step1.options.{$idea->idea_field}") }}</span>
                                                        </h6>
                                                    </div>

                                                    <!-- رأس المال + الدول -->
                                                    <div
                                                        class="col-lg-4 col-md-6 col-12 p-4 border-start border-end border_custom_idea">

                                                        <h6 class="fw-bold mb-2">
                                                            <span class="d-block mb-2">
                                                                {{ __('idea.index.capital_offered') }} = </span>
                                                            @php
                                                                $cost = $idea->costs->first();
                                                                $range = $cost?->range;
                                                                $label = null;
                                                                if ($range) {
                                                                    $label =
                                                                        app()->getLocale() === 'ar'
                                                                            ? $range->label_ar
                                                                            : $range->label_en;
                                                                    $label = str_replace('<br>', '', $label);
                                                                }
                                                            @endphp

                                                            @if ($label)
                                                                <span
                                                                    class="text-success">{!! $label !!}</span>
                                                            @else
                                                                {{ __('idea.summary.not_defined') }}
                                                            @endif
                                                        </h6>


                                                        <h6 class="fw-bold mb-0 mt-3">
                                                            {{ __('idea.index.desired_country') }} :
                                                            <span class="text-muted small" style="line-height: 25px">

                                                                @forelse($idea->countries as $country)
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

                                                    <!-- الموارد -->
                                                    <div class="col-lg-4 col-md-6 col-12 p-4">
                                                        <h6 class="fw-bold mb-0 line-height-1">
                                                            {{ __('idea.index.contributions_title') }} :
                                                        </h6>

                                                        <p class="text-muted small mt-2 mb-0">
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

                                                            @if (count($contributions) > 0)
                                                                {{ implode('، ', $contributions) }}
                                                            @else
                                                                {{ __('idea.index.contributions_empty') }}
                                                            @endif
                                                        </p>
                                                    </div>



                                                    <!-- زر تفاصيل -->
                                                    <div class="col-md-1 col-12">
                                                        <a class="btn underline d-flex gap-2 align-items-center text-primary"
                                                            wire:navigate href="{{ route('idea.info', $idea->id) }}">
                                                            <span> {{ __('idea.index.btn_more') }}</span>

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
                                {{ __('idea.index.no_ideas') }}
                            </div>
                        </div>
                    @endforelse

                </div>

                <!-- زر تحميل المزيد -->
                @if ($hasMore)
                    <div class="d-flex align-items-center gap-2 justify-content-center my-4">
                        <button type="button" wire:click="loadMore" wire:loading.attr="disabled"
                            class="btn btn-primary py-3 px-4">
                            <span class="small fw-bold" wire:loading.remove>
                                {{ __('idea.index.btn_show_more') }}
                            </span>

                            <span class="small fw-bold" wire:loading>
                                {{ __('idea.index.loading') }}
                            </span>
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
