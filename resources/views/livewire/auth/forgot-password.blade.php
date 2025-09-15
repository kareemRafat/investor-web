<!-- Forget Password Section -->
<div class="container">
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- Forgot Password Form -->
            <div class="col-md-6 col-12">
                <form action="/forgot-password" method="POST">
                    @csrf
                    <div class="d-flex flex-column gap-1  justify-content-center h-100">
                        <!-- logo -->
                        <div class="mb-3">
                            <a href="/" wire:navigate>
                                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid"
                                    width="100">
                            </a>
                        </div>

                        <h4 class="fw-bold">
                            {{ __('pages.forgot.title') }}
                        </h4>
                        <h6 class="text-secondary mb-4 mt-3 small">
                            {{ __('pages.forgot.subtitle') }}
                        </h6>

                        <!-- email -->
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="{{ __('pages.forgot.email') }}" value="{{ old('email') }}" />
                            <label for="floatingInput" class="form-label">{{ __('pages.forgot.email') }}</label>

                            @error('email')
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ __($message) }}
                                </div>
                            @enderror

                            @if (session('status'))
                                <div class="mb-4 mt-2 font-medium text-sm text-success fw-semibold">
                                    <i class="bi bi-check-circle me-2"></i>
                                    {{ __(session('status')) }}
                                </div>
                            @endif
                        </div>

                        <!-- submit -->
                        <button type="submit"
                            class="btn btn-custom py-2 d-flex justify-content-center gap-4 align-items-center small w-100">
                            <span class="small">
                                {{ __('pages.forgot.send') }}
                            </span>
                        </button>

                        <!-- Not received -->
                        <div class="text-center mt-4 d-flex justify-content-between align-items-center">
                            <span class="small">
                                {{ __('pages.forgot.not_received') }}
                                <span class="text-primary">
                                    {{ __('pages.forgot.check_spam') }}
                                </span>
                            </span>

                            @php
                                $previous = url()->previous();
                                $current = url()->current();
                            @endphp

                            <a href="{{ $previous !== $current ? $previous : '/' }}" wire:navigate class="small">
                                {{ __('pages.forgot.back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- forget-password Image -->
            <div class="col-md-6 col-12 d-none d-md-flex justify-content-center align-items-center">
                <img src="{{ asset('images/forget-password.png') }}" alt="Forget Password Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
