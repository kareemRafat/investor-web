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
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step7.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- بيع الفكرة -->
                    <div class="col-12">
                        <div class="col-lg-7 col-12 my-2 ps-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-12 col-md-12">
                                    <input type="radio" class="btn-check" id="needs"
                                        wire:model="data.contribute_type" x-model="contribute_type"
                                        @change="resetFields('sell')" value="sell" name="contribute_type"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="needs">
                                        {{ __('idea.steps.step7.sell') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المساهمة بالفكرة فقط -->
                    <div class="col-12">
                        <div class="col-lg-7 col-12 mb-2 ps-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-12 col-md-12">
                                    <input type="radio" class="btn-check" id="contribute"
                                        wire:model="data.contribute_type" x-model="contribute_type"
                                        @change="resetFields('idea')" value="idea" name="contribute_type"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="contribute">
                                        {{ __('idea.steps.step7.idea') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المساهمة الشخصية -->
                    <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                        <div class="col-lg-7 col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-12 col-md-12">
                                    <input type="radio" class="btn-check" id="contribute_money"
                                        wire:model="data.contribute_type" x-model="contribute_type"
                                        @change="resetFields('personal')" value="personal" name="contribute_type"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="contribute_money">
                                        {{ __('idea.steps.step7.personal') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                            <div class="d-flex align-items-center gap-2 flex-wrap flex-lg-nowrap gap-md-3 gap-lg-4">
                                <div class="d-flex align-items-center gap-2">
                                    <input type="radio" class="form-check-input" id="staff_yes"
                                        wire:model="data.staff" x-model="staff" value="full_time" name="staff">
                                    <label class="form-check-label" for="staff_yes">
                                        {{ __('idea.steps.step7.full_time') }}
                                    </label>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="radio" class="form-check-input" id="staff_no"
                                        wire:model="data.staff" x-model="staff" value="part_time" name="staff">
                                    <label class="form-check-label" for="staff_no">
                                        {{ __('idea.steps.step7.part_time') }}
                                    </label>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="radio" class="form-check-input" id="admin_only_no"
                                        wire:model="data.staff" x-model="staff" value="supervision" name="staff">
                                    <label class="form-check-label" for="admin_only_no">
                                        {{ __('idea.steps.step7.supervision') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- المساهمة برأس المال -->
                    <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                        <div class="col-lg-7 col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-12 col-md-12">
                                    <input type="radio" class="btn-check" id="contribute_person"
                                        wire:model="data.contribute_type" x-model="contribute_type"
                                        @change="resetFields('capital')" value="capital" name="contribute_type"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="contribute_person">
                                        {{ __('idea.steps.step7.capital') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <label for="money_amount" class="text-primary fw-bold fs-5">
                                        {{ __('idea.steps.step7.amount') }}
                                    </label>
                                    <input type="number" class="form-control py-3 rounded-8" id="money_amount"
                                        wire:model="data.money_amount" x-model="money_amount" name="money_amount"
                                        placeholder="$" />
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <label for="money_percent" class="text-primary fw-bold fs-5">
                                        {{ __('idea.steps.step7.percent') }}
                                    </label>
                                    <input type="number" class="form-control py-3 rounded-8" id="money_percent"
                                        wire:model="data.money_percent" x-model="money_percent" name="money_percent"
                                        placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المساهمة الشخصية + رأس المال -->
                    <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                        <div class="col-lg-7 col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-12 col-md-12">
                                    <input type="radio" class="btn-check" id="contribute_person_and_money"
                                        wire:model="data.contribute_type" x-model="contribute_type"
                                        @change="resetFields('both')" value="both" name="contribute_type"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="contribute_person_and_money">
                                        {{ __('idea.steps.step7.both') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                            <div
                                class="d-flex align-items-center justify-content-between flex-wrap flex-lg-nowrap gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <label for="person_money_amount" class="text-primary fw-bold fs-5">
                                            {{ __('idea.steps.step7.amount') }}
                                        </label>
                                        <input type="number" class="form-control py-3 rounded-8"
                                            id="person_money_amount" wire:model="data.person_money_amount"
                                            x-model="person_money_amount" name="person_money_amount"
                                            placeholder="$" />
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <label for="person_money_percent" class="text-primary fw-bold fs-5">
                                            {{ __('idea.steps.step7.percent') }}
                                        </label>
                                        <input type="number" class="form-control py-3 rounded-8"
                                            id="person_money_percent" wire:model="data.person_money_percent"
                                            x-model="person_money_percent" name="person_money_percent"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" class="form-check-input" id="staff_yes_person_money"
                                            wire:model="data.staff_person_money" x-model="staff_person_money"
                                            value="full_time" name="staff_person_money">
                                        <label class="form-check-label" for="staff_yes_person_money">
                                            {{ __('idea.steps.step7.full_time') }}
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" class="form-check-input" id="staff_no_person_money"
                                            wire:model="data.staff_person_money" x-model="staff_person_money"
                                            value="part_time" name="staff_person_money">
                                        <label class="form-check-label" for="staff_no_person_money">
                                            {{ __('idea.steps.step7.part_time') }}
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" class="form-check-input"
                                            id="admin_only_no_person_money" wire:model="data.staff_person_money"
                                            x-model="staff_person_money" value="supervision"
                                            name="staff_person_money">
                                        <label class="form-check-label" for="admin_only_no_person_money">
                                            {{ __('idea.steps.step7.supervision') }}
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
    {{-- Errors --}}
    <div class="d-flex flex-column align-items-center mt-2">
        @if ($errors->any())
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold">
                {{ $errors->first() }}
            </span>
        @endif
    </div>
</div>
