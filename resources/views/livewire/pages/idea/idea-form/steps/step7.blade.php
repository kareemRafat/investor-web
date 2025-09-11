<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="Your contribution to implementing the idea is:" />

        @dump($errors->all())

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <!-- Right List -->
                    <div class="col-12">
                        <div class="h-100 py-3">
                            <div class="row">
                                <!-- I would like to sell the idea completely -->
                                <div class="col-lg-7 col-12 my-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="col-12 col-lg-9 col-md-12">
                                            <input type="radio" class="btn-check" id="needs"
                                                wire:model="data.contribute_type" value="sell"
                                                name="contribute_type" autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="needs">
                                                I would like to sell the idea completely without any contribution to its
                                                implementation
                                            </label>
                                        </div>
                                    </div>
                                    @error('data.contribute_type')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- I will only contribute the idea -->
                                <div class="col-lg-7 col-12 my-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="col-12 col-lg-9 col-md-12">
                                            <input type="radio" class="btn-check" id="contribute"
                                                wire:model="data.contribute_type" value="idea"
                                                name="contribute_type" autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="contribute">
                                                I will only contribute the idea
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Capital contribution -->
                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="col-12 col-lg-9 col-md-12">
                                            <input type="radio" class="btn-check" id="contribute_person"
                                                wire:model="data.contribute_type" value="capital"
                                                name="contribute_type" autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="contribute_person">
                                                I will contribute capital for implementing the idea
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center gap-2 flex-wrap gap-md-3 gap-lg-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="staff_yes"
                                                    wire:model="data.staff" value="full_time" name="staff">
                                                <label class="form-check-label" for="staff_yes">
                                                    Full time
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="staff_no"
                                                    wire:model="data.staff" value="part_time" name="staff">
                                                <label class="form-check-label" for="staff_no">
                                                    Part time
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="admin_only_no"
                                                    wire:model="data.staff" value="supervision" name="staff">
                                                <label class="form-check-label" for="admin_only_no">
                                                    Supervision only
                                                </label>
                                            </div>
                                        </div>
                                        @error('data.staff')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Personal contribution -->
                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="col-12 col-lg-9 col-md-12">
                                            <input type="radio" class="btn-check" id="contribute_money"
                                                wire:model="data.contribute_type" value="personal"
                                                name="contribute_type" autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="contribute_money">
                                                I will personally contribute to implementing the idea
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <label for="money_amount" class="text-primary fw-bold fs-5">
                                                    Amount
                                                </label>
                                                <input type="number" class="form-control py-3 rounded-8"
                                                    id="money_amount" wire:model="data.money_amount"
                                                    name="money_amount" placeholder="" />
                                                @error('data.money_amount')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="money_percent" class="text-primary fw-bold fs-5">
                                                    Percentage
                                                </label>
                                                <input type="number" class="form-control py-3 rounded-8"
                                                    id="money_percent" wire:model="data.money_percent"
                                                    name="money_percent" placeholder="" />
                                                @error('data.money_percent')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Both contribution -->
                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="col-12 col-lg-9 col-md-12">
                                            <input type="radio" class="btn-check"
                                                id="contribute_person_and_money"
                                                wire:model="data.contribute_type" value="both"
                                                name="contribute_type" autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="contribute_person_and_money">
                                                I will contribute with capital + I will personally
                                                contribute to implementing the idea
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap flex-lg-nowrap gap-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <label for="person_money_amount"
                                                        class="text-primary fw-bold fs-5">
                                                        Amount
                                                    </label>
                                                    <input type="number" class="form-control py-3 rounded-8"
                                                        id="person_money_amount"
                                                        wire:model="data.person_money_amount"
                                                        name="person_money_amount" placeholder="" />
                                                    @error('data.person_money_amount')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label for="person_money_percent"
                                                        class="text-primary fw-bold fs-5">
                                                        Percentage
                                                    </label>
                                                    <input type="number" class="form-control py-3 rounded-8"
                                                        id="person_money_percent"
                                                        wire:model="data.person_money_percent"
                                                        name="person_money_percent" placeholder="" />
                                                    @error('data.person_money_percent')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input"
                                                        id="staff_yes_person_money"
                                                        wire:model="data.staff_person_money" value="full_time"
                                                        name="staff_person_money">
                                                    <label class="form-check-label" for="staff_yes_person_money">
                                                        Full time
                                                    </label>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input"
                                                        id="staff_no_person_money"
                                                        wire:model="data.staff_person_money" value="part_time"
                                                        name="staff_person_money">
                                                    <label class="form-check-label" for="staff_no_person_money">
                                                        Part time
                                                    </label>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input"
                                                        id="admin_only_no_person_money"
                                                        wire:model="data.staff_person_money" value="supervision"
                                                        name="staff_person_money">
                                                    <label class="form-check-label" for="admin_only_no_person_money">
                                                        Supervision only
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
        </div>
    </div>
</div>
