<div
    x-data="{
        selectedType: @entangle('profit_type'),
        selectedRange: @entangle('profit_range_id'),
    }"
    x-init="$watch('selectedType', () => {
        selectedRange = null;
        $wire.set('profit_range_id', null);
    })">

    <x-pages.idea-wizard.idea-header
        title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step4.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- One-time Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="one-time" value="one-time"
                                        x-model="selectedType" name="profit_type" autocomplete="off">
                                    <label class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="one-time">{{ __('idea.steps.step4.types.one_time') }}</label>
                                </div>

                                @foreach ($oneTimeRanges as $range)
                                    <div class="col-12 col-md-6">
                                        <input type="radio" class="btn-check" id="one-time-{{ $range->id }}"
                                            value="{{ $range->id }}" x-model="selectedRange"
                                            :disabled="selectedType !== 'one-time'" autocomplete="off">
                                        <label class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                            for="one-time-{{ $range->id }}">{!! $range->label !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Annual Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="annual" value="annual"
                                        x-model="selectedType" name="profit_type" autocomplete="off">
                                    <label class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="annual">{{ __('idea.steps.step4.types.annual') }}</label>
                                </div>

                                @foreach ($annualRanges as $range)
                                    <div class="col-12 col-md-6">
                                        <input type="radio" class="btn-check" id="annual-{{ $range->id }}"
                                            value="{{ $range->id }}" x-model="selectedRange"
                                            :disabled="selectedType !== 'annual'" autocomplete="off">
                                        <label class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                            for="annual-{{ $range->id }}">{!! $range->label !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- errors --}}
    <div class="d-flex justify-content-center">
        @if ($errors->has('profit_type') || $errors->has('profit_range_id'))
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3 w-25">
                {{ $errors->first('profit_type') ?: $errors->first('profit_range_id') }}
            </span>
        @endif
    </div>
</div>
