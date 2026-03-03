<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step1.subtitle') }}"
        :currentStep="$currentStep"
        :totalSteps="$totalSteps" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
        <div class="row g-2 g-md-3">
            @foreach ($ideaOptions as $key => $label)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="radio" class="btn-check" wire:model="state.step1.ideaField" id="idea-{{ $key }}"
                        value="{{ $key }}" name="ideaField">
                    <label for="idea-{{ $key }}" class="choice-component idea-variant w-100">
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
        @error('state.step1.ideaField')
            <div class="error-alert-custom">
                <i class="bi bi-exclamation-circle-fill fs-5"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <div x-show="errors['state.step1.ideaField']" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="errors['state.step1.ideaField']"></span>
        </div>
    </div>
</div>
