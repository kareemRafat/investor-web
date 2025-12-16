<!-- Step 1 Section -->
<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">

            {{-- steps --}}

            @switch($currentStep)
                @case(1)
                    <livewire:pages.investment.investment-form.steps.step1 wire:key="step-1" />
                @break

                @case(2)
                    <livewire:pages.investment.investment-form.steps.step2 wire:key="step-2" />
                @break

                @case(3)
                    <livewire:pages.investment.investment-form.steps.step3 wire:key="step-3" />
                @break

                @case(4)
                    <livewire:pages.investment.investment-form.steps.step4 wire:key="step-4" />
                @break

                @case(5)
                    <livewire:pages.investment.investment-form.steps.step5 wire:key="step-5" />
                @break

                @case(6)
                    <livewire:pages.investment.investment-form.steps.step6 wire:key="step-6" />
                @break

                @case(7)
                    <livewire:pages.investment.investment-form.steps.step7 wire:key="step-7" />
                @break
            @endswitch

            <div wire:cloak class="d-flex align-items-center gap-3 justify-content-center mt-4 mb-3">
                @if ($currentStep != 1)
                    <button wire:click="previousStep" type="button" class="yn-button"
                        style="min-width: 120px; background: white; color: #667eea; border-color: #c7d2fe;"
                        aria-label="{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}">
                        <span class="d-flex align-items-center justify-content-center gap-2">
                            @if (app()->getLocale() === 'ar')
                                <i class="bi bi-arrow-right-circle"></i>
                                <span>{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}</span>
                            @else
                                <i class="bi bi-arrow-left-circle"></i>
                                <span>{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}</span>
                            @endif
                        </span>
                    </button>
                @endif

                <button type="button" wire:click.prevent="handleNextAction" wire:target="handleNextAction"
                    class="yn-button"
                    style="min-width: 120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);"
                    aria-label="{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}">
                    <span class="d-flex align-items-center justify-content-center gap-2">
                        @if (app()->getLocale() === 'ar')
                            <span>{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}</span>
                            <i class="bi bi-arrow-left-circle"></i>
                        @else
                            <span>{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}</span>
                            <i class="bi bi-arrow-right-circle"></i>
                        @endif
                    </span>
                </button>
            </div>

            <div wire:cloak class="stepper d-flex align-items-center justify-content-center flex-wrap gap-2 mb-4">
                @for ($i = 1; $i <= 7; $i++)
                    <div class="stepper-item position-relative
            @if ($i < $currentStep) completed_step
            @elseif($i === $currentStep) active_step @endif"
                        @if ($i <= $maxAllowedStep) wire:click="goToStep({{ $i }})"
            style="cursor: pointer"
            @else
            style="opacity: .4; cursor: not-allowed" @endif>
                        <div class="stepper-circle">
                            @if ($i < $currentStep)
                                <i class="bi bi-check-circle-fill"></i>
                            @else
                                {{ $i }}
                            @endif
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
