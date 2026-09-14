<div class="container px-sm-0"
     x-data="ideaForm({
        step: @entangle('currentStep'),
        state: @entangle('state'),
        maxAllowed: {{ $maxAllowedStep }},
        validationMessages: @js($this->getValidationMessages())
     })"
     x-on:livewire-step-changed.window="scrollToTop()">

    <style>
        [x-cloak] { display: none !important; }
        .choice-invalid {
            box-shadow: none !important;
            outline: 2px solid #dc3545 !important;
            outline-offset: -2px;
        }
        .number-input.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: none !important;
        }
        .form-control.is-invalid,
        .form-select.is-invalid {
            box-shadow: none !important;
        }
        .field-error {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #dc3545;
            font-weight: 600;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            text-align: center;
        }
    </style>

    <div class="row g-3 mb-3">
        <div class="col-12">

            <!-- Progress Bar -->
            <div class="progress mb-3" style="height: 6px; background-color: #e2e8f0; border-radius: 3px;">
                <div class="progress-bar" role="progressbar"
                     :style="`width: ${progress}%; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);`"
                     :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            {{-- steps (all pre-rendered; Alpine switches instantly with zero requests) --}}
            <div class="position-relative" wire:loading.class="opacity-50" wire:target="nextStepValidated, finishWizard, save">
                <div x-show="step === 1" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step1')
                </div>
                <div x-show="step === 2" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step2')
                </div>
                <div x-show="step === 3" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step3')
                </div>
                <div x-show="step === 4" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step4')
                </div>
                <div x-show="step === 5" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step5')
                </div>
                <div x-show="step === 6" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step6')
                </div>
                <div x-show="step === 7" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step7')
                </div>
                <div x-show="step === 8" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step8')
                </div>
                <div x-show="step === 9" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step9')
                </div>
                <div x-show="step === 10" x-transition x-cloak>
                    @include('livewire.pages.idea.steps.step10')
                </div>
            </div>

            <div wire:cloak class="d-flex align-items-center gap-3 justify-content-center mt-4 mb-3">
                <div x-show="step != 1">
                    <button @click="goPrev()"
                        :disabled="busy"
                        wire:loading.attr="disabled"
                        wire:target="nextStepValidated, finishWizard"
                        type="button" class="yn-button"
                        style="min-width: 120px; background: white; color: #667eea; border-color: #c7d2fe;">
                        <span class="d-flex align-items-center justify-content-center gap-2">
                            <span>
                                @if (app()->getLocale() === 'ar')
                                    <i class="bi bi-arrow-right-circle"></i>
                                @else
                                    <i class="bi bi-arrow-left-circle"></i>
                                @endif
                            </span>

                            <span x-show="step === 10">{{ __('idea.form.edit') }}</span>
                            <span x-show="step !== 10">{{ __('idea.form.previous') }}</span>
                        </span>
                    </button>
                </div>

                <button type="button"
                    x-show="step !== 10"
                    @click="goNext()"
                    :disabled="busy"
                    wire:loading.attr="disabled"
                    wire:target="nextStepValidated"
                    class="yn-button"
                    style="min-width: 120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">

                    <span class="d-flex align-items-center justify-content-center gap-2">
                        {{-- Text --}}
                        <span>{{ __('idea.form.next') }}</span>

                        {{-- Icon: Arrow (shown when NOT loading) --}}
                        <span wire:loading.remove wire:target="nextStepValidated">
                            @if (app()->getLocale() === 'ar')
                                <i class="bi bi-arrow-left-circle"></i>
                            @else
                                <i class="bi bi-arrow-right-circle"></i>
                            @endif
                        </span>

                        {{-- Spinner (shown when validating in background) --}}
                        <span wire:loading wire:target="nextStepValidated" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span>
                    </span>
                </button>

                <button type="button"
                    x-show="step === 10"
                    x-cloak
                    @click="finish()"
                    :disabled="busy"
                    wire:loading.attr="disabled"
                    wire:target="finishWizard"
                    class="yn-button"
                    style="min-width: 120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">

                    <span class="d-flex align-items-center justify-content-center gap-2">
                        <span>{{ __('idea.form.finish') }}</span>
                        <span wire:loading.remove wire:target="finishWizard">
                            <i class="bi bi-check-circle"></i>
                        </span>
                        <span wire:loading wire:target="finishWizard" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span>
                    </span>
                </button>
            </div>

            <div wire:cloak class="stepper d-flex align-items-center justify-content-center flex-wrap gap-2 mb-4">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="stepper-item position-relative"
                        :class="{ 'completed_step': {{ $i }} < step, 'active_step': {{ $i }} === step }"
                        @click="goToStep({{ $i }})"
                        :style="{{ $i }} <= maxStep ? 'cursor: pointer' : 'opacity: .4; cursor: not-allowed'">
                        <div class="stepper-circle">
                            <span x-show="{{ $i }} < step"><i class="bi bi-check-circle-fill"></i></span>
                            <span x-show="{{ $i }} >= step">{{ $i }}</span>
                        </div>
                    </div>

                    @if ($i < 10)
                        <div class="stepper-line"></div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</div>
