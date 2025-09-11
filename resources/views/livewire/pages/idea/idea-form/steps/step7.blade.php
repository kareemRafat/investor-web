<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step7.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- بيع الفكرة -->
                    <div class="col-lg-7 col-12 my-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="col-12 col-lg-9 col-md-12">
                                <input type="radio" class="btn-check" id="needs" wire:model="data.contribute_type"
                                    value="sell" name="contribute_type" autocomplete="off">
                                <label
                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                    for="needs">
                                    {{ __('idea.steps.step7.sell') }}
                                </label>
                            </div>
                        </div>
                        @error('data.contribute_type')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- المساهمة بالفكرة فقط -->
                    <div class="col-lg-7 col-12 my-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="col-12 col-lg-9 col-md-12">
                                <input type="radio" class="btn-check" id="contribute"
                                    wire:model="data.contribute_type" value="idea" name="contribute_type"
                                    autocomplete="off">
                                <label
                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                    for="contribute">
                                    {{ __('idea.steps.step7.idea') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- المساهمة برأس المال -->
                    <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                        <div class="col-lg-7 col-12">
                            <div class="col-12 col-lg-9 col-md-12">
                                <input type="radio" class="btn-check" id="contribute_person"
                                    wire:model="data.contribute_type" value="capital" name="contribute_type"
                                    autocomplete="off">
                                <label
                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                    for="contribute_person">
                                    {{ __('idea.steps.step7.capital') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                            <div class="d-flex align-items-center gap-2 flex-wrap gap-md-3 gap-lg-4">
                                <div class="d-flex align-items-center gap-2">
                                    <input type="radio" class="form-check-input" id="staff_yes"
                                        wire:model="data.staff" value="full_time" name="staff">
                                    <label class="form-check-label" for="staff_yes">
                                        {{ __('idea.steps.step7.full_time') }}
                                    </label>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="radio" class="form-check-input" id="staff_no"
                                        wire:model="data.staff" value="part_time" name="staff">
                                    <label class="form-check-label" for="staff_no">
                                        {{ __('idea.steps.step7.part_time') }}
                                    </label>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="radio" class="form-check-input" id="admin_only_no"
                                        wire:model="data.staff" value="supervision" name="staff">
                                    <label class="form-check-label" for="admin_only_no">
                                        {{ __('idea.steps.step7.supervision') }}
                                    </label>
                                </div>
                            </div>
                            @error('data.staff')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- المساهمة الشخصية -->
                    <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                        <div class="col-lg-7 col-12">
                            <div class="col-12 col-lg-9 col-md-12">
                                <input type="radio" class="btn-check" id="contribute_money"
                                    wire:model="data.contribute_type" value="personal" name="contribute_type"
                                    autocomplete="off">
                                <label
                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                    for="contribute_money">
                                    {{ __('idea.steps.step7.personal') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <label for="money_amount" class="text-primary fw-bold fs-5">
                                        {{ __('idea.steps.step7.amount') }}
                                    </label>
                                    <input type="number" class="form-control py-3 rounded-8" id="money_amount"
                                        wire:model="data.money_amount" name="money_amount" placeholder="" />
                                    @error('data.money_amount')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="money_percent" class="text-primary fw-bold fs-5">
                                        {{ __('idea.steps.step7.percent') }}
                                    </label>
                                    <input type="number" class="form-control py-3 rounded-8" id="money_percent"
                                        wire:model="data.money_percent" name="money_percent" placeholder="" />
                                    @error('data.money_percent')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- المساهمة الشخصية + رأس المال -->
                    <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                        <div class="col-lg-7 col-12">
                            <div class="col-12 col-lg-9 col-md-12">
                                <input type="radio" class="btn-check" id="contribute_person_and_money"
                                    wire:model="data.contribute_type" value="both" name="contribute_type"
                                    autocomplete="off">
                                <label
                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                    for="contribute_person_and_money">
                                    {{ __('idea.steps.step7.both') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                            <div
                                class="d-flex align-items-center justify-content-between flex-wrap flex-lg-nowrap gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <label for="person_money_amount" class="text-primary fw-bold fs-5">
                                            {{ __('idea.steps.step7.amount') }}
                                        </label>
                                        <input type="number" class="form-control py-3 rounded-8"
                                            id="person_money_amount" wire:model="data.person_money_amount"
                                            name="person_money_amount" placeholder="" />
                                        @error('data.person_money_amount')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="person_money_percent" class="text-primary fw-bold fs-5">
                                            {{ __('idea.steps.step7.percent') }}
                                        </label>
                                        <input type="number" class="form-control py-3 rounded-8"
                                            id="person_money_percent" wire:model="data.person_money_percent"
                                            name="person_money_percent" placeholder="" />
                                        @error('data.person_money_percent')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" class="form-check-input" id="staff_yes_person_money"
                                            wire:model="data.staff_person_money" value="full_time"
                                            name="staff_person_money">
                                        <label class="form-check-label" for="staff_yes_person_money">
                                            {{ __('idea.steps.step7.full_time') }}
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" class="form-check-input" id="staff_no_person_money"
                                            wire:model="data.staff_person_money" value="part_time"
                                            name="staff_person_money">
                                        <label class="form-check-label" for="staff_no_person_money">
                                            {{ __('idea.steps.step7.part_time') }}
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" class="form-check-input"
                                            id="admin_only_no_person_money" wire:model="data.staff_person_money"
                                            value="supervision" name="staff_person_money">
                                        <label class="form-check-label" for="admin_only_no_person_money">
                                            {{ __('idea.steps.step7.supervision') }}
                                        </label>
                                    </div>
                                </div>
                                @error('data.staff_person_money')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- total validation --}}
                    @error('total')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>
    </div>
</div>
