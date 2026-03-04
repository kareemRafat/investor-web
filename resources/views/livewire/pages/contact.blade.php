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
                                            @if (session()->has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('success') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <form wire:submit="submit">
                                                <!-- NAME -->
                                                <div class="form-floating mb-3">
                                                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="floatingName"
                                                        placeholder="{{ __('pages.contact.name') }}" />
                                                    <label for="floatingName"
                                                        class="form-label">{{ __('pages.contact.name') }}</label>
                                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <!-- EMAIL -->
                                                <div class="form-floating mb-3">
                                                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail"
                                                        placeholder="{{ __('pages.contact.email') }}" />
                                                    <label for="floatingEmail"
                                                        class="form-label">{{ __('pages.contact.email') }}</label>
                                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <!-- PHONE NUMBER -->
                                                <div class="form-floating mb-3">
                                                    <input type="tel" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingPhone"
                                                        placeholder="{{ __('pages.contact.phone') }}" />
                                                    <label for="floatingPhone"
                                                        class="form-label">{{ __('pages.contact.phone') }}</label>
                                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <!-- SUBJECT (Hidden or visible, I'll make it a simple text field for now or keep default) -->
                                                <div class="form-floating mb-3">
                                                    <input type="text" wire:model="subject" class="form-control @error('subject') is-invalid @enderror" id="floatingSubject"
                                                        placeholder="{{ __('pages.contact.subject') }}" />
                                                    <label for="floatingSubject"
                                                        class="form-label">{{ __('pages.contact.subject') }}</label>
                                                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <!-- MESSAGE -->
                                                <div class="form-floating mb-3">
                                                    <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror" id="floatingMessage" placeholder="{{ __('pages.contact.message') }}" style="height: 150px"></textarea>
                                                    <label for="floatingMessage"
                                                        class="form-label">{{ __('pages.contact.message') }}</label>
                                                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <!-- submit button -->
                                                <button type="submit" class="btn btn-custom py-2 px-4" wire:loading.attr="disabled">
                                                    <span wire:loading.remove>{{ __('pages.contact.send') }}</span>
                                                    <span wire:loading>
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                        {{ __('pages.contact.sending') }}...
                                                    </span>
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
                                        @if($twitter = settings('twitter_url'))
                                            <a href="{{ $twitter }}" target="_blank"
                                                class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                                rel="noopener noreferrer" title="Twitter" aria-label="Twitter">
                                                <i class="bi bi-twitter-x fs-6 text-white"></i>
                                            </a>
                                        @endif

                                        <!-- dribbble -->
                                        @if($dribbble = settings('dribbble_url'))
                                            <a href="{{ $dribbble }}" target="_blank"
                                                class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                                rel="noopener noreferrer" title="Dribbble" aria-label="Dribbble">
                                                <i class="bi bi-dribbble fs-6 text-white"></i>
                                            </a>
                                        @endif

                                        <!-- instagram -->
                                        @if($instagram = settings('instagram_url'))
                                            <a href="{{ $instagram }}" target="_blank"
                                                class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                                rel="noopener noreferrer" title="Instagram" aria-label="Instagram">
                                                <i class="bi bi-instagram fs-6 text-white"></i>
                                            </a>
                                        @endif

                                        <!-- facebook -->
                                        @if($facebook = settings('facebook_url'))
                                            <a href="{{ $facebook }}" target="_blank"
                                                class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                                rel="noopener noreferrer" title="Facebook" aria-label="Facebook">
                                                <i class="bi bi-facebook fs-6 text-white"></i>
                                            </a>
                                        @endif

                                        <!-- linkedin -->
                                        @if($linkedin = settings('linkedin_url'))
                                            <a href="{{ $linkedin }}" target="_blank"
                                                class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                                rel="noopener noreferrer" title="LinkedIn" aria-label="LinkedIn">
                                                <i class="bi bi-linkedin fs-6 text-white"></i>
                                            </a>
                                        @endif

                                        <!-- whatsapp -->
                                        @if($whatsapp = settings('whatsapp_number'))
                                            <a href="https://wa.me/{{ $whatsapp }}" target="_blank"
                                                class="d-flex align-items-center justify-content-center rounded-circle icon_social"
                                                rel="noopener noreferrer" title="WhatsApp" aria-label="WhatsApp">
                                                <i class="bi bi-whatsapp fs-6 text-white"></i>
                                            </a>
                                        @endif
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
