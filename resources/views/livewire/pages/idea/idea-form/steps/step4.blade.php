<div x-data="{
    selectedType: @entangle('profit_type'),
    selectedRange: @entangle('profit_range_id'),
    expandedType: null,
    isMobile: window.innerWidth < 992,
}" x-init="$watch('selectedType', () => {
    selectedRange = null;
    $wire.set('profit_range_id', null);
});
window.addEventListener('resize', () => isMobile = window.innerWidth < 992);">

    <x-pages.idea-wizard.idea-header title='{{ __('pages/mainpage.submit_idea') }}'
        subtitle='{{ __('idea.steps.step4.subtitle') }}' />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- One-time Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="row g-3">

                            <!-- main type -->
                            <div class="col-12">
                                <input type="radio" class="btn-check" id="profit-one-time" value="one-time"
                                    x-model="selectedType" name="profit_type" autocomplete="off">

                                <label class="choice-component cost-variant w-100" for="profit-one-time"
                                    @click="if (isMobile) expandedType = expandedType === 'one-time' ? null : 'one-time'">
                                    <span class="choice-text">
                                        {{ __('idea.steps.step4.types.one_time') }}
                                    </span>

                                    <span class="d-lg-none mobile-arrow"
                                        x-text="expandedType === 'one-time' ? '▲' : '▼'"></span>

                                    <i class="bi bi-check-circle-fill check-indicator d-none d-lg-block"></i>
                                </label>
                            </div>

                            <!-- ranges -->
                            <div class="col-12" x-show="!isMobile || expandedType === 'one-time'" x-transition>
                                <div class="row g-2 g-md-3">
                                    @foreach ($oneTimeRanges as $range)
                                        <div class="col-12 col-md-6">
                                            <input type="radio" class="btn-check"
                                                id="profit-one-time-{{ $range->id }}" value="{{ $range->id }}"
                                                x-model="selectedRange" :disabled="selectedType !== 'one-time'"
                                                autocomplete="off">

                                            <label class="choice-component range-variant w-100"
                                                :class="{ 'disabled': selectedType !== 'one-time' }"
                                                for="profit-one-time-{{ $range->id }}">
                                                <span class="choice-text">
                                                    {!! app()->getLocale() === 'ar' ? $range->label_ar : $range->label_en !!}
                                                </span>

                                                <i class="bi bi-check-circle-fill check-indicator"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Annual Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="row g-3">

                            <!-- main type -->
                            <div class="col-12">
                                <input type="radio" class="btn-check" id="profit-annual" value="annual"
                                    x-model="selectedType" name="profit_type" autocomplete="off">

                                <label class="choice-component cost-variant w-100" for="profit-annual"
                                    @click="if (isMobile) expandedType = expandedType === 'annual' ? null : 'annual'">
                                    <span class="choice-text">
                                        {{ __('idea.steps.step4.types.annual') }}
                                    </span>

                                    <span class="d-lg-none mobile-arrow"
                                        x-text="expandedType === 'annual' ? '▲' : '▼'"></span>

                                    <i class="bi bi-check-circle-fill check-indicator d-none d-lg-block"></i>
                                </label>
                            </div>

                            <!-- ranges -->
                            <div class="col-12" x-show="!isMobile || expandedType === 'annual'" x-transition>
                                <div class="row g-2 g-md-3">
                                    @foreach ($annualRanges as $range)
                                        <div class="col-12 col-md-6">
                                            <input type="radio" class="btn-check"
                                                id="profit-annual-{{ $range->id }}" value="{{ $range->id }}"
                                                x-model="selectedRange" :disabled="selectedType !== 'annual'"
                                                autocomplete="off">

                                            <label class="choice-component range-variant w-100"
                                                :class="{ 'disabled': selectedType !== 'annual' }"
                                                for="profit-annual-{{ $range->id }}">
                                                <span class="choice-text">
                                                    {!! app()->getLocale() === 'ar' ? $range->label_ar : $range->label_en !!}
                                                </span>

                                                <i class="bi bi-check-circle-fill check-indicator"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- errors --}}
    <div class="d-flex flex-column align-items-center">
        @if ($errors->has('profit_type') || $errors->has('profit_range_id'))
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $errors->first('profit_type') ?: $errors->first('profit_range_id') }}
            </span>
        @endif
    </div>
</div>
