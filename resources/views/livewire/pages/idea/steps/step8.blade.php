<div x-init="window.addEventListener('resize', () => isMobile = window.innerWidth < 992)">

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step8.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
        <div class="row g-3">

            {{-- Profit Share --}}
            <div class="col-lg-4 col-md-6 col-12">
                <div class="requirement-row h-100 @error('state.step8.data.profit_only_percentage') choice-invalid @enderror @error('state.step8.data') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step8.data.profit_only_percentage'] || errors['state.step8.data'] }">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="radio" class="btn-check" id="profit_only" x-model="state.step8.data.return_type"
                                value="profit" @change="clearStep8('profit')">
                            <label class="choice-component cost-variant w-100" for="profit_only"
                                @click.stop="toggle('profit')">
                                <span class="choice-text">{{ __('idea.steps.step8.profit_share') }}</span>
                                <span class="d-lg-none mobile-arrow" x-text="expanded === 'profit' ? '▲' : '▼'"></span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>

                        <div class="col-12" x-show="!isMobile || expanded === 'profit'" x-collapse.duration.200ms>
                            <div class="row g-2">
                                @foreach ([5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75] as $percent)
                                    <div class="col-6 {{ $percent == 75 ? 'col-12' : '' }}">
                                        <input type="radio" class="btn-check" id="profit_only_{{ $percent }}"
                                            value="{{ $percent }}" x-model="state.step8.data.profit_only_percentage"
                                            name="profit_only_percentage" :disabled="state.step8.data.return_type !== 'profit'">
                                        <label class="choice-component range-variant w-100"
                                            :class="{ 'disabled': state.step8.data.return_type !== 'profit' }"
                                            for="profit_only_{{ $percent }}">
                                            <span class="choice-text">{{ $percent }} %</span>
                                            <div class="choice-radio-indicator">
                                                <i class="bi bi-check-lg fs-5"></i>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- One-time sum --}}
            <div class="col-lg-4 col-md-6 col-12">
                <div class="requirement-row h-100 @error('state.step8.data.one_time_dollar') choice-invalid @enderror @error('state.step8.data.one_time_sar') choice-invalid @enderror @error('state.step8.one_time') choice-invalid @enderror @error('state.step8.data') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step8.data.one_time_dollar'] || errors['state.step8.data.one_time_sar'] || errors['state.step8.one_time'] || errors['state.step8.one_time_dollar'] || errors['state.step8.one_time_sar'] || errors['state.step8.data'] }">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="radio" class="btn-check" id="one_time" x-model="state.step8.data.return_type"
                                value="one_time" @change="clearStep8('one_time')">
                            <label class="choice-component cost-variant w-100" for="one_time"
                                @click.stop="toggle('one_time')">
                                <span class="choice-text">{{ __('idea.steps.step8.one_time_sum') }}</span>
                                <span class="d-lg-none mobile-arrow"
                                    x-text="expanded === 'one_time' ? '▲' : '▼'"></span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>

                        <div class="col-12" x-show="!isMobile || expanded === 'one_time'" x-collapse.duration.200ms>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="flex: 0 0 40%;">
                                            <span class="currency-label">{{ __('idea.currency.dollar') }}</span>
                                        </div>
                                        <div style="flex: 1;">
                                            <input type="number" class="number-input" x-model="state.step8.data.one_time_dollar"
                                                placeholder="$" :disabled="state.step8.data.return_type !== 'one_time'">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="flex: 0 0 40%;">
                                            <span class="currency-label">{{ __('idea.currency.sar') }}</span>
                                        </div>
                                        <div style="flex: 1;">
                                            <input type="number" class="number-input" x-model="state.step8.data.one_time_sar"
                                                placeholder="﷼" :disabled="state.step8.data.return_type !== 'one_time'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Combo --}}
            <div class="col-lg-4 col-md-12 col-12">
                <div class="requirement-row h-100 @error('state.step8.data.combo_dollar') choice-invalid @enderror @error('state.step8.data.combo_sar') choice-invalid @enderror @error('state.step8.data.combo_percentage') choice-invalid @enderror @error('state.step8.combo') choice-invalid @enderror @error('state.step8.data') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step8.data.combo_dollar'] || errors['state.step8.data.combo_sar'] || errors['state.step8.data.combo_percentage'] || errors['state.step8.combo'] || errors['state.step8.combo_percentage'] || errors['state.step8.combo_currency'] || errors['state.step8.data'] }">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="radio" class="btn-check" id="combo" x-model="state.step8.data.return_type"
                                value="combo" @change="clearStep8('combo')">
                            <label class="choice-component cost-variant w-100" for="combo"
                                @click.stop="toggle('combo')">
                                <span class="choice-text">{{ __('idea.steps.step8.profit_plus_sum') }}</span>
                                <span class="d-lg-none mobile-arrow" x-text="expanded === 'combo' ? '▲' : '▼'"></span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>

                        <div class="col-12" x-show="!isMobile || expanded === 'combo'" x-collapse.duration.200ms>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="flex: 0 0 40%;">
                                            <span class="currency-label">{{ __('idea.currency.dollar') }}</span>
                                        </div>
                                        <div style="flex: 1;">
                                            <input type="number" class="number-input" x-model="state.step8.data.combo_dollar"
                                                placeholder="$" :disabled="state.step8.data.return_type !== 'combo'">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="flex: 0 0 40%;">
                                            <span class="currency-label">{{ __('idea.currency.sar') }}</span>
                                        </div>
                                        <div style="flex: 1;">
                                            <input type="number" class="number-input" x-model="state.step8.data.combo_sar"
                                                placeholder="﷼" :disabled="state.step8.data.return_type !== 'combo'">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <div class="row g-2">
                                        @foreach ([5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75] as $percent)
                                            <div class="col-6 {{ $percent == 75 ? 'col-12' : '' }}">
                                                <input type="radio" class="btn-check"
                                                    id="combo_percentage_{{ $percent }}"
                                                    value="{{ $percent }}" x-model="state.step8.data.combo_percentage"
                                                    :disabled="state.step8.data.return_type !== 'combo'">
                                                <label class="choice-component range-variant w-100"
                                                    :class="{ 'disabled': state.step8.data.return_type !== 'combo' }"
                                                    for="combo_percentage_{{ $percent }}">
                                                    <span class="choice-text">{{ $percent }} %</span>
                                                    <div class="choice-radio-indicator">
                                                        <i class="bi bi-check-lg fs-5"></i>
                                                    </div>
                                                </label>
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
    </div>

    {{-- Errors --}}
    <div class="d-flex flex-column align-items-center mt-3">
        @php
            $step8ErrorKeys = [
                'state.step8.data.profit_only_percentage',
                'state.step8.data.one_time_dollar',
                'state.step8.data.one_time_sar',
                'state.step8.data.combo_dollar',
                'state.step8.data.combo_sar',
                'state.step8.data.combo_percentage',
                'state.step8.data',
                'state.step8.one_time',
                'state.step8.combo',
            ];
        @endphp
        @foreach ($step8ErrorKeys as $errorKey)
            @error($errorKey)
                <div class="field-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>{{ $message }}</span>
                </div>
            @enderror
        @endforeach
        <div x-show="errors['state.step8.data.profit_only_percentage']" class="field-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span x-text="errors['state.step8.data.profit_only_percentage']"></span>
        </div>
        <div x-show="errors['state.step8.one_time_dollar'] || errors['state.step8.one_time_sar'] || errors['state.step8.one_time']" class="field-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span x-text="errors['state.step8.one_time_dollar'] || errors['state.step8.one_time_sar'] || errors['state.step8.one_time']"></span>
        </div>
        <div x-show="errors['state.step8.combo_dollar'] || errors['state.step8.combo_sar'] || errors['state.step8.combo_percentage'] || errors['state.step8.combo'] || errors['state.step8.combo_currency']" class="field-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span x-text="errors['state.step8.combo_dollar'] || errors['state.step8.combo_sar'] || errors['state.step8.combo_percentage'] || errors['state.step8.combo'] || errors['state.step8.combo_currency']"></span>
        </div>
        <div x-show="errors['state.step8.data']" class="field-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span x-text="errors['state.step8.data']"></span>
        </div>
    </div>
</div>
