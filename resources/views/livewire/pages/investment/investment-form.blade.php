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
            @endswitch

            <div wire:cloak class="d-flex align-items-center gap-2 justify-content-center mt-4 mb-3">
                @if ($currentStep > 1)
                    <a wire:click.prevent="previousStep" aria-label="{{ __('investor.form.previous') }}"
                        title="{{ __('investor.form.previous') }}" class="btn btn-outline-custom btn_next py-2 px-4">
                        <span class="small fw-bold d-flex align-items-center">
                            @if (app()->getLocale() === 'ar')
                                <i class="bi bi-arrow-right-circle mx-2"></i>
                                {{ __('investor.form.previous') }}
                            @else
                                <i class="bi bi-arrow-left-circle mx-2"></i>
                                {{ __('investor.form.previous') }}
                            @endif
                        </span>
                    </a>
                @endif

                <a wire:click.prevent="{{ $currentStep === 6 ? 'finish' : 'nextStep' }}"
                    aria-label="{{ $currentStep === 6 ? __('investor.form.finish') : __('investor.form.next') }}"
                    title="{{ $currentStep === 6 ? __('investor.form.finish') : __('investor.form.next') }}"
                    class="btn {{ $currentStep === 6 ? 'btn-outline-custom' : 'btn-custom' }} py-2 px-4">
                    <span class="small fw-bold d-flex align-items-center">
                        @if (app()->getLocale() === 'ar')
                            {{ $currentStep === 6 ? __('investor.form.finish') : __('investor.form.next') }}
                            <i class="bi bi-arrow-left-circle mx-2"></i>
                        @else
                            {{ $currentStep === 6 ? __('investor.form.finish') : __('investor.form.next') }}
                            <i class="bi bi-arrow-right-circle mx-2"></i>
                        @endif
                    </span>
                </a>
            </div>
            <div wire:cloak class="d-flex justify-content-center mb-4">
                <div class="stepper d-flex align-items-center justify-content-center flex-wrap">
                    @for ($i = 1; $i <= 6; $i++)
                        <div
                            class="stepper-item
                            @if ($i < $currentStep) completed_step
                            @elseif($i === $currentStep) active_step @endif">
                            <div class="stepper-circle">
                                @if ($i < $currentStep)
                                    <i class="bi bi-check-circle"></i>
                                @else
                                    {{ $i }}
                                @endif
                            </div>
                        </div>

                        @if ($i < 6)
                            <div class="stepper-connector">
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
