<!-- Step 1 Section -->
<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">

            @switch($currentStep)
                @case(1)
                    <livewire:pages.idea.idea-form.steps.step1 wire:key="step-1" />
                @break

                @case(2)
                    <livewire:pages.idea.idea-form.steps.step2 wire:key="step-2" />
                @break

                @case(3)
                    <livewire:pages.idea.idea-form.steps.step3 wire:key="step-3" />
                @break

                @case(4)
                    <livewire:pages.idea.idea-form.steps.step4 wire:key="step-4" />
                @break

                @case(5)
                    <livewire:pages.idea.idea-form.steps.step5 wire:key="step-5" />
                @break

                @case(6)
                    <livewire:pages.idea.idea-form.steps.step6 wire:key="step-6" />
                @break

                @case(7)
                    <livewire:pages.idea.idea-form.steps.step7 wire:key="step-7" />
                @break

                @case(8)
                    <livewire:pages.idea.idea-form.steps.step8 wire:key="step-8" />
                @break

                @case(9)
                    <livewire:pages.idea.idea-form.steps.step9 wire:key="step-9" />
                @break

                @case(10)
                    <livewire:pages.idea.idea-form.steps.step10 wire:key="step-10" />
                @break
            @endswitch

            {{-- buttons --}}
            <div wire:cloak class="d-flex align-items-center gap-2 justify-content-center mt-4 mb-3">
                @if ($currentStep > 1)
                    <a wire:click.prevent="previousStep" aria-label="{{ __('idea.form.previous') }}"
                        title="{{ __('idea.form.previous') }}" class="btn btn-outline-custom btn_next py-2 px-4">
                        <span class="small fw-bold d-flex align-items-center">
                            @if (app()->getLocale() === 'ar')
                                <i class="bi bi-arrow-right-circle mx-2"></i>
                                {{ __('idea.form.previous') }}
                            @else
                                <i class="bi bi-arrow-left-circle mx-2"></i>
                                {{ __('idea.form.previous') }}
                            @endif
                        </span>
                    </a>
                @endif

                <a wire:click.prevent="{{ $currentStep === 10 ? 'finish' : 'nextStep' }}"
                    aria-label="{{ $currentStep === 10 ? __('idea.form.finish') : __('idea.form.next') }}"
                    title="{{ $currentStep === 10 ? __('idea.form.finish') : __('idea.form.next') }}"
                    class="btn {{ $currentStep === 10 ? 'btn-outline-custom' : 'btn-custom' }} py-2 px-4">
                    <span class="small fw-bold d-flex align-items-center">
                        @if (app()->getLocale() === 'ar')
                            {{ $currentStep === 10 ? __('idea.form.finish') : __('idea.form.next') }}
                            <i class="bi bi-arrow-left-circle mx-2"></i>
                        @else
                            {{ $currentStep === 10 ? __('idea.form.finish') : __('idea.form.next') }}
                            <i class="bi bi-arrow-right-circle mx-2"></i>
                        @endif
                    </span>
                </a>

            </div>
        </div>
        <div wire:cloak class="stepper d-flex align-items-center justify-content-center flex-wrap">
            @for ($i = 1; $i <= 10; $i++)
                <div class="stepper-item
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

                @if ($i < 10)
                    <div class="stepper-connector"></div>
                @endif
            @endfor
        </div>
    </div>
</div>
