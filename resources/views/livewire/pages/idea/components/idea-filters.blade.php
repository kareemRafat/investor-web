<div class="d-flex flex-column gap-3">
    <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
        <div class="row mb-3">
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2" wire:model.live="field">
                    {{-- get Fields from translation files (no query Needed) --}}
                    <option selected value="">{{ __('idea.index.filter_field') }}</option>
                    @foreach (__('idea.steps.step1.options') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2" wire:model.live="country">
                    {{-- get Countries from translation files (no query Needed) --}}
                    <option selected value="">{{ __('idea.index.filter_countries') }}</option>
                    @foreach (__('idea.steps.step2.options') as $country)
                        <option value="{{ $country['code'] }}">{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2 w-" wire:model.live="cost_range">
                    <option value="">{{ __('idea.index.filter_cost') }}</option>

                    @php $collection = collect($costRanges); @endphp

                    <optgroup label="{{ __('idea.index.one_time_cost') }}">
                        @foreach ($collection->where('type', 'one-time') as $range)
                            <option value="{{ $range['id'] }}">{!! $range['label'] !!}</option>
                        @endforeach
                    </optgroup>

                    <optgroup label="{{ __('idea.index.annual_cost') }}">
                        @foreach ($collection->where('type', 'annual') as $range)
                            <option value="{{ $range['id'] }}">{!! $range['label'] !!}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2 w-full" wire:model.live="contributionType">
                    <option selected disabled value="">{{ __('idea.index.filter_contribution') }}</option>
                    <option value="sell">{{ __('idea.steps.step7.sell') }}</option>
                    <option value="idea">{{ __('idea.steps.step7.idea') }}</option>
                    <option value="capital">{{ __('idea.steps.step7.capital') }}</option>
                    <option value="personal">{{ __('idea.steps.step7.personal') }}</option>
                    <option value="both">{{ __('idea.steps.step7.both') }}</option>
                </select>
            </div>

        </div>

        <div class="d-flex justify-content-end">
            <button wire:click="search" class="btn w-25 bg-primary text-white rounded-8 shadow-sm text-center py-2">
                {{ __('idea.index.btn_search') }}
            </button>
        </div>
    </div>
</div>



{{-- <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-full">
                    <option selected disabled>{{ __('idea.index.filter_requirements') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div> --}}
{{-- <div class="col-md-4 col-12 mb-2">
                <select class="form-select py-2 w-full">
                    <option selected disabled>{{ __('idea.index.filter_implementation') }}</option>
                    <option>خيار 1</option>
                    <option>خيار 2</option>
                </select>
            </div> --}}
{{-- <div class="col-md-4 col-12 mb-2">
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
            </div> --}}
