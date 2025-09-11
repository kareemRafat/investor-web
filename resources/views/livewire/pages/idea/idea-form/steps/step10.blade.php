<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step10.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <!-- Left Column: User Details Form -->
            <div class="col-lg-6">
                <div class="bg-light shadow-sm rounded-8 p-3 text-center fw-bold mb-3">
                    {{ __('idea.steps.step10.registered_before') }}
                </div>
                <form>
                    <div class="d-flex flex-column gap-3">
                        <div class="row align-items-center">
                            <label for="name"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.real_name') }}
                            </label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding" id="name"
                                    placeholder="{{ __('idea.steps.step10.real_name') }}" />
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <label for="mobile"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.mobile_number') }}
                            </label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding" id="mobile"
                                    placeholder="{{ __('idea.steps.step10.mobile_number') }}" />
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <label for="username"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.nickname') }}
                            </label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding" id="username"
                                    placeholder="{{ __('idea.steps.step10.nickname') }}" />
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <label for="email"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.email') }}
                            </label>
                            <div class="col-12 col-sm-8">
                                <input type="email" class="form-control py-3 rounded-8 without_padding" id="email"
                                    placeholder="{{ __('idea.steps.step10.email') }}" />
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <label for="password"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.password') }}
                            </label>
                            <div class="col-12 col-sm-8">
                                <input type="password" class="form-control py-3 rounded-8 without_padding"
                                    id="password" placeholder="{{ __('idea.steps.step10.password') }}" />
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <label for="job"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.job_title') }}
                            </label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding" id="job"
                                    placeholder="{{ __('idea.steps.step10.job_title') }}" />
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <label for="country"
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.current_country') }}
                            </label>
                            <div class="col-12 col-sm-8">
                                <input type="text" class="form-control py-3 rounded-8 without_padding" id="country"
                                    placeholder="{{ __('idea.steps.step10.current_country') }}" />
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div
                                class="col-12 col-sm-4 text-primary border-primary text-center border py-3 rounded-8 fw-bold mb-2 mb-sm-0">
                                {{ __('idea.steps.step10.date_of_birth') }}
                            </div>
                            <div class="col-12 col-sm-8">
                                <div class="d-flex gap-2 flex-wrap flex-lg-nowrap">
                                    <input type="text"
                                        class="form-control py-3 rounded-8 text-center without_padding"
                                        placeholder="{{ __('idea.steps.step10.day') }}" id="day" />
                                    <input type="text"
                                        class="form-control py-3 rounded-8 text-center without_padding"
                                        placeholder="{{ __('idea.steps.step10.month') }}" id="month" />
                                    <input type="text"
                                        class="form-control py-3 rounded-8 text-center without_padding"
                                        placeholder="{{ __('idea.steps.step10.year') }}" id="year" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right Column: New User -->
            <div class="col-lg-6">
                <div class="bg-light shadow-sm rounded-8 p-3 text-center fw-bold mb-3">
                    {{ __('idea.steps.step10.first_time') }}
                </div>
                <div class="d-flex align-items-center gap-3 gap-md-4 flex-wrap mb-3 p-3">
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility_public"
                            value="public" checked>
                        <label class="form-check-label small" for="visibility_public">
                            {{ __('idea.steps.step10.public_description') }}
                        </label>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility_private"
                            value="private">
                        <label class="form-check-label small" for="visibility_private">
                            {{ __('idea.steps.step10.private_description') }}
                        </label>
                    </div>
                </div>
                <ul class="d-flex flex-column gap-3 gap-md-4 gap-lg-5 text-muted small p-4">
                    <li>{{ __('idea.steps.step10.note1') }}</li>
                    <li>{{ __('idea.steps.step10.note2') }}</li>
                    <li>{{ __('idea.steps.step10.note3') }}</li>
                    <li>{{ __('idea.steps.step10.note4') }}</li>
                    <li class="text-primary">{{ __('idea.steps.step10.note5') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
