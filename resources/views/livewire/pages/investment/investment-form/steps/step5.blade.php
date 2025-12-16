<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step5.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        {{-- Disable All --}}
        <div class="d-flex align-items-center gap-3 mb-4 p-2 rounded-3"
            style="background: #f5f2fe; border: 2px solid #afa5fc;">
            <input type="checkbox" id="disable_resources" wire:model.live="disableResources" class="form-check-input">
            <label for="disable_resources" class="fw-bold text-primary mb-0" style="cursor: pointer; font-size: 15px;">
                {{ __('investor.steps.step5.checkbox') }}
            </label>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="row g-3">
                @foreach ($moneyRanges as $index => $range)
                    <div class="col-12 col-md-3">
                        <input type="radio" class="btn-check" wire:model="data.money_contributions"
                            id="amount-{{ $range->id }}" value="{{ $range->id }}" autocomplete="off"
                            @disabled($disableResources)>
                        <label class="choice-component range-variant w-100" for="amount-{{ $range->id }}">
                            <span class="choice-text">
                                {!! app()->getLocale() === 'ar' ? $range->label_ar : $range->label_en !!}
                            </span>
                            <i class="bi bi-check-circle-fill check-indicator"></i>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- errors --}}
    <div class="d-flex justify-content-center">
        @if ($errors->any())
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $errors->first() }}
            </span>
        @endif
    </div>
</div>
