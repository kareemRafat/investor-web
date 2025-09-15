<!-- Contact Section -->
<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center text-uppercase">
                    {{ __('header.contact') }}
                </h5>
            </div>
            <div class="card border-0 shadow-sm rounded-8">
                <div class="card-body">
                    <!-- Contact Us -->
                    <div class="d-flex flex-column">
                        <div class="col-12">
                            <div class="card bg-transparent border-0">
                                <div class="card-body">
                                    <div class="row mx-0 px-0 g-2">
                                        <!-- data -->
                                        <div class="col-12 col-xl-5 col-lg-6">
                                            <form action="">
                                                <!-- NAME -->
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingName"
                                                        placeholder="{{ __('pages.contact.name') }}" />
                                                    <label for="floatingName"
                                                        class="form-label">{{ __('pages.contact.name') }}</label>
                                                </div>

                                                <!-- EMAIL -->
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingEmail"
                                                        placeholder="{{ __('pages.contact.email') }}" />
                                                    <label for="floatingEmail"
                                                        class="form-label">{{ __('pages.contact.email') }}</label>
                                                </div>

                                                <!-- PHONE NUMBER -->
                                                <div class="form-floating mb-3">
                                                    <input type="tel" class="form-control" id="floatingPhone"
                                                        placeholder="{{ __('pages.contact.phone') }}" />
                                                    <label for="floatingPhone"
                                                        class="form-label">{{ __('pages.contact.phone') }}</label>
                                                </div>

                                                <!-- MESSAGE -->
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="floatingMessage" placeholder="{{ __('pages.contact.message') }}" rows="5"></textarea>
                                                    <label for="floatingMessage"
                                                        class="form-label">{{ __('pages.contact.message') }}</label>
                                                </div>

                                                <!-- submit button -->
                                                <button type="submit" class="btn btn-custom py-2 px-4">
                                                    <span class="small">{{ __('pages.contact.send') }}</span>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- img -->
                                        <div class="col-12 col-xl-7 col-lg-6 d-flex justify-content-center">
                                            <img src="{{ asset('images/map.png') }}" alt="map"
                                                class="img-fluid rounded-8 w-100" width="120" height="120" />
                                        </div>
                                    </div>
                                    <!-- وسائل التواصل -->
                                    <div class="d-flex justify-content-center flex-wrap gap-3 mt-0">
                                        <!-- twitter -->
                                        <a href="https://twitter.com/yourprofile" target="_blank"
                                            class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                            rel="noopener noreferrer" title="Twitter" aria-label="Twitter">
                                            <i class="bi bi-twitter-x fs-6 text-white"></i>
                                        </a>
                                        <!-- custom ni -->
                                        <a href="https://ni.com/yourprofile" target="_blank"
                                            class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                            rel="noopener noreferrer" title="ni" aria-label="ni">
                                            <span class="fw-bold fs-5 text-white">ni</span>
                                        </a>
                                        <!-- dribbble -->
                                        <a href="https://dribbble.com/yourprofile" target="_blank"
                                            class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                            rel="noopener noreferrer" title="Dribbble" aria-label="Dribbble">
                                            <i class="bi bi-dribbble fs-6 text-white"></i>
                                        </a>
                                        <!-- instagram -->
                                        <a href="https://instagram.com/yourprofile" target="_blank"
                                            class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                            rel="noopener noreferrer" title="Instagram" aria-label="Instagram">
                                            <i class="bi bi-instagram fs-6 text-white"></i>
                                        </a>
                                        <!-- facebook -->
                                        <a href="https://facebook.com/yourprofile" target="_blank"
                                            class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                            rel="noopener noreferrer" title="Facebook" aria-label="Facebook">
                                            <i class="bi bi-facebook fs-6 text-white"></i>
                                        </a>
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
