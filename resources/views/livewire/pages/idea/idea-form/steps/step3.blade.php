<div x-data="{
    selectedType: @entangle('cost_type'),
    selectedRange: @entangle('cost_range'),
}" x-init="$watch('selectedType', () => {
    selectedRange = null;
    $wire.set('cost_range', null);
})">

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step3.subtitle') }}" />

    {{-- errors --}}
    @error('cost_type')
        <div class="text-danger small fw-bold mt-1">{{ $message }}</div>
    @enderror
    @error('cost_range')
        <div class="text-danger small fw-bold mt-1">{{ $message }}</div>
    @enderror

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- One-time Costs -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="one-time" value="one-time"
                                        x-model="selectedType" name="cost_type" autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3
                                                  rounded-8 shadow-sm fw-bold small"
                                        for="one-time">{{ __('idea.steps.step3.types.one_time') }}</label>
                                </div>

                                {{-- one-time ranges --}}
                                @foreach (__('idea.steps.step3.one_time_ranges') as $id => $label)
                                    <div class="col-12 col-md-6">
                                        <input type="radio" class="btn-check" id="one-time-{{ $id }}"
                                            value="one-time-{{ $id }}" x-model="selectedRange"
                                            :disabled="selectedType !== 'one-time'" autocomplete="off">
                                        <label
                                            class="btn btn-outline-primary w-100 h-100 p-3
                                                      rounded-8 shadow-sm small fw-bold"
                                            for="one-time-{{ $id }}">{!! $label !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Annual Costs -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="annual" value="annual"
                                        x-model="selectedType" name="cost_type" autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3
                                                  rounded-8 shadow-sm fw-bold small"
                                        for="annual">{{ __('idea.steps.step3.types.annual') }}</label>
                                </div>

                                {{-- annual ranges --}}
                                @foreach (__('idea.steps.step3.annual_ranges') as $id => $label)
                                    <div class="col-12 col-md-6">
                                        <input type="radio" class="btn-check" id="annual-{{ $id }}"
                                            value="annual-{{ $id }}" x-model="selectedRange"
                                            :disabled="selectedType !== 'annual'" autocomplete="off">
                                        <label
                                            class="btn btn-outline-primary w-100 h-100 p-3
                                                      rounded-8 shadow-sm small fw-bold"
                                            for="annual-{{ $id }}">{!! $label !!}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
