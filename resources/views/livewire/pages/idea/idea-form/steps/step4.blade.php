<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="The expected profits from implementing the idea" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">
                    <!-- One-time Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="one-time" name="profit_type"
                                        autocomplete="off" checked>
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="one-time">One-time Profits</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="one-time-1"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="one-time-1">$1,000 to $5,000<br>(3,700 to 18,500 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="one-time-2"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="one-time-2">$6,000 to $10,000<br>(22,200 to 37,000 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="one-time-3"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="one-time-3">$51,000 to $100,000<br>(188,800 to 370,000 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="one-time-4"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="one-time-4">$101,000 to $250,000<br>(374,000 to 925,750 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="one-time-5"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="one-time-5">$1 million to $2 million<br>(3.7 million to 7.4 million
                                        SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="one-time-6"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="one-time-6">$2 million to $5 million<br>(7.4 million to 18.5 million
                                        SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="one-time-7"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="one-time-7">$50 million to $100 million<br>(185 million to 370 million
                                        SAR)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Annual Profits -->
                    <div class="col-12 col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="radio" class="btn-check" id="Annual" name="profit_type"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                                        for="Annual">Annual Profits</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="annual-1"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="annual-1">$11,000 to $20,000<br>(40,700 to 74,000 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="annual-2"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="annual-2">$21,000 to $50,000<br>(77,700 to 185,000 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="annual-3"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="annual-3">$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="annual-4"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="annual-4">$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="annual-5"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="annual-5">$5 million to $10 million<br>(18.5 million to 37 million
                                        SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="annual-6"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="annual-6">$10 million to $50 million<br>(37 million to 185 million
                                        SAR)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" class="btn-check" name="profit_range" id="annual-7"
                                        autocomplete="off">
                                    <label
                                        class="btn btn-outline-secondary w-100 h-100 p-3 rounded-8 shadow-sm small fw-bold"
                                        for="annual-7">More than $100 million<br>(More than 370 million SAR)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
