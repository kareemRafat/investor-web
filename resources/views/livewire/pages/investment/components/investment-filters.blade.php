<div class="d-flex flex-column gap-3 mb-3">
    <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
        <div class="row mb-3">
            <div class="d-flex justify-content-between text-primary">
                <div class="d-flex gap-2">
                    <i class="bi bi-filter mt-1"></i>
                    <h5 class="fw-bold">{{ __('investor.index.filters') }}</h5>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <a wire:click="resetFilters" class="text-secondary small mb-3 text-end rounded-8 cursor-pointer">
                        {{ __('investor.index.reset') }}
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2" wire:model.live="field">
                    {{-- get Fields from translation files (no query Needed) --}}
                    <option selected value="">{{ __('investor.index.filter_field') }}</option>
                    @foreach (__('investor.steps.step1.options') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2" wire:model.live="country">
                    {{-- get Countries from translation files (no query Needed) --}}
                    <option selected value="">{{ __('investor.index.filter_countries') }}</option>
                    @foreach (__('investor.steps.step2.options') as $country)
                        <option value="{{ $country['code'] }}">{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2 w-" wire:model.live="cost_range">
                    <option value="">{{ __('investor.index.filter_cost') }}</option>
                    @php $collection = collect($costRanges);@endphp
                    @foreach ($collection->where('type', 'money_contribution') as $range)
                        <option value="{{ $range['id'] }}">{!! $range['label'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <select class="form-select py-2 w-full" wire:model.live="contributionType">
                    <option selected value="">{{ __('investor.index.filter_contribution') }}</option>
                    <option value="sell">{{ __('investor.steps.step4.sell') }}</option>
                    <option value="idea">{{ __('investor.steps.step4.idea') }}</option>
                    <option value="capital">{{ __('investor.steps.step4.capital') }}</option>
                    <option value="personal">{{ __('investor.steps.step4.personal') }}</option>
                    <option value="both">{{ __('investor.steps.step4.both') }}</option>
                </select>
            </div>

        </div>

        <div class="d-flex justify-content-end">
            <button wire:click="search" class="btn w-25 bg-primary text-white rounded-8 shadow-sm text-center py-2">
                {{ __('investor.index.btn_search') }}
            </button>
        </div>
    </div>
</div>
