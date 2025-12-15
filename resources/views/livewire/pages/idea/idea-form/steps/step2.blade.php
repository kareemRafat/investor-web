<div>

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step2.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4" x-data="{ limit: 3 }">
        <div class="row g-2 g-md-3">
            @foreach ($options as $index => $country)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="checkbox" class="btn-check" id="country-{{ $index }}" name="countries[]"
                        wire:model="countries" value="{{ $country['code'] }}"
                        x-bind:disabled="$wire.countries.length >= limit && !$wire.countries.includes('{{ $country['code'] }}')">
                    <label for="country-{{ $index }}" class="choice-component country-variant w-100"
                        x-bind:class="{ 'disabled': $wire.countries.length >= limit && !$wire.countries.includes(
                                '{{ $country['code'] }}') }">
                        <span class="choice-text">{{ $country['name'] }}</span>
                        <i class="bi bi-check-circle-fill check-indicator"></i>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    @error('countries')
        <div class="error-message-wrapper">
            <div class="alert alert-danger rounded-3 shadow-sm mt-3 mx-auto" style="max-width: 500px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
