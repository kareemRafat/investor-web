<!-- Reset password Section -->
<div class="container">
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- reset password Form -->
            <div class="col-md-6 col-12">
                <form action="/reset-password" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <input type="hidden" name="email" value="{{ request()->email }}">
                    <div class="d-flex flex-column gap-1 justify-content-center h-100">
                        <!-- logo -->
                        <div class="mb-3">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid" width="100">
                        </div>

                        <h4 class="fw-bold">
                            {{ __('pages.reset.title') }}
                        </h4>
                        <h6 class="text-secondary mb-4 mt-3 small">
                            {{ __('pages.reset.subtitle') }}
                        </h6>

                        <!-- password -->
                        <x-auth.password-input name="password" :label="__('auth.reset.password')" />

                        <!-- password confirmation -->
                        <x-auth.password-input name="password_confirmation" :label="__('auth.reset.password_confirmation')" />

                        @error('email')
                            <div class="text-danger mb-2 fw-semibold">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit"
                            class="btn btn-custom py-2 d-flex justify-content-center gap-4 align-items-center small w-100">
                            <span class="small">
                                {{ __('pages.reset.confirm') }}
                            </span>
                        </button>

                        <div class="text-center mt-4">
                            <span class="small text-dark">
                                {{ __('pages.reset.note') }}
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- reset-password Image -->
            <div class="col-md-6 col-12 d-none d-md-flex justify-content-center align-items-center">
                <img src="{{ asset('images/forget-password.png') }}" alt="Reset password Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
