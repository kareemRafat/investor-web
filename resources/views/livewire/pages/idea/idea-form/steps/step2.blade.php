<div>

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step2.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-سة p-3 p-md-4" x-data="{ limit: 3 }">
        <div class="row g-2 g-md-3">
            @foreach ($options as $index => $country)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="checkbox" class="btn-check" id="country-{{ $index }}" name="countries[]"
                        wire:model="countries" value="{{ $country['code'] }}"
                        x-bind:disabled="$wire.countries.length >= limit && !$wire.countries.includes('{{ $country['code'] }}')">
                    <label for="country-{{ $index }}" class="choice-component country-variant w-100"
                        x-bind:class="{
                            'disabled': $wire.countries.length >= limit && !$wire.countries.includes(
                                '{{ $country['code'] }}')
                        }">
                        <span class="choice-text">{{ $country['name'] }}</span>
                        <div class="choice-radio-indicator">
                            <i class="bi bi-check-lg fs-5"></i>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        @error('countries')
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
