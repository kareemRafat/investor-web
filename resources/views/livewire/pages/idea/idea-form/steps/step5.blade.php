<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="Requirements for implementing the idea" />

    @dump($errors->all())

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="h-100 py-3">
                            <div class="row g-3">

                                {{-- Establishing a company --}}
                                <div class="row mx-0 px-0 my-2 align-items-center">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Establishing a company
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="company_yes"
                                                        wire:model="data.company" value="yes" name="company">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="company_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="company_no"
                                                        wire:model="data.company" value="no" name="company">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="company_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center gap-4">
                                            <label for="space_type" class="text-primary fw-bold fs-5">Office
                                                spaces</label>
                                            <div class="d-flex align-items-center gap-4">
                                                <div class="d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="radio" name="space_type"
                                                        id="space_type_large" wire:model="data.space_type"
                                                        value="large">
                                                    <label class="form-check-label" for="space_type_large">Large</label>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="radio" name="space_type"
                                                        id="space_type_small" wire:model="data.space_type"
                                                        value="small">
                                                    <label class="form-check-label" for="space_type_small">Small</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Specialized Employees --}}
                                <div class="row mx-0 px-0 my-2 align-items-center">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Specialized Employees
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="staff_yes"
                                                        wire:model="data.staff" value="yes" name="staff">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="staff_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="staff_no"
                                                        wire:model="data.staff" value="no" name="staff">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="staff_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center justify-content-between gap-5">
                                            <label for="number" class="text-primary fw-bold fs-5">Number</label>
                                            <input type="number" class="form-control py-3 rounded-8" id="number"
                                                wire:model="data.staff_number" placeholder="Enter number" />
                                        </div>
                                        @error('data.staff_number')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Unprofessional workers --}}
                                <div class="row mx-0 px-0 my-2 align-items-center">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Unprofessional workers
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="workers_yes"
                                                        wire:model="data.workers" value="yes" name="workers">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="workers_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="workers_no"
                                                        wire:model="data.workers" value="no" name="workers">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="workers_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center justify-content-between gap-5">
                                            <label for="number_workers"
                                                class="text-primary fw-bold fs-5">Number</label>
                                            <input type="number" class="form-control py-3 rounded-8"
                                                id="number_workers" wire:model="data.workers_number"
                                                placeholder="Enter number" />
                                        </div>
                                        @error('data.workers_number')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Executive Spaces --}}
                                <div class="row mx-0 px-0 my-2 align-items-center">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Executive Spaces
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="spaces_yes"
                                                        wire:model="data.executive_spaces" value="yes" name="executive_spaces">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="spaces_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="spaces_no"
                                                        wire:model="data.executive_spaces" value="no" name="executive_spaces">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="spaces_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 mt-3 mb-2 mb-lg-0 mt-lg-0">
                                        <div class="d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="factory"
                                                    id="factory_large" wire:model="data.executive_spaces_type"
                                                    value="open_spaces" checked>
                                                <label class="form-check-label" for="factory_large">Open
                                                    spaces</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="open_spaces"
                                                    id="open_spaces_large" wire:model="data.executive_spaces_type"
                                                    value="factory" checked>
                                                <label class="form-check-label"
                                                    for="open_spaces_large">Factory</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="land"
                                                    id="land_large" wire:model="data.executive_spaces_type" value="land_space"
                                                    checked>
                                                <label class="form-check-label" for="land_large">Land space</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Devices and Equipment --}}
                                <div class="row mx-0 px-0 my-2 align-items-center">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Devices and Equipment
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="equipment_yes"
                                                        wire:model="data.equipment" value="yes" name="equipment">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="equipment_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="equipment_no"
                                                        wire:model="data.equipment" value="no" name="equipment">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="equipment_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 mt-3 mt-lg-0 mb-2 mb-lg-0">
                                        <div class="d-flex align-items-center gap-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="Industrial"
                                                    wire:model="data.equipment_type" value="industrial" checked
                                                    name="equipment_type">
                                                <label class="form-check-label" for="Industrial">Industrial</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="Electronic"
                                                    wire:model="data.equipment_type" value="electronic"
                                                    name="equipment_type">
                                                <label class="form-check-label" for="Electronic">Electronic</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="other"
                                                    wire:model="data.equipment_type" value="other"
                                                    name="equipment_type">
                                                <label class="form-check-label" for="other">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Software and applications --}}
                                <div class="row mx-0 px-0 my-2 align-items-center">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Software and applications
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="software_yes"
                                                        wire:model="data.software" value="yes" name="software">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="software_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="software_no"
                                                        wire:model="data.software" value="no" name="software">
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
                                                <input type="radio" class="form-check-input" id="static"
                                                    wire:model="data.software_type" value="static" checked
                                                    name="dynamic">
                                                <label class="form-check-label" for="static">Static</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="radio" class="form-check-input" id="dynamic"
                                                    wire:model="data.software_type" value="dynamic" name="dynamic">
                                                <label class="form-check-label" for="dynamic">Dynamic</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Website --}}
                                <div class="row mx-0 px-0 my-2 align-items-center">
                                    <div class="col-lg-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="col-7 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                                Website
                                            </div>
                                            <div class="col-4 justify-content-end d-flex gap-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="website_yes"
                                                        wire:model="data.website" value="yes" name="website">
                                                    <label
                                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                                        for="website_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" id="website_no"
                                                        wire:model="data.website" value="no" name="website">
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
</div>
