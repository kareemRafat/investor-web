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

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
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
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3
                                                rounded-8 shadow-sm fw-bold small
                                                d-flex justify-content-center align-items-center text-center"
                                        for="one-time"
                                        @click="if (isMobile) expandedType = expandedType === 'one-time' ? null : 'one-time'">
                                        {{ __('idea.steps.step3.types.one-time') }}
                                        <span class="d-lg-none ms-2"
                                            x-text="expandedType === 'one-time' ? '▲' : '▼'"></span>
                                    </label>
                                </div>

                                <!-- one-time ranges -->
                                <div class="col-12" x-show="!isMobile || expandedType === 'one-time'" x-transition>
                                    <div class="row g-3">
                                        @foreach ($oneTimeRanges as $range)
                                            <div class="col-12 col-md-6">
                                                <input type="radio" class="btn-check"
                                                    id="one-time-{{ $range->id }}" value="{{ $range->id }}"
                                                    x-model="selectedRange" :disabled="selectedType !== 'one-time'"
                                                    autocomplete="off">
                                                <label
                                                    class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                                    for="one-time-{{ $range->id }}">
                                                    {!! app()->getLocale() === 'ar' ? $range->label_ar : $range->label_en !!}
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
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3
                                                rounded-8 shadow-sm fw-bold small
                                                d-flex justify-content-center align-items-center text-center"
                                        for="annual"
                                        @click="if (isMobile) expandedType = expandedType === 'annual' ? null : 'annual'">
                                        {{ __('idea.steps.step3.types.annual') }}
                                        <span class="d-lg-none ms-2"
                                            x-text="expandedType === 'annual' ? '▲' : '▼'"></span>
                                    </label>

                                </div>

                                <!-- annual ranges -->
                                <div class="col-12" x-show="!isMobile || expandedType === 'annual'" x-transition>
                                    <div class="row g-3">
                                        @foreach ($annualRanges as $range)
                                            <div class="col-12 col-md-6">
                                                <input type="radio" class="btn-check" id="annual-{{ $range->id }}"
                                                    value="{{ $range->id }}" x-model="selectedRange"
                                                    :disabled="selectedType !== 'annual'" autocomplete="off">
                                                <label
                                                    class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                                    for="annual-{{ $range->id }}">
                                                    {!! app()->getLocale() === 'ar' ? $range->label_ar : $range->label_en !!}
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

    <div class="d-flex justify-content-center gap-3">
        @error('cost_type')
            <span class="text-white bg-danger rounded p-2 text-center fw-bold mt-3">{{ $message }}</span>
        @enderror
        @error('range_id')
            <span class="text-white bg-danger rounded p-2 text-center fw-bold mt-3">{{ $message }}</span>
        @enderror
    </div>

</div>
