<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="Distribution of the capital required to implement the idea" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <!-- Right List -->
                    <div class="col-12">
                        <div class="h-100 py-3">
                            <div class="row g-3">
                                <!-- Establishing a company -->
                                <div class="col-xl-7 col-lg-9 col-12 mx-auto">
                                    <div
                                        class="my-1 d-flex align-items-center justify-content-center gap-3 gap-md-4 gap-lg-5">
                                        <div
                                            class="w-100 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Establishing a company
                                        </div>
                                        <div class="w-100 d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                            <input type="number" class="form-control py-3 rounded-8" id="company"
                                                name="company" placeholder="Enter amount" />
                                            <!-- percentage icon -->
                                            <div class="text-light">
                                                <span class="bg-custom bg_icon rounded-circle">
                                                    <i class="bi bi-percent"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fixed Assets -->
                                <div class="col-xl-7 col-lg-9 col-12 mx-auto">
                                    <div
                                        class="my-1 d-flex align-items-center justify-content-center gap-3 gap-md-4 gap-lg-5">
                                        <div
                                            class="w-100 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Fixed Assets
                                        </div>
                                        <div class="w-100 d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                            <input type="number" class="form-control py-3 rounded-8" id="assets"
                                                name="assets" placeholder="Enter amount" />
                                            <div class="text-light">
                                                <span class="bg-custom bg_icon rounded-circle">
                                                    <i class="bi bi-percent"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Monthly Salaries -->
                                <div class="col-xl-7 col-lg-9 col-12 mx-auto">
                                    <div
                                        class="my-1 d-flex align-items-center justify-content-center gap-3 gap-md-4 gap-lg-5">
                                        <div
                                            class="w-100 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Monthly Salaries
                                        </div>
                                        <div class="w-100 d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                            <input type="number" class="form-control py-3 rounded-8" id="salaries"
                                                name="salaries" placeholder="Enter amount" />
                                            <div class="text-light">
                                                <span class="bg-custom bg_icon rounded-circle">
                                                    <i class="bi bi-percent"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Operating Expenses -->
                                <div class="col-xl-7 col-lg-9 col-12 mx-auto">
                                    <div
                                        class="my-1 d-flex align-items-center justify-content-center gap-3 gap-md-4 gap-lg-5">
                                        <div
                                            class="w-100 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Operating Expenses
                                        </div>
                                        <div class="w-100 d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                            <input type="number" class="form-control py-3 rounded-8" id="operating"
                                                name="operating" placeholder="Enter amount" />
                                            <div class="text-light">
                                                <span class="bg-custom bg_icon rounded-circle">
                                                    <i class="bi bi-percent"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Other -->
                                <div class="col-xl-7 col-lg-9 col-12 mx-auto">
                                    <div
                                        class="my-1 d-flex align-items-center justify-content-center gap-3 gap-md-4 gap-lg-5">
                                        <div
                                            class="w-100 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                            Other
                                        </div>
                                        <div class="w-100 d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                            <input type="number" class="form-control py-3 rounded-8" id="other"
                                                name="other" placeholder="Enter amount" />
                                            <div class="text-light">
                                                <span class="bg-custom bg_icon rounded-circle">
                                                    <i class="bi bi-percent"></i>
                                                </span>
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
