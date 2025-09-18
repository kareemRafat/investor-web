<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header
        title="{{ __('idea.steps.step8.title') }}"
        subtitle="{{ __('idea.steps.step8.subtitle') }}" />

    <div x-data="{ activeColumn: @entangle('data.return_type') }"
         class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- Profit Share -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="h-100">
                            <div class="bg-light rounded-8 shadow-sm text-center mb-3">
                                <input type="radio"
                                       class="btn-check"
                                       id="profit_only"
                                       wire:model="data.return_type"
                                       value="profit">
                                <label class="btn btn-outline-primary w-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small
                                    {{ $data['return_type'] === 'profit' ? 'active' : '' }}"
                                    for="profit_only">
                                    {{ __('idea.steps.step8.profit_share') }}
                                </label>
                            </div>

                            <div class="row mx-0 px-0 g-2">
                                @foreach ([5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75] as $percent)
                                    <div class="col-6 {{ $percent == 75 ? 'col-12' : '' }}">
                                        <div class="bg-light rounded-8 shadow-sm text-center">
                                            <input type="radio"
                                                   class="btn-check"
                                                   id="profit_only_{{ $percent }}"
                                                   value="{{ $percent }}"
                                                   wire:model="data.profit_only_percentage"
                                                   name="profit_only_percentage"
                                                   :disabled="activeColumn !== 'profit'">
                                            <label class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                   for="profit_only_{{ $percent }}">
                                                {{ $percent }} %
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- One-time sum -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="h-100">
                            <div class="bg-light rounded-8 shadow-sm text-center mb-3">
                                <input type="radio"
                                       class="btn-check"
                                       id="one_time"
                                       wire:model="data.return_type"
                                       value="one_time">
                                <label class="btn btn-outline-primary w-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small
                                    {{ $data['return_type'] === 'one_time' ? 'active' : '' }}"
                                    for="one_time">
                                    {{ __('idea.steps.step8.one_time_sum') }}
                                </label>
                            </div>

                            <div class="row g-2 mx-0 px-0 d-flex flex-column">
                                <!-- Dollar -->
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="col-5">
                                        <span class="w-100 btn btn-outline-custom rounded-4 py-3">
                                            {{ __('idea.currency.dollar') }}
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <input type="number"
                                               class="form-control py-3 rounded-8"
                                               id="one_time_dollar"
                                               wire:model="data.one_time_dollar"
                                               :disabled="activeColumn !== 'one_time'" />
                                    </div>
                                </div>

                                <!-- SAR -->
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="col-5">
                                        <span class="w-100 btn btn-outline-custom rounded-4 py-3">
                                            {{ __('idea.currency.sar') }}
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <input type="number"
                                               class="form-control py-3 rounded-8"
                                               id="one_time_sar"
                                               wire:model="data.one_time_sar"
                                               :disabled="activeColumn !== 'one_time'" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Combo -->
                    <div class="col-lg-4 col-md-12 col-12 mb-3">
                        <div class="h-100">
                            <div class="bg-light rounded-8 shadow-sm text-center mb-3">
                                <input type="radio"
                                       class="btn-check"
                                       id="combo"
                                       wire:model="data.return_type"
                                       value="combo">
                                <label class="btn btn-outline-primary w-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small
                                    {{ $data['return_type'] === 'combo' ? 'active' : '' }}"
                                    for="combo">
                                    {{ __('idea.steps.step8.profit_plus_sum') }}
                                </label>
                            </div>

                            <div class="row g-2 mx-0 px-0 d-flex flex-column">
                                <!-- Dollar -->
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="col-5">
                                        <span class="w-100 btn btn-outline-custom rounded-4 py-3">
                                            {{ __('idea.currency.dollar') }}
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <input type="number"
                                               class="form-control py-3 rounded-8"
                                               id="combo_dollar"
                                               wire:model="data.combo_dollar"
                                               :disabled="activeColumn !== 'combo'" />
                                    </div>
                                </div>

                                <!-- SAR -->
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="col-5">
                                        <span class="w-100 btn btn-outline-custom rounded-4 py-3">
                                            {{ __('idea.currency.sar') }}
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <input type="number"
                                               class="form-control py-3 rounded-8"
                                               id="combo_sar"
                                               wire:model="data.combo_sar"
                                               :disabled="activeColumn !== 'combo'" />
                                    </div>
                                </div>

                                @error('data.combo_sar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mx-0 px-0 g-2 mt-2">
                                @foreach ([5,10,15,20,25,30,35,40,45,50,55,60,65,70,75] as $percent)
                                    <div class="col-6 {{ $percent == 75 ? 'col-12' : '' }}">
                                        <div class="bg-light rounded-8 shadow-sm text-center">
                                            <input type="radio"
                                                   class="btn-check"
                                                   id="combo_percentage_{{ $percent }}"
                                                   value="{{ $percent }}"
                                                   wire:model="data.combo_percentage"
                                                   :disabled="activeColumn !== 'combo'">
                                            <label class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                   for="combo_percentage_{{ $percent }}">
                                                {{ $percent }} %
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Errors --}}
    <div class="d-flex justify-content-center mt-3">
        @if ($errors->any())
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold">
                {{ $errors->first() }}
            </span>
        @endif
    </div>
</div>
