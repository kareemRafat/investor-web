<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="Your contribution to implementing the idea is:" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <!-- Right List -->
                    <div class="col-12">
                        <div class="h-100 py-3">
                            <div class="row">
                                <!-- I would like to sell the idea completely without any contribution to its implementation -->
                                <div class="col-lg-7 col-12 my-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="col-12 col-lg-9 col-md-12">
                                            <input type="radio" class="btn-check" id="needs"
                                                name="contribute_type" autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="needs">
                                                I would like to sell the idea completely without any contribution to its
                                                implementation
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- I will only contribute the idea -->
                                <div class="col-lg-7 col-12 my-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="col-12 col-lg-9 col-md-12">
                                            <input type="radio" class="btn-check" id="contribute"
                                                name="contribute_type" autocomplete="off">
                                            <label
                                                class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                for="contribute">
                                                I will only contribute the idea
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="col-12 col-lg-9 col-md-12">
                                                        <input type="radio" class="btn-check" id="contribute_person"
                                                            name="contribute_type" autocomplete="off">
                                                        <label
                                                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                            for="contribute_person">
                                                            I will contribute capital for implementing the idea
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center gap-2 flex-wrap gap-md-3 gap-lg-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="staff_yes"
                                                    name="staff">
                                                <label class="form-check-label" for="staff_yes">
                                                    Full time
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="staff_no"
                                                    name="staff">
                                                <label class="form-check-label" for="staff_no">
                                                    Part time
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="admin_only_no"
                                                    name="staff">
                                                <label class="form-check-label" for="admin_only_no">
                                                    Supervision only
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="col-12 col-lg-9 col-md-12">
                                                        <input type="radio" class="btn-check" id="contribute_money"
                                                            name="contribute_type" autocomplete="off">
                                                        <label
                                                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                            for="contribute_money">
                                                            I will personally contribute to implementing the idea
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                    <label for="money_amount" class="text-primary fw-bold fs-5">
                                                        Amount
                                                    </label>
                                                    <input type="number" class="form-control py-3 rounded-8"
                                                        id="money_amount" name="money_amount" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center justify-content-between gap-3">
                                                    <label for="money_percent" class="text-primary fw-bold fs-5">
                                                        Percentage
                                                    </label>
                                                    <input type="number" class="form-control py-3 rounded-8"
                                                        id="money_percent" name="money_percent" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="col-12 col-lg-9 col-md-12">
                                                        <input type="radio" class="btn-check"
                                                            id="contribute_person_and_money" name="contribute_type"
                                                            autocomplete="off">
                                                        <label
                                                            class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                            for="contribute_person_and_money">
                                                            I will contribute with capital + I will personally
                                                            contribute to implementing the idea
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div
                                            class="d-flex align-items-center justify-content-between flex-wrap flex-lg-nowrap gap-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between gap-3">
                                                        <label for="person_money_amount"
                                                            class="text-primary fw-bold fs-5">
                                                            Amount
                                                        </label>
                                                        <input type="number" class="form-control py-3 rounded-8"
                                                            id="person_money_amount" name="person_money_amount"
                                                            placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between gap-3">
                                                        <label for="person_money_percent"
                                                            class="text-primary fw-bold fs-5">
                                                            Percentage
                                                        </label>
                                                        <input type="number" class="form-control py-3 rounded-8"
                                                            id="person_money_percent" name="person_money_percent"
                                                            placeholder="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input"
                                                        id="staff_yes_person_money" name="staff_person_money">
                                                    <label class="form-check-label" for="staff_yes_person_money">
                                                        Full time
                                                    </label>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input"
                                                        id="staff_no_person_money" name="staff_person_money">
                                                    <label class="form-check-label" for="staff_no_person_money">
                                                        Part time
                                                    </label>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input"
                                                        id="admin_only_no_person_money" name="staff_person_money">
                                                    <label class="form-check-label" for="admin_only_no_person_money">
                                                        Supervision only
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
    </div>
</div>
