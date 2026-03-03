<div x-init="
    window.addEventListener('resize', () => isMobile = window.innerWidth < 992);">

    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step3.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
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
                                        x-model="state.step3.cost_type" 
                                        wire:model.live="state.step3.cost_type"
                                        @click="state.step3.range_id = null; if (isMobile) expandedType = expandedType === 'one-time' ? null : 'one-time'"
                                        name="cost_type" autocomplete="off">
                                    <label class="choice-component cost-variant w-100" for="one-time">
                                        <span class="choice-text">{{ __('idea.steps.step3.types.one-time') }}</span>
                                        <span class="d-lg-none mobile-arrow"
                                            x-text="expandedType === 'one-time' ? '▲' : '▼'"></span>
                                        <div class="choice-radio-indicator">
                                            <i class="bi bi-check-lg fs-5"></i>
                                        </div>
                                    </label>
                                </div>

                                <!-- one-time ranges -->
                                <div class="col-12" x-show="!isMobile || expandedType === 'one-time'" x-transition>
                                    <div class="row g-2 g-md-3">
                                        @foreach ($oneTimeRanges as $range)
                                            <div class="col-12 col-md-6">
                                                <input type="radio" class="btn-check"
                                                    id="one-time-{{ $range->value }}" value="{{ $range->value }}"
                                                    x-model="state.step3.range_id"
                                                    wire:model.live="state.step3.range_id" 
                                                    :disabled="state.step3.cost_type !== 'one-time'"
                                                    autocomplete="off">
                                                <label class="choice-component range-variant w-100"
                                                    :class="{ 'disabled': state.step3.cost_type !== 'one-time' }"
                                                    for="one-time-{{ $range->value }}">
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

                    <!-- Annual Costs -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <!-- main button -->
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="annual" value="annual"
                                        x-model="state.step3.cost_type"
                                        wire:model.live="state.step3.cost_type" 
                                        @click="state.step3.range_id = null; if (isMobile) expandedType = expandedType === 'annual' ? null : 'annual'"
                                        name="cost_type" autocomplete="off">
                                    <label class="choice-component cost-variant w-100" for="annual">
                                        <span class="choice-text">{{ __('idea.steps.step3.types.annual') }}</span>
                                        <span class="d-lg-none mobile-arrow"
                                            x-text="expandedType === 'annual' ? '▲' : '▼'"></span>
                                        <div class="choice-radio-indicator">
                                            <i class="bi bi-check-lg fs-5"></i>
                                        </div>
                                    </label>
                                </div>

                                <!-- annual ranges -->
                                <div class="col-12" x-show="!isMobile || expandedType === 'annual'" x-transition>
                                    <div class="row g-2 g-md-3">
                                        @foreach ($annualRanges as $range)
                                            <div class="col-12 col-md-6">
                                                <input type="radio" class="btn-check" id="annual-{{ $range->value }}"
                                                    value="{{ $range->value }}" 
                                                    x-model="state.step3.range_id"
                                                    wire:model.live="state.step3.range_id"
                                                    :disabled="state.step3.cost_type !== 'annual'" autocomplete="off">
                                                <label class="choice-component range-variant w-100"
                                                    :class="{ 'disabled': state.step3.cost_type !== 'annual' }"
                                                    for="annual-{{ $range->value }}">
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
    </div>
    <div class="d-flex justify-content-center gap-2 flex-column align-items-center">
        @error('state.step3.cost_type')
            <div class="error-alert-custom">
                <i class="bi bi-exclamation-circle-fill fs-5"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <div x-show="errors['state.step3.cost_type']" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="errors['state.step3.cost_type']"></span>
        </div>

        @error('state.step3.range_id')
            <div class="error-alert-custom">
                <i class="bi bi-exclamation-circle-fill fs-5"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <div x-show="errors['state.step3.range_id']" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="errors['state.step3.range_id']"></span>
        </div>
    </div>

</div>
