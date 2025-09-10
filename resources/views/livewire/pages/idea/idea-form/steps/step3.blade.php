<div
    x-data="{
        selectedType: @entangle('profit_type'),
        selectedRange: @entangle('profit_range'),
    }"
    x-init="
        $watch('selectedType', () => {
            selectedRange = null;
            $wire.set('profit_range', null);
        })
    "
>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="The estimated cost of implementing the idea" />

    {{-- error --}}
    @error('profit_type')
        <div class="text-danger small fw-bold mt-1">{{ $message }}</div>
    @enderror
    @error('profit_range')
        <div class="text-danger small fw-bold mt-1">{{ $message }}</div>
    @enderror

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
                                        x-model="selectedType"
                                        name="profit_type" autocomplete="off">
                                    <label class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3
                                                  rounded-8 shadow-sm fw-bold small"
                                        for="one-time">One-time Profits</label>
                                </div>

                                {{-- one-time ranges --}}
                                @foreach ([
                                    'one-time-1' => '$1,000 to $5,000<br>(3,700 to 18,500 SAR)',
                                    'one-time-2' => '$6,000 to $10,000<br>(22,200 to 37,000 SAR)',
                                    'one-time-3' => '$51,000 to $100,000<br>(188,800 to 370,000 SAR)',
                                    'one-time-4' => '$101,000 to $250,000<br>(374,000 to 925,750 SAR)',
                                    'one-time-5' => '$1 million to $2 million<br>(3.7m to 7.4m SAR)',
                                    'one-time-6' => '$2 million to $5 million<br>(7.4m to 18.5m SAR)',
                                    'one-time-7' => '$50 million to $100 million<br>(185m to 370m SAR)',
                                ] as $id => $label)
                                    <div class="col-12 col-md-6">
                                        <input type="radio" class="btn-check"
                                            id="{{ $id }}" value="{{ $id }}"
                                            x-model="selectedRange"
                                            :disabled="selectedType !== 'one-time'"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary w-100 h-100 p-3
                                                      rounded-8 shadow-sm small fw-bold"
                                            for="{{ $id }}">{!! $label !!}</label>
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
                                        x-model="selectedType"
                                        name="profit_type" autocomplete="off">
                                    <label class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3
                                                  rounded-8 shadow-sm fw-bold small"
                                        for="annual">Annual Profits</label>
                                </div>

                                {{-- annual ranges --}}
                                @foreach ([
                                    'annual-1' => '$11,000 to $20,000<br>(40,700 to 74,000 SAR)',
                                    'annual-2' => '$21,000 to $50,000<br>(77,700 to 185,000 SAR)',
                                    'annual-3' => '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)',
                                    'annual-4' => '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)',
                                    'annual-5' => '$5 million to $10 million<br>(18.5m to 37m SAR)',
                                    'annual-6' => '$10 million to $50 million<br>(37m to 185m SAR)',
                                    'annual-7' => 'More than $100 million<br>(More than 370m SAR)',
                                ] as $id => $label)
                                    <div class="col-12 col-md-6">
                                        <input type="radio" class="btn-check"
                                            id="{{ $id }}" value="{{ $id }}"
                                            x-model="selectedRange"
                                            :disabled="selectedType !== 'annual'"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary w-100 h-100 p-3
                                                      rounded-8 shadow-sm small fw-bold"
                                            for="{{ $id }}">{!! $label !!}</label>
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
