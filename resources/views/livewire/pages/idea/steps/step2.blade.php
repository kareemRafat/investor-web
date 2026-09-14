<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step2.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-سة p-3 p-md-4">
        <div class="row g-2 g-md-3">
            @foreach ($step2Options as $index => $country)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="checkbox" class="btn-check" id="country-{{ $index }}" name="countries[]"
                        x-model="state.step2.countries" value="{{ $country['code'] }}"
                        x-bind:disabled="state.step2.countries.length >= limit && !state.step2.countries.includes('{{ $country['code'] }}')">
                    <label for="country-{{ $index }}" class="choice-component country-variant w-100 @error('state.step2.countries') choice-invalid @enderror"
                        x-bind:class="{
                            'disabled': state.step2.countries.length >= limit && !state.step2.countries.includes(
                                '{{ $country['code'] }}'),
                            'choice-invalid': errors['state.step2.countries']
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
    <div class="d-flex flex-column align-items-center">
        @error('state.step2.countries')
            <div class="field-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <div x-show="errors['state.step2.countries']" class="field-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span x-text="errors['state.step2.countries']"></span>
        </div>
    </div>
</div>
