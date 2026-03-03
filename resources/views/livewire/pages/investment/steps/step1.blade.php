<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step1.subtitle') }}"
        :currentStep="$currentStep"
        :totalSteps="$totalSteps" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3 justify-content-center">
            @foreach ($investorOptions as $key => $label)
                <div class="col-12 col-sm-6 col-lg-3 position-relative">
                    <input type="radio" class="btn-check" wire:model="state.step1.investorField"
                        id="investor-{{ $key }}" value="{{ $key }}" autocomplete="off"
                        name="investorField">

                    <label class="choice-component idea-variant w-100" for="investor-{{ $key }}">
                        <span class="choice-text">{{ $label }}</span>
                        <div class="choice-radio-indicator">
                            <i class="bi bi-check-lg fs-5"></i>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex flex-column align-items-center">
        @error('state.step1.investorField')
            <div class="d-flex justify-content-center">
                <div class="error-alert-custom">
                    <i class="bi bi-exclamation-circle-fill fs-5"></i>
                    <span>{{ $message }}</span>
                </div>
            </div>
        @enderror
        <div x-show="errors['state.step1.investorField']" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="errors['state.step1.investorField']"></span>
        </div>
    </div>
</div>
