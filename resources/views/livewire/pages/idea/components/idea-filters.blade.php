<div class="d-flex flex-column gap-3">
    <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
        <div class="row mb-3">
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2" wire:model.live="field">
                     {{-- get Fields from translation files (no query Needed) --}}
                    <option selected disabled value="">{{ __('idea.index.filter_field') }}</option>
                    @foreach (__('idea.steps.step1.options') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2" wire:model.live="country">
                    {{-- get Countries from translation files (no query Needed) --}}
                    <option selected disabled value="">{{ __('idea.index.filter_countries') }}</option>
                    @foreach (__('idea.steps.step2.options') as $country)
                        <option value="{{ $country['code'] }}">{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-">
                    <option selected disabled>{{ __('idea.index.filter_cost') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-full">
                    <option selected disabled>{{ __('idea.index.filter_contribution') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div>
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-full">
                    <option selected disabled>{{ __('idea.index.filter_requirements') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div>
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-full">
                    <option selected disabled>{{ __('idea.index.filter_implementation') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-full">
                    <option selected disabled>{{ __('idea.index.filter_distribution') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div>
            <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-full">
                    <option selected disabled>{{ __('idea.index.filter_expected_profit') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn w-25 bg-primary text-white rounded-8 shadow-sm text-center py-2">
                {{ __('idea.index.btn_search') }}
            </button>
        </div>
    </div>
</div>
