<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}" subtitle="Idea owner details" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <!-- Left Column: User Details Form -->
            <div class="col-lg-6">
                <div class="bg-light shadow-sm rounded-8 p-3 text-center fw-bold mb-3">
                    Have you registered your details in a previous idea?
                </div>
                <form>
                    <div class="d-flex flex-column gap-3">
                        <div class="row align-items-center">
                            <label for="name"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">Real
                                Name</label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding"
                                    id="name" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label for="mobile"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">Mobile
                                Number</label>
                            <div class="col-12 col-sm-8">
                                <input type="tel" class="form-control py-3 rounded-8 without_padding"
                                    id="mobile" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label for="username"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">Nickname</label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding"
                                    id="username" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label for="email"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">Email</label>
                            <div class="col-12 col-sm-8">
                                <input type="email" class="form-control py-3 rounded-8 without_padding"
                                    id="email" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label for="password"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">Password</label>
                            <div class="col-12 col-sm-8">
                                <input type="password" class="form-control py-3 rounded-8 without_padding"
                                    id="password" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label for="job"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">Job
                                title</label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding"
                                    id="job" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <label for="country"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">Current
                                Country of Residence</label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding"
                                    id="country" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                Date of Birth
                            </div>
                            <div class="col-12 col-sm-8">
                                <div class="d-flex gap-2 flex-wrap flex-lg-nowrap">
                                    <input type="text"
                                        class="form-control py-3 rounded-8 text-center without_padding"
                                        placeholder="Day" id="day" />
                                    <input type="text"
                                        class="form-control py-3 rounded-8 text-center without_padding"
                                        placeholder="Month" id="month" />
                                    <input type="text"
                                        class="form-control py-3 rounded-8 text-center without_padding"
                                        placeholder="Year" id="year" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right Column: New User -->
            <div class="col-lg-6">
                <div class="bg-light shadow-sm rounded-8 p-3 text-center fw-bold mb-3">
                    Is this your first time submitting an idea?
                </div>
                <div class="d-flex align-items-center gap-3 gap-md-4 flex-wrap mb-3 p-3">
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility_public"
                            value="public" checked>
                        <label class="form-check-label small" for="visibility_public">
                            To use the website and to preserve the intellectual property rights
                        </label>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility_private"
                            value="private">
                        <label class="form-check-label small" for="visibility_private">
                            I would like to show it to the public
                        </label>
                    </div>
                </div>
                <ul class=" d-flex flex-column gap-3 gap-md-4 gap-lg-5 text-muted small p-4">
                    <li> Your account activation code will be sent to this number</li>
                    <li> It will be shown to the website visitors</li>
                    <li> Your account activation code will be sent to this number</li>
                    <li>You will use it to log in to your account on the website</li>
                    <li class="text-primary"> Please put þ sign next to the method by which you prefer to be contacted
                        by those looking for distinguished ideas</li>
                </ul>
            </div>

        </div>
    </div>
</div>
