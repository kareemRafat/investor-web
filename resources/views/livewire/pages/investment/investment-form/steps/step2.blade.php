<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step2.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4" x-data="{ limit: 3 }">
        <div class="row g-3 justify-content-center">
            @foreach ($options as $index => $country)
                <div class="col-6 col-lg-3 col-md-6 position-relative">
                    <input type="checkbox" class="btn-check" id="country-{{ $index }}" name="countries[]"
                        wire:model="countries" value="{{ $country['code'] }}"
                        x-bind:disabled="$wire.countries.length >= limit && !$wire.countries.includes('{{ $country['code'] }}')">
                    <label
                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                        for="country-{{ $index }}">
                        {{ $country['name'] }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    @error('countries')
        <div class="d-flex justify-content-center">
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">{{ $message }}</span>
        </div>
    @enderror
</div>
