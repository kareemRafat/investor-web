<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step1.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3 justify-content-center">
            @foreach (__('investor.steps.step1.options') as $key => $label)
                <div class="col-12 col-sm-6 col-lg-3 position-relative">
                    <input type="radio" class="btn-check" wire:model="investorField" id="investor-{{ $key }}"
                        value="{{ $key }}" autocomplete="off" name="investorField">

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

    @error('investorField')
        <div class="d-flex justify-content-center">
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">{{ $message }}</span>
        </div>
    @enderror
</div>
