<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step5.subtitle') }}"
        :currentStep="$currentStep"
        :totalSteps="$totalSteps" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        {{-- Disable All --}}
        <div class="d-flex align-items-center gap-3 mb-4 p-2 rounded-3"
            style="background: #f5f2fe; border: 2px solid #afa5fc;">
            <input type="checkbox" id="disable_resources" wire:model.live="state.step5.disableResources" class="form-check-input">
            <label for="disable_resources" class="fw-bold text-primary mb-0" style="cursor: pointer; font-size: 15px;">
                {{ __('investor.steps.step5.checkbox') }}
            </label>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="row g-3">
                @foreach ($moneyRanges as $index => $range)
                    <div class="col-12 col-md-3">
                        <input type="radio" class="btn-check" wire:model="state.step5.data.money_contributions"
                            id="amount-{{ $range->value }}" value="{{ $range->value }}" autocomplete="off"
                            @disabled($state['step5']['disableResources'])>
                        <label class="choice-component range-variant w-100" for="amount-{{ $range->value }}">
                            <span class="choice-text">
                                {!! $range->label() !!}
                            </span>
                            <div class="choice-radio-indicator">
                                <i class="bi bi-check-lg fs-5"></i>
                            </div>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex flex-column align-items-center mt-3">
        @if ($errors->any())
            <div class="error-alert-custom">
                <i class="bi bi-exclamation-circle-fill fs-5"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif
        <div x-show="Object.keys(errors).length > 0" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="Object.values(errors)[0]"></span>
        </div>
    </div>
</div>
