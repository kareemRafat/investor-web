<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step4.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <!-- Right List -->
                    <div class="col-12">
                        <div class="h-100 py-3">
                            <div class="row">
                                <!-- بيع الفكرة -->
                                <div class="col-lg-6 col-12 my-3 ps-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <input type="radio" class="btn-check" id="needs"
                                                wire:model="data.contribute_type" value="sell" name="contribute_type"
                                                autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="needs">
                                                {{ __('investor.steps.step4.sell') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- المساهمة بالفكرة فقط -->
                                <div class="col-lg-6 col-12 my-1 ps-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <input type="radio" class="btn-check" id="contribute"
                                                wire:model="data.contribute_type" value="idea" name="contribute_type"
                                                autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="contribute">
                                                {{ __('investor.steps.step4.idea') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- المساهمة الشخصية -->
                            <div class="row mx-0 px-0 my-3 align-items-center justify-content-between">
                                <div class="col-lg-6 col-12">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <input type="radio" class="btn-check" id="contribute_person"
                                            wire:model="data.contribute_type" value="capital" name="contribute_type"
                                            autocomplete="off">
                                        <label
                                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                            for="contribute_person">
                                            {{ __('investor.steps.step4.capital') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0 d-flex justify-content-start">
                                    <div class="d-flex align-items-center gap-2 flex-wrap gap-md-3 gap-lg-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="staff_yes"
                                                wire:model="data.staff" value="full_time" name="staff">
                                            <label class="form-check-label" for="staff_yes">
                                                {{ __('investor.steps.step4.full_time') }}
                                            </label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="staff_no"
                                                wire:model="data.staff" value="part_time" name="staff">
                                            <label class="form-check-label" for="staff_no">
                                                {{ __('investor.steps.step4.part_time') }}
                                            </label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="admin_only_no"
                                                wire:model="data.staff" value="supervision" name="staff">
                                            <label class="form-check-label" for="admin_only_no">
                                                {{ __('investor.steps.step4.supervision') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- المساهمة برأس المال -->
                            <div class="row mx-0 px-0 my-3 align-items-center justify-content-between">
                                <div class="col-lg-6 col-12">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <input type="radio" class="btn-check" id="contribute_money"
                                            wire:model="data.contribute_type" value="personal" name="contribute_type"
                                            autocomplete="off">
                                        <label
                                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                            for="contribute_money">
                                            {{ __('investor.steps.step4.personal') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            <label for="money_amount" class="text-primary fw-bold fs-5">
                                                {{ __('investor.steps.step4.amount') }}
                                            </label>
                                            <input type="number" class="form-control py-3 rounded-8" id="money_amount"
                                                wire:model="data.money_amount" name="money_amount" placeholder="" />
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            <label for="money_percent" class="text-primary fw-bold fs-5">
                                                {{ __('investor.steps.step4.percent') }}
                                            </label>
                                            <input type="number" class="form-control py-3 rounded-8"
                                                id="money_percent" wire:model="data.money_percent"
                                                name="money_percent" placeholder="" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- المساهمة الشخصية + رأس المال -->
                            <div class="row mx-0 px-0 my-3 align-items-center justify-content-between">
                                <div class="col-lg-6 col-12">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <input type="radio" class="btn-check" id="contribute_person_and_money"
                                            wire:model="data.contribute_type" value="both" name="contribute_type"
                                            autocomplete="off">
                                        <label
                                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                            for="contribute_person_and_money">
                                            {{ __('investor.steps.step4.both') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                    <div
                                        class="d-flex align-items-center justify-content-between flex-wrap flex-lg-nowrap gap-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex justify-content-center align-items-center gap-3">
                                                <label for="person_money_amount" class="text-primary fw-bold fs-5">
                                                    {{ __('investor.steps.step4.amount') }}
                                                </label>
                                                <input type="number" class="form-control py-3 rounded-8"
                                                    id="person_money_amount" wire:model="data.person_money_amount"
                                                    name="person_money_amount" placeholder="" />
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center gap-3">
                                                <label for="person_money_percent" class="text-primary fw-bold fs-5">
                                                    {{ __('investor.steps.step4.percent') }}
                                                </label>
                                                <input type="number" class="form-control py-3 rounded-8"
                                                    id="person_money_percent" wire:model="data.person_money_percent"
                                                    name="person_money_percent" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input"
                                                    id="staff_yes_person_money" wire:model="data.staff_person_money"
                                                    value="full_time" name="staff_person_money">
                                                <label class="form-check-label" for="staff_yes_person_money">
                                                    {{ __('investor.steps.step4.full_time') }}
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input"
                                                    id="staff_no_person_money" wire:model="data.staff_person_money"
                                                    value="part_time" name="staff_person_money">
                                                <label class="form-check-label" for="staff_no_person_money">
                                                    {{ __('investor.steps.step4.part_time') }}
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input"
                                                    id="admin_only_no_person_money"
                                                    wire:model="data.staff_person_money" value="supervision"
                                                    name="staff_person_money">
                                                <label class="form-check-label" for="admin_only_no_person_money">
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
        </div>
    </div>


    @if ($errors->any())
        <div class="text-danger text-center fw-bold mt-2">
            {{ $errors->first() }}
        </div>
    @endif

</div>
