<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="Requirements for implementing the idea" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <!-- Right List -->
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
                                                    <input type="radio" class="btn-check" id="company_yes"
                                                        name="company">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="company_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="company_no"
                                                        name="company">
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
                                <!-- Specialized Employees -->
                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Specialized Employees
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="staff_yes"
                                                        name="staff">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="staff_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="staff_no"
                                                        name="staff">
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
                                            <input type="number" class="form-control py-3 rounded-8"
                                                id="number_workers" name="number_workers"
                                                placeholder="Enter number" />
                                        </div>
                                    </div>

                                </div>
                                <!-- Executive Spaces -->
                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Executive Spaces
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
                                                <input class="form-check-input" type="radio" name="factory"
                                                    id="factory_large" value="large" checked>
                                                <label class="form-check-label" for="factory_large">Open
                                                    spaces</label>
                                            </div>
                                            <!-- Factory -->
                                            <div class="d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="open_spaces"
                                                    id="open_spaces_large" value="large" checked>
                                                <label class="form-check-label"
                                                    for="open_spaces_large">Factory</label>
                                            </div>
                                            <!-- Land space -->
                                            <div class="d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="land"
                                                    id="land_large" value="large" checked>
                                                <label class="form-check-label" for="land_large">Land space</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Devices and Equipment -->
                                <div class="row mx-0 px-0 my-2 align-items-center justify-content-between">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Devices and Equipment
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
                                        <!-- Industrial / Industrial / Other in radio -->
                                        <div class="d-flex align-items-center gap-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="Industrial"
                                                    checked name="equipment_type">
                                                <label class="form-check-label" for="Industrial">Industrial</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="Electronic"
                                                    name="equipment_type">
                                                <label class="form-check-label" for="Electronic">Electronic</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="other"
                                                    name="equipment_type">
                                                <label class="form-check-label" for="other">Other</label>
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
                                        <!-- Static / Dynamic in radio -->
                                        <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                            <div class="d-flex align-items-center gap-5">
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input" id="static"
                                                        checked name="dynamic">
                                                    <label class="form-check-label" for="static">Static</label>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="radio" class="form-check-input" id="dynamic"
                                                        name="dynamic">
                                                    <label class="form-check-label" for="dynamic">Dynamic</label>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
