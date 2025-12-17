<div x-data="{
    contribute_type: @entangle('data.contribute_type'),
    staff: @entangle('data.staff'),
    staff_person_money: @entangle('data.staff_person_money'),
    money_amount: @entangle('data.money_amount'),
    money_percent: @entangle('data.money_percent'),
    person_money_amount: @entangle('data.person_money_amount'),
    person_money_percent: @entangle('data.person_money_percent'),

    resetFields(type) {
        // امسح كل القيم القديمة
        this.money_amount = null;
        this.money_percent = null;
        this.person_money_amount = null;
        this.person_money_percent = null;
        this.staff = null;
        this.staff_person_money = null;

        this.contribute_type = type;
    }
}">
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step4.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        <div class="row g-3">

            <!-- بيع الفكرة -->
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-lg-7">
                            <input type="radio" class="btn-check" id="needs" wire:model="data.contribute_type"
                                x-model="contribute_type" @change="resetFields('sell')" value="sell"
                                name="contribute_type" autocomplete="off">
                            <label class="choice-component w-100" for="needs">
                                <span class="choice-text">{{ __('investor.steps.step4.sell') }}</span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- المساهمة بالفكرة فقط -->
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-lg-7">
                            <input type="radio" class="btn-check" id="contribute" wire:model="data.contribute_type"
                                x-model="contribute_type" @change="resetFields('idea')" value="idea"
                                name="contribute_type" autocomplete="off">
                            <label class="choice-component w-100" for="contribute">
                                <span class="choice-text">{{ __('investor.steps.step4.idea') }}</span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- المساهمة الشخصية -->
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <input type="radio" class="btn-check" id="contribute_person"
                                wire:model="data.contribute_type" x-model="contribute_type"
                                @change="resetFields('personal')" value="personal" name="contribute_type"
                                autocomplete="off">
                            <label class="choice-component w-100" for="contribute_person">
                                <span class="choice-text">{{ __('investor.steps.step4.personal') }}</span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="staff_yes"
                                        wire:model="data.staff" x-model="staff" value="full_time" name="staff">
                                    <label class="form-check-label w-100" for="staff_yes" style="cursor: pointer;">
                                        {{ __('investor.steps.step4.full_time') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="staff_no"
                                        wire:model="data.staff" x-model="staff" value="part_time" name="staff">
                                    <label class="form-check-label w-100" for="staff_no" style="cursor: pointer;">
                                        {{ __('investor.steps.step4.part_time') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="admin_only_no"
                                        wire:model="data.staff" x-model="staff" value="supervision" name="staff">
                                    <label class="form-check-label w-100" for="admin_only_no" style="cursor: pointer;">
                                        {{ __('investor.steps.step4.supervision') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- المساهمة برأس المال -->
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <input type="radio" class="btn-check" id="contribute_money"
                                wire:model="data.contribute_type" x-model="contribute_type"
                                @change="resetFields('capital')" value="capital" name="contribute_type"
                                autocomplete="off">
                            <label class="choice-component w-100" for="contribute_money">
                                <span class="choice-text">{{ __('investor.steps.step4.capital') }}</span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div
                                class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2">
                                <div class="number-input-wrapper">
                                    <label for="money_amount" class="number-input-label">
                                        {{ __('investor.steps.step4.amount') }}
                                    </label>
                                    <input type="number" class="number-input" id="money_amount"
                                        wire:model="data.money_amount" x-model="money_amount" name="money_amount"
                                        placeholder="$" />
                                </div>
                                <div class="number-input-wrapper">
                                    <label for="money_percent" class="number-input-label">
                                        {{ __('investor.steps.step4.percent') }}
                                    </label>
                                    <input type="number" class="number-input w-100" id="money_percent"
                                        wire:model="data.money_percent" x-model="money_percent" name="money_percent"
                                        placeholder="%" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- المساهمة الشخصية + رأس المال -->
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <input type="radio" class="btn-check" id="contribute_person_and_money"
                                wire:model="data.contribute_type" x-model="contribute_type"
                                @change="resetFields('both')" value="both" name="contribute_type"
                                autocomplete="off">
                            <label class="choice-component w-100" for="contribute_person_and_money">
                                <span class="choice-text">{{ __('investor.steps.step4.both') }}</span>
                                <div class="choice-radio-indicator">
                                    <i class="bi bi-check-lg fs-5"></i>
                                </div>
                            </label>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="d-flex flex-column gap-3">
                                <div
                                    class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2">
                                    <div class="number-input-wrapper">
                                        <label for="person_money_amount" class="number-input-label">
                                            {{ __('investor.steps.step4.amount') }}
                                        </label>
                                        <input type="number" class="number-input" id="person_money_amount"
                                            wire:model="data.person_money_amount" x-model="person_money_amount"
                                            name="person_money_amount" placeholder="$" />
                                    </div>
                                    <div class="number-input-wrapper">
                                        <label for="person_money_percent" class="number-input-label">
                                            {{ __('investor.steps.step4.percent') }}
                                        </label>
                                        <input type="number" class="number-input w-100" id="person_money_percent"
                                            wire:model="data.person_money_percent" x-model="person_money_percent"
                                            name="person_money_percent" placeholder="%" />
                                    </div>
                                </div>

                                <div class="options-section">
                                    <div class="option-item">
                                        <input type="radio" class="form-check-input m-0"
                                            id="staff_yes_person_money" wire:model="data.staff_person_money"
                                            x-model="staff_person_money" value="full_time" name="staff_person_money">
                                        <label class="form-check-label w-100" for="staff_yes_person_money"
                                            style="cursor: pointer;">
                                            {{ __('investor.steps.step4.full_time') }}
                                        </label>
                                    </div>
                                    <div class="option-item">
                                        <input type="radio" class="form-check-input m-0" id="staff_no_person_money"
                                            wire:model="data.staff_person_money" x-model="staff_person_money"
                                            value="part_time" name="staff_person_money">
                                        <label class="form-check-label w-100" for="staff_no_person_money"
                                            style="cursor: pointer;">
                                            {{ __('investor.steps.step4.part_time') }}
                                        </label>
                                    </div>
                                    <div class="option-item">
                                        <input type="radio" class="form-check-input m-0"
                                            id="admin_only_no_person_money" wire:model="data.staff_person_money"
                                            x-model="staff_person_money" value="supervision"
                                            name="staff_person_money">
                                        <label class="form-check-label w-100" for="admin_only_no_person_money"
                                            style="cursor: pointer;">
                                            {{ __('investor.steps.step4.supervision') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-center">
        @if ($errors->any())
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $errors->first() }}
            </span>
        @endif
    </div>
</div>
