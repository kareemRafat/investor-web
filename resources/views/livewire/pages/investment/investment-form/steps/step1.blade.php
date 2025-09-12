<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step1.subtitle') }}" />

    @error('investorField')
        <div class="text-danger small mt-2">{{ $message }}</div>
    @enderror

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3 justify-content-center">
            @foreach (__('investor.steps.step1.options') as $key => $label)
                <div class="col-6 col-lg-3 col-md-6">
                    <input type="radio" class="btn-check" wire:model="investorField" id="investor-{{ $key }}"
                        value="{{ $key }}" autocomplete="off" name="investorField">

                    <label
                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                        for="investor-{{ $key }}">
                        {{ $label }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
