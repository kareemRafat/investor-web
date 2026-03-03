<div x-init="
    window.addEventListener('resize', () => isMobile = window.innerWidth < 992);">

    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step4.subtitle') }}"
        :currentStep="$currentStep"
        :totalSteps="$totalSteps" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- One-time Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="row g-3">

                            <!-- main type -->
                            <div class="col-12">
                                <input type="radio" class="btn-check" id="profit-one-time" value="one-time"
                                    x-model="state.step4.profit_type" 
                                    wire:model.live="state.step4.profit_type" 
                                    @click="state.step4.profit_range_id = null; if (isMobile) expandedType = expandedType === 'one-time' ? null : 'one-time'"
                                    name="profit_type" autocomplete="off">

                                <label class="choice-component cost-variant w-100" for="profit-one-time">
                                    <span class="choice-text">
                                        {{ __('idea.steps.step4.types.one_time') }}
                                    </span>

                                    <span class="d-lg-none mobile-arrow"
                                        x-text="expandedType === 'one-time' ? '▲' : '▼'"></span>

                                    <div class="choice-radio-indicator">
                                        <i class="bi bi-check-lg fs-5"></i>
                                    </div>
                                </label>
                            </div>

                            <!-- ranges -->
                            <div class="col-12" x-show="!isMobile || expandedType === 'one-time'" x-transition>
                                <div class="row g-2 g-md-3">
                                    @foreach ($oneTimeProfitRanges as $range)
                                        <div class="col-12 col-md-6">
                                            <input type="radio" class="btn-check"
                                                id="profit-one-time-{{ $range->value }}" value="{{ $range->value }}"
                                                x-model="state.step4.profit_range_id" 
                                                wire:model.live="state.step4.profit_range_id" 
                                                :disabled="state.step4.profit_type !== 'one-time'"
                                                autocomplete="off">

                                            <label class="choice-component range-variant w-100"
                                                :class="{ 'disabled': state.step4.profit_type !== 'one-time' }"
                                                for="profit-one-time-{{ $range->value }}">
                                                <span class="choice-text text-center">
                                                    {!! $range->label() !!}
                                                </span>

                                                <div class="choice-radio-indicator">
                                                    <i class="bi bi-check-lg fs-5"></i>
                                                </div>
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
                                    x-model="state.step4.profit_type" 
                                    wire:model.live="state.step4.profit_type" 
                                    @click="state.step4.profit_range_id = null; if (isMobile) expandedType = expandedType === 'annual' ? null : 'annual'"
                                    name="profit_type" autocomplete="off">

                                <label class="choice-component cost-variant w-100" for="profit-annual">
                                    <span class="choice-text">
                                        {{ __('idea.steps.step4.types.annual') }}
                                    </span>

                                    <span class="d-lg-none mobile-arrow"
                                        x-text="expandedType === 'annual' ? '▲' : '▼'"></span>

                                    <div class="choice-radio-indicator">
                                        <i class="bi bi-check-lg fs-5"></i>
                                    </div>
                                </label>
                            </div>

                            <!-- ranges -->
                            <div class="col-12" x-show="!isMobile || expandedType === 'annual'" x-transition>
                                <div class="row g-2 g-md-3">
                                    @foreach ($annualProfitRanges as $range)
                                        <div class="col-12 col-md-6">
                                            <input type="radio" class="btn-check"
                                                id="profit-annual-{{ $range->value }}" value="{{ $range->value }}"
                                                x-model="state.step4.profit_range_id" 
                                                wire:model.live="state.step4.profit_range_id" 
                                                :disabled="state.step4.profit_type !== 'annual'"
                                                autocomplete="off">

                                            <label class="choice-component range-variant w-100"
                                                :class="{ 'disabled': state.step4.profit_type !== 'annual' }"
                                                for="profit-annual-{{ $range->value }}">
                                                <span class="choice-text text-center">
                                                    {!! $range->label() !!}
                                                </span>

                                                <div class="choice-radio-indicator">
                                                    <i class="bi bi-check-lg fs-5"></i>
                                                </div>
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
        @if ($errors->has('state.step4.profit_type') || $errors->has('state.step4.profit_range_id'))
            <div class="error-alert-custom">
                <i class="bi bi-exclamation-circle-fill fs-5"></i>
                <span>{{ $errors->first('state.step4.profit_type') ?: $errors->first('state.step4.profit_range_id') }}</span>
            </div>
        @endif
        <div x-show="errors['state.step4.profit_type']" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="errors['state.step4.profit_type']"></span>
        </div>
        <div x-show="errors['state.step4.profit_range_id']" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="errors['state.step4.profit_range_id']"></span>
        </div>
    </div>
</div>
