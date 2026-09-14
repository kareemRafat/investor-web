<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step1.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3 justify-content-center">
            @foreach ($investorOptions as $key => $label)
                <div class="col-12 col-sm-6 col-lg-3 position-relative">
                    <input type="radio" class="btn-check" x-model="state.step1.investorField"
                        id="investor-{{ $key }}" value="{{ $key }}" autocomplete="off"
                        name="investorField">

                    <label class="choice-component idea-variant w-100 @error('state.step1.investorField') choice-invalid @enderror" for="investor-{{ $key }}"
                        :class="{ 'choice-invalid': errors['state.step1.investorField'] }">
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
                <div class="field-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>{{ $message }}</span>
                </div>
            </div>
        @enderror
        <div x-show="errors['state.step1.investorField']" class="field-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span x-text="errors['state.step1.investorField']"></span>
        </div>
    </div>
</div>
