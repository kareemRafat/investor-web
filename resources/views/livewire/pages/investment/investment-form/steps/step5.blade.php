<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step5.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        {{-- Disable All --}}
        <div class="d-flex align-items-center gap-2 mb-1">
            <input type="checkbox" id="disable_resources" wire:model.live="disableResources" class="form-check-input">
            <label for="disable_resources" class="fw-bold text-danger">
                {{ __('investor.steps.step5.checkbox') }}
            </label>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <!-- الخيارات الثلاثة كـ radio buttons -->
                {{-- <div class="row g-3">
                    <div class="col-12 col-lg-4 col-md-4 position-relative">
                        <input type="radio" class="btn-check" wire:model="investmentType" id="money-only" value="money"
                            autocomplete="off" name="investmentType">
                        <label
                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold text-center"
                            for="money-only">
                            {{ __('investor.steps.step5.amounts_of_money') }}
                        </label>
                    </div>

                    <div class="col-12 col-lg-4 col-md-4 position-relative">
                        <input type="radio" class="btn-check" wire:model="investmentType" id="supplier-only"
                            value="supplier" autocomplete="off" name="investmentType">
                        <label
                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold text-center"
                            for="supplier-only">
                            {{ __('investor.steps.step5.resources') }}
                        </label>
                    </div>

                    <div class="col-12 col-lg-4 col-md-4 position-relative">
                        <input type="radio" class="btn-check" wire:model="investmentType" id="money-supplier"
                            value="both" autocomplete="off" name="investmentType">
                        <label
                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold text-center"
                            for="money-supplier">
                            {{ __('investor.steps.step5.amounts_of_money_resources') }}
                        </label>
                    </div>
                </div> --}}
            </div>
            <div class="row g-3">
                @foreach ($moneyRanges as $index =>  $range)
                    <div class="col-12 col-md-3">
                        <input type="radio" class="btn-check" wire:model="data.money_contributions"
                            id="amount-{{ $range->id }}" value="{{ $range->id }}"  autocomplete="off"
                            @disabled($disableResources)>
                        <label
                            class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center
                         p-3 rounded-8 shadow-sm text-center fw-bold small position-relative"
                            for="amount-{{ $range->id }}">
                            <span class="px-2 small">
                                {!! app()->getLocale() === 'ar' ? $range->label_ar : $range->label_en !!}
                            </span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
