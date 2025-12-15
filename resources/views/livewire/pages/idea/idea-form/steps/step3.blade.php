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

    <style>
        .cost-type-choice {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 10px;
            padding: 12px 14px;
            border: 2px solid #c7d2fe;
            border-radius: 12px;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
            position: relative;
            font-weight: 600;
        }

        .range-choice {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border: 2px solid #e0e7eb;
            border-radius: 12px;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            position: relative;
            font-weight: 600;
        }

        .range-choice:not(.range-disabled) {
            border-color: #c7d2fe;
        }

        .choice-text {
            line-height: 1.3;
            color: #1e293b;
            transition: color 0.3s ease;
        }

        .check-indicator {
            position: absolute;
            top: 50%;
            transform: translateY(-50%) scale(0);
            font-size: 1.2rem;
            color: white;
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        html[dir="ltr"] .check-indicator {
            right: 12px;
        }

        html[dir="rtl"] .check-indicator {
            left: 12px;
        }

        .btn-check:checked+.cost-type-choice {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-check:checked+.cost-type-choice .choice-text {
            color: white;
        }

        .btn-check:checked+.cost-type-choice .check-indicator {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }

        .btn-check:checked+.range-choice {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-check:checked+.range-choice .choice-text {
            color: white;
        }

        .btn-check:checked+.range-choice .check-indicator {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }

        .range-disabled {
            opacity: 0.4;
            cursor: not-allowed;
            border-color: #e0e7eb !important;
        }

        .range-disabled:hover {
            transform: none !important;
            box-shadow: none !important;
        }

        .mobile-arrow {
            margin-inline-start: 0.5rem;
        }

        @media (min-width: 768px) {
            .cost-type-choice {
                padding: 16px 18px;
                font-size: 16px;
            }

            .range-choice {
                padding: 14px 16px;
                font-size: 15px;
            }
        }
    </style>

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
                                    <label class="cost-type-choice w-100"
                                        for="one-time"
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
                                                <label class="range-choice w-100"
                                                    :class="{ 'range-disabled': selectedType !== 'one-time' }"
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
                                    <label class="cost-type-choice w-100"
                                        for="annual"
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
                                                <label class="range-choice w-100"
                                                    :class="{ 'range-disabled': selectedType !== 'annual' }"
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
