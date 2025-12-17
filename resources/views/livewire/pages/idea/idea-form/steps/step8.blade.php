<div x-data="{
    return_type: @entangle('data.return_type'),
    activeColumn: @entangle('data.return_type'),
    expanded: null,
    isMobile: window.innerWidth < 992,
    toggle(column) {
        if (this.isMobile) {
            this.expanded = this.expanded === column ? null : column;
        }
    },
    clearOther(type) {
        this.activeColumn = type;
        if (type !== 'profit') {
            $wire.set('data.profit_only_percentage', null);
        }
        if (type !== 'one_time') {
            $wire.set('data.one_time_dollar', null);
            $wire.set('data.one_time_sar', null);
        }
        if (type !== 'combo') {
            $wire.set('data.combo_dollar', null);
            $wire.set('data.combo_sar', null);
            $wire.set('data.combo_percentage', null);
        }
    }
}" x-init="window.addEventListener('resize', () => isMobile = window.innerWidth < 992)">

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step8.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
        <div class="row g-3">

            {{-- Profit Share --}}
            <div class="col-lg-4 col-md-6 col-12">
                <div class="requirement-row h-100">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="radio" class="btn-check" id="profit_only" wire:model="data.return_type"
                                value="profit" @change="clearOther('profit')">
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
                                            value="{{ $percent }}" wire:model="data.profit_only_percentage"
                                            name="profit_only_percentage" :disabled="activeColumn !== 'profit'">
                                        <label class="choice-component range-variant w-100"
                                            :class="{ 'disabled': activeColumn !== 'profit' }"
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
                <div class="requirement-row h-100">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="radio" class="btn-check" id="one_time" wire:model="data.return_type"
                                value="one_time" @change="clearOther('one_time')">
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
                                            <input type="number" class="number-input" wire:model="data.one_time_dollar"
                                                placeholder="$" :disabled="activeColumn !== 'one_time'">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="flex: 0 0 40%;">
                                            <span class="currency-label">{{ __('idea.currency.sar') }}</span>
                                        </div>
                                        <div style="flex: 1;">
                                            <input type="number" class="number-input" wire:model="data.one_time_sar"
                                                placeholder="﷼" :disabled="activeColumn !== 'one_time'">
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
                <div class="requirement-row h-100">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="radio" class="btn-check" id="combo" wire:model="data.return_type"
                                value="combo" @change="clearOther('combo')">
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
                                            <input type="number" class="number-input" wire:model="data.combo_dollar"
                                                placeholder="$" :disabled="activeColumn !== 'combo'">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="flex: 0 0 40%;">
                                            <span class="currency-label">{{ __('idea.currency.sar') }}</span>
                                        </div>
                                        <div style="flex: 1;">
                                            <input type="number" class="number-input" wire:model="data.combo_sar"
                                                placeholder="﷼" :disabled="activeColumn !== 'combo'">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <div class="row g-2">
                                        @foreach ([5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75] as $percent)
                                            <div class="col-6 {{ $percent == 75 ? 'col-12' : '' }}">
                                                <input type="radio" class="btn-check"
                                                    id="combo_percentage_{{ $percent }}"
                                                    value="{{ $percent }}" wire:model="data.combo_percentage"
                                                    :disabled="activeColumn !== 'combo'">
                                                <label class="choice-component range-variant w-100"
                                                    :class="{ 'disabled': activeColumn !== 'combo' }"
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
    <div class="d-flex justify-content-center mt-3">
        @if ($errors->any())
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold">
                {{ $errors->first() }}
            </span>
        @endif
    </div>
</div>
