<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step3.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <!-- Amounts of money -->
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="h-100">
                            <a href="/investment_money_step3_en.html" class="text-dark text-decoration-none"
                                title="Amounts of money" aria-label="Amounts of money">
                                <span class="d-block rounded-8 p-3 bg-light fw-bold mb-3 text-center">
                                    Amounts of money
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- Resources -->
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="h-100">
                            <a href="/investment_supplier_step3_en.html" class="text-white text-decoration-none"
                                title="Resources" aria-label="Resources">
                                <span class="d-block bg-custom rounded-8 p-3 fw-bold mb-3 text-center">
                                    Resources
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- Amounts of money + Resources -->
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="h-100">
                            <a href="/investment_money_supplier_step3_en.html" class="text-dark text-decoration-none"
                                title="Amounts of money + Resources" aria-label="Amounts of money + Resources">
                                <span class="d-block rounded-8 p-3 bg-light fw-bold mb-3 text-center">
                                    Amounts of money + Resources
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <!-- Right List (English) -->
                <div class="col-12">
                    <div class="h-100 py-3">
                        <div class="row g-3">
                            <!-- Establishing a company -->
                            <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                <div class="col-lg-7 col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Establishing a company
                                        </div>
                                        <div class="col-4 justify-content-end d-flex gap-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="company_yes" name="company">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="company_yes">Yes</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="company_no" name="company">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="company_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="name" class="text-primary fw-bold fs-5">
                                            Office spaces
                                        </label>
                                        <!-- radio btns -->
                                        <div class="d-flex align-items-center gap-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="space_type"
                                                    id="space_type_large" value="large" checked>
                                                <label class="form-check-label" for="space_type_large">Large</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="space_type"
                                                    id="space_type_small" value="small">
                                                <label class="form-check-label" for="space_type_small">Small</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Specialized employees -->
                            <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                <div class="col-lg-7 col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Specialized employees
                                        </div>
                                        <div class="col-4 justify-content-end d-flex gap-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="staff_yes" name="staff">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="staff_yes">Yes</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="staff_no" name="staff">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="staff_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                    <div class="d-flex align-items-center justify-content-between gap-5">
                                        <label for="number" class="text-primary fw-bold fs-5">
                                            Number
                                        </label>
                                        <input type="number" class="form-control py-3 rounded-8" id="number"
                                            name="number" placeholder="Enter number" />
                                    </div>
                                </div>
                            </div>
                            <!-- Unprofessional workers -->
                            <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                <div class="col-lg-7 col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Unprofessional workers
                                        </div>
                                        <div class="col-4 justify-content-end d-flex gap-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="workers_yes"
                                                    name="workers">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="workers_yes">Yes</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="workers_no"
                                                    name="workers">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="workers_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                    <div class="d-flex align-items-center justify-content-between gap-5">
                                        <label for="number_workers" class="text-primary fw-bold fs-5">
                                            Number
                                        </label>
                                        <input type="number" class="form-control py-3 rounded-8" id="number_workers"
                                            name="number_workers" placeholder="Enter number" />
                                    </div>
                                </div>
                            </div>
                            <!-- Executive spaces -->
                            <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                <div class="col-lg-7 col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Executive spaces
                                        </div>
                                        <div class="col-4 justify-content-end d-flex gap-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="spaces_yes"
                                                    name="spaces">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="spaces_yes">Yes</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="spaces_no"
                                                    name="spaces">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="spaces_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mb-2 mb-lg-0 mt-lg-0">
                                    <!-- radio btns -->
                                    <div class="d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="space_type_exec"
                                                id="open_spaces_large" value="open_spaces">
                                            <label class="form-check-label" for="open_spaces_large">Open
                                                spaces</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="space_type_exec"
                                                id="factory_large" value="factory" checked>
                                            <label class="form-check-label" for="factory_large">Factory</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="space_type_exec"
                                                id="land_large" value="land">
                                            <label class="form-check-label" for="land_large">Land
                                                space</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Devices and equipment -->
                            <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                <div class="col-lg-7 col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Devices and equipment
                                        </div>
                                        <div class="col-4 justify-content-end d-flex gap-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="equipment_yes"
                                                    name="equipment">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="equipment_yes">Yes</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="equipment_no"
                                                    name="equipment">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="equipment_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                    <!-- Industrial / Electronic / Other in radio -->
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="industrial"
                                                name="equipment_type" checked>
                                            <label class="form-check-label" for="industrial">Industrial</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="electronic"
                                                name="equipment_type">
                                            <label class="form-check-label" for="electronic">Electronic</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="other"
                                                name="equipment_type">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Software and applications -->
                            <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                <div class="col-lg-7 col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Software and applications
                                        </div>
                                        <div class="col-4 justify-content-end d-flex gap-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="software_yes"
                                                    name="software">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="software_yes">Yes</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="software_no"
                                                    name="software">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="software_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                    <div class="d-flex align-items-center gap-5">
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="dynamic"
                                                name="dynamic" checked>
                                            <label class="form-check-label" for="dynamic">Dynamic</label>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="radio" class="form-check-input" id="static"
                                                name="dynamic">
                                            <label class="form-check-label" for="static">Static</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Website -->
                            <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                <div class="col-lg-7 col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Website
                                        </div>
                                        <div class="col-4 justify-content-end d-flex gap-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="website_yes"
                                                    name="website">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="website_yes">Yes</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" id="website_no"
                                                    name="website">
                                                <label
                                                    class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                    for="website_no">No</label>
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
