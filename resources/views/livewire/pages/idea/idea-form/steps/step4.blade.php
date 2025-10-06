<div x-data="{
    selectedType: @entangle('profit_type'),
    selectedRange: @entangle('profit_range_id'),
    expandedType: null,
    isMobile: window.innerWidth < 992,
}"
x-init="
    $watch('selectedType', () => {
        selectedRange = null;
        $wire.set('profit_range_id', null);
    });
    window.addEventListener('resize', () => isMobile = window.innerWidth < 992);
">

    <x-pages.idea-wizard.idea-header
        title='{{ __("pages/mainpage.submit_idea") }}'
        subtitle='{{ __("idea.steps.step4.subtitle") }}'
    />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- One-time Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">

                                <!-- main button -->
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="one-time" value="one-time"
                                        x-model="selectedType" name="profit_type" autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small
                                               d-flex justify-content-center align-items-center text-center"
                                        for="one-time"
                                        @click="if (isMobile) expandedType = expandedType === 'one-time' ? null : 'one-time'">
                                        {{ __('idea.steps.step4.types.one_time') }}
                                        <span class="d-lg-none ms-2" x-text="expandedType === 'one-time' ? '▲' : '▼'"></span>
                                    </label>
                                </div>

                                <!-- one-time ranges -->
                                <div class="col-12"
                                     x-show="!isMobile || expandedType === 'one-time'"
                                     x-transition>
                                    <div class="row g-3 mt-1">
                                        @foreach ($oneTimeRanges as $range)
                                            <div class="col-12 col-md-6">
                                                <input type="radio" class="btn-check" id="one-time-{{ $range->id }}"
                                                    value="{{ $range->id }}" x-model="selectedRange"
                                                    :disabled="selectedType !== 'one-time'" autocomplete="off">
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

                    <!-- Annual Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">

                                <!-- main button -->
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="annual" value="annual"
                                        x-model="selectedType" name="profit_type" autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small
                                               d-flex justify-content-center align-items-center text-center"
                                        for="annual"
                                        @click="if (isMobile) expandedType = expandedType === 'annual' ? null : 'annual'">
                                        {{ __('idea.steps.step4.types.annual') }}
                                        <span class="d-lg-none ms-2" x-text="expandedType === 'annual' ? '▲' : '▼'"></span>
                                    </label>
                                </div>

                                <!-- annual ranges -->
                                <div class="col-12"
                                     x-show="!isMobile || expandedType === 'annual'"
                                     x-transition>
                                    <div class="row g-3 mt-1">
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

    {{-- errors --}}
    <div class="d-flex flex-column align-items-center">
        @if ($errors->has('profit_type') || $errors->has('profit_range_id'))
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $errors->first('profit_type') ?: $errors->first('profit_range_id') }}
            </span>
        @endif
    </div>
</div>
