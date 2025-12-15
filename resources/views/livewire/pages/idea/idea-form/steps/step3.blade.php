<div x-data="{
    selectedType: @entangle('cost_type'),
    selectedRange: @entangle('range_id'),
    expandedType: null,
    isMobile: window.innerWidth < 992,
}" x-init="$watch('selectedType', () => {
    selectedRange = null;
    $wire.set('range_id', null);
});
window.addEventListener('resize', () => isMobile = window.innerWidth < 992);">


    <x-pages.idea-wizard.idea-header
        title='{{ __("pages/mainpage.submit_idea") }}'
        subtitle='{{ __("idea.steps.step3.subtitle") }}'
    />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- One-time Costs -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <!-- main button -->
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="one-time" value="one-time"
                                        x-model="selectedType" name="cost_type" autocomplete="off">
                                    <label class="choice-component cost-variant w-100" for="one-time"
                                        @click="if (isMobile) expandedType = expandedType === 'one-time' ? null : 'one-time'">
                                        <span class="choice-text">{{ __('idea.steps.step3.types.one-time') }}</span>
                                        <span class="d-lg-none mobile-arrow"
                                            x-text="expandedType === 'one-time' ? '▲' : '▼'"></span>
                                        <i class="bi bi-check-circle-fill check-indicator d-none d-lg-block"></i>
                                    </label>
                                </div>

                                <!-- one-time ranges -->
                                <div class="col-12" x-show="!isMobile || expandedType === 'one-time'" x-transition>
                                    <div class="row g-2 g-md-3">
                                        @foreach ($oneTimeRanges as $range)
                                            <div class="col-12 col-md-6">
                                                <input type="radio" class="btn-check"
                                                    id="one-time-{{ $range->id }}" value="{{ $range->id }}"
                                                    x-model="selectedRange" :disabled="selectedType !== 'one-time'"
                                                    autocomplete="off">
                                                <label class="choice-component range-variant w-100"
                                                    :class="{ 'disabled': selectedType !== 'one-time' }"
                                                    for="one-time-{{ $range->id }}">
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

                    <!-- Annual Costs -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <!-- main button -->
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="annual" value="annual"
                                        x-model="selectedType" name="cost_type" autocomplete="off">
                                    <label class="choice-component cost-variant w-100" for="annual"
                                        @click="if (isMobile) expandedType = expandedType === 'annual' ? null : 'annual'">
                                        <span class="choice-text">{{ __('idea.steps.step3.types.annual') }}</span>
                                        <span class="d-lg-none mobile-arrow"
                                            x-text="expandedType === 'annual' ? '▲' : '▼'"></span>
                                        <i class="bi bi-check-circle-fill check-indicator d-none d-lg-block"></i>
                                    </label>
                                </div>

                                <!-- annual ranges -->
                                <div class="col-12" x-show="!isMobile || expandedType === 'annual'" x-transition>
                                    <div class="row g-2 g-md-3">
                                        @foreach ($annualRanges as $range)
                                            <div class="col-12 col-md-6">
                                                <input type="radio" class="btn-check" id="annual-{{ $range->id }}"
                                                    value="{{ $range->id }}" x-model="selectedRange"
                                                    :disabled="selectedType !== 'annual'" autocomplete="off">
                                                <label class="choice-component range-variant w-100"
                                                    :class="{ 'disabled': selectedType !== 'annual' }"
                                                    for="annual-{{ $range->id }}">
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
    </div>

    @error('cost_type')
        <div class="error-message-wrapper">
            <div class="alert alert-danger rounded-3 shadow-sm mt-3 mx-auto" style="max-width: 500px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ $message }}
            </div>
        </div>
    @enderror

    @error('range_id')
        <div class="error-message-wrapper">
            <div class="alert alert-danger rounded-3 shadow-sm mt-3 mx-auto" style="max-width: 500px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ $message }}
            </div>
        </div>
    @enderror

</div>
