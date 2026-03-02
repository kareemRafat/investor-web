<div class="container px-sm-0" 
     x-data="{ 
        step: @entangle('currentStep'),
        scrollToTop() { window.scrollTo({ top: 0, behavior: 'smooth' }) } 
     }"
     x-on:livewire-step-changed.window="scrollToTop()">
    
    <div class="row g-3 mb-3">
        <div class="col-12">

            {{-- steps --}}
            <div class="position-relative" wire:loading.class="opacity-50" wire:target="handleNextAction, previousStep, goToStep, save">
                <div x-show="step === 1" x-transition>
                    @include('livewire.pages.investment.steps.step1')
                </div>
                <div x-show="step === 2" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step2')
                </div>
                <div x-show="step === 3" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step3')
                </div>
                <div x-show="step === 4" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step4')
                </div>
                <div x-show="step === 5" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step5')
                </div>
                <div x-show="step === 6" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step6')
                </div>
                <div x-show="step === 7" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step7')
                </div>
            </div>

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

                <button type="button"
                    wire:click.prevent="handleNextAction" 
                    wire:loading.attr="disabled"
                    wire:target="handleNextAction" 
                    class="yn-button"
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
