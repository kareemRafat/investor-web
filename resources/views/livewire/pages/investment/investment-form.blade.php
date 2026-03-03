<div class="container px-sm-0"
     x-data="investmentForm({
        step: @entangle('currentStep').live,
        state: @entangle('state'),
        validationMessages: @js($this->getValidationMessages())
     })"
    x-on:livewire-step-changed.window="scrollToTop()">

    <style>
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-8px);
            }

            40% {
                transform: translateX(8px);
            }

            60% {
                transform: translateX(-8px);
            }

            80% {
                transform: translateX(8px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-alert-custom {
            animation: shake 0.5s ease-in-out, fadeIn 0.3s ease-in-out;
            background-color: #dc3545;
            color: white;
            border-radius: 12px;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
            margin-top: 1rem;
            text-align: center;
            justify-content: center;
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

            {{-- steps --}}
            <div class="position-relative" wire:loading.class="opacity-50"
                wire:target="handleNextAction, previousStep, goToStep, save">
                @if($currentStep === 1)
                    <div x-transition>
                        @include('livewire.pages.investment.steps.step1')
                    </div>
                @elseif($currentStep === 2)
                    <div x-transition>
                        @include('livewire.pages.investment.steps.step2')
                    </div>
                @elseif($currentStep === 3)
                    <div x-transition>
                        @include('livewire.pages.investment.steps.step3')
                    </div>
                @elseif($currentStep === 4)
                    <div x-transition>
                        @include('livewire.pages.investment.steps.step4')
                    </div>
                @elseif($currentStep === 5)
                    <div x-transition>
                        @include('livewire.pages.investment.steps.step5')
                    </div>
                @elseif($currentStep === 6)
                    <div x-transition>
                        @include('livewire.pages.investment.steps.step6')
                    </div>
                @elseif($currentStep === 7)
                    <div x-transition>
                        @include('livewire.pages.investment.steps.step7')
                    </div>
                @endif
            </div>

            <div wire:cloak class="d-flex align-items-center gap-3 justify-content-center mt-4 mb-3">
                @if ($currentStep != 1)
                    <button @click="$wire.previousStep()" wire:loading.attr="disabled"
                        wire:target="previousStep"
                        type="button" class="yn-button"
                        style="min-width: 120px; background: white; color: #667eea; border-color: #c7d2fe;"
                        aria-label="{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}">
                        <span class="d-flex align-items-center justify-content-center gap-2">
                            <span wire:loading.remove wire:target="previousStep">
                                @if (app()->getLocale() === 'ar')
                                    <i class="bi bi-arrow-right-circle"></i>
                                @else
                                    <i class="bi bi-arrow-left-circle"></i>
                                @endif
                            </span>

                            {{-- Spinner --}}
                            <span wire:loading wire:target="previousStep" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

                            <span>{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}</span>
                        </span>
                    </button>
                @endif

                <button type="button" @click.prevent="validate() ? $wire.handleNextAction() : null"
                    wire:loading.attr="disabled" wire:target="handleNextAction" class="yn-button"
                    style="min-width: 120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);"
                    aria-label="{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}"
                    title="{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}">

                    <span class="d-flex align-items-center justify-content-center gap-2">
                        {{-- Text --}}
                        <span>{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}</span>

                        {{-- Icon: Arrow (shown when NOT loading) --}}
                        <span wire:loading.remove wire:target="handleNextAction">
                            @if (app()->getLocale() === 'ar')
                                <i class="bi bi-arrow-left-circle"></i>
                            @else
                                <i class="bi bi-arrow-right-circle"></i>
                            @endif
                        </span>

                        {{-- Spinner (shown when loading) --}}
                        <span wire:loading wire:target="handleNextAction" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span>
                    </span>
                </button>
            </div>

            <div wire:cloak class="stepper d-flex align-items-center justify-content-center flex-wrap gap-2 mb-4">
                @for ($i = 1; $i <= 7; $i++)
                    <div class="stepper-item position-relative
                        @if ($i < $currentStep) completed_step
                        @elseif($i === $currentStep) active_step @endif"
                        @if ($i <= $maxAllowedStep) @click="$wire.goToStep({{ $i }})"
                        style="cursor: pointer"
                        @else
                        style="opacity: .4; cursor: not-allowed" @endif>
                        <div class="stepper-circle">
                            {{-- Show number or checkmark when NOT loading --}}
                            <div wire:loading.remove wire:target="goToStep({{ $i }})">
                                @if ($i < $currentStep)
                                    <i class="bi bi-check-circle-fill"></i>
                                @else
                                    {{ $i }}
                                @endif
                            </div>

                            {{-- Show spinner when this specific step is loading --}}
                            <div wire:loading wire:target="goToStep({{ $i }})">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                    style="width: 1rem; height: 1rem;"></span>
                            </div>
                        </div>
                    </div>

                    @if ($i < 7)
                        <div class="stepper-line"></div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</div>
