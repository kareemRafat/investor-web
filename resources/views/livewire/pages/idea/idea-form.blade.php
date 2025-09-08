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

            <div class="d-flex align-items-center gap-2 justify-content-center mt-4 mb-3">
                @if ($currentStep > 1)
                    <a wire:click.prevent="previousStep" aria-label="Previous page" title="Previous page"
                        class="btn btn-outline-custom btn_next py-2 px-4">
                        <span class="small fw-bold">
                            <i class="bi bi-arrow-left-circle me-2"></i>
                            Previous
                        </span>
                    </a>
                @endif

                <a wire:click.prevent="nextStep" aria-label="Next page" title="Next page"
                    class="btn {{ $currentStep === 10 ? 'btn-outline-custom' : 'btn-custom' }} py-2 px-4">
                    <span class="small fw-bold">
                        {{ $currentStep === 10 ? 'Finish' : 'Next' }}
                        <i class="bi bi-arrow-right-circle ms-2"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="stepper d-flex align-items-center justify-content-center flex-wrap">
            @for ($i = 1; $i <= 10; $i++)
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

                @if ($i < 10)
                    <div class="stepper-connector"></div>
                @endif
            @endfor
        </div>
    </div>
</div>
