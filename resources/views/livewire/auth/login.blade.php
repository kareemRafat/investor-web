<div class="container">
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- login Form -->
            <div class="col-md-6 col-12">
                <form action="/login" method="POST">
                    @csrf
                    <div class="d-flex flex-column gap-1">
                        <!-- logo -->
                        <div class="mb-3">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid" width="100">
                        </div>
                        <h6 class="text-secondary mb-0 small">
                            Welcome back 👋
                        </h6>
                        <h4 class="fw-bold">
                            Log in to your account again
                        </h4>
                        <!-- login with google -->
                        <div
                            class="mb-2 mt-1 bg_login_google d-flex justify-content-center align-items-center gap-4 p-2 py-3 small rounded-2">
                            <img src="{{ asset('images/google.svg') }}" alt="Google Logo" class="img-fluid"
                                width="20" height="20" />
                            <span>
                                Sign in with Google
                            </span>
                        </div>
                        <!-- Sign in with Google -->
                        <div class="text-center mb-2">
                            <label class="or_label my-4 d-flex justify-content-center align-items-center bg-white">
                            </label>
                        </div>
                        <!-- login with email -->
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="EMAIL" />
                            <label for="floatingInput" class="form-label"> EMAIL</label>
                        </div>
                        @error('email')
                            <span class="alert alert-danger border-0 p-2 bg-danger text-white">{{ $message }}</span>
                        @enderror

                        <x-auth.password-input name="password" label="Password" />

                        <div class="d-flex mb-3">
                            <a href="{{ route('forgot-password') }}" wire:navigate
                                class="text-decoration-none text-danger small">
                                Forgot Password?
                            </a>
                        </div>
                        <button type="submit"
                            class="btn btn-custom py-2 d-flex justify-content-center gap-4 align-items-center small w-100">
                            <span class="small">
                                Continue
                            </span>
                            <!-- icon chervon -->
                            <i class="bi bi-chevron-right small"></i>
                        </button>
                        <!-- مستخدم جديد؟ -->
                        <div class="text-center mt-5">
                            <span class="small">
                                New user?
                                <a href="{{ route('register') }}" wire:navigate
                                    class="text-decoration-none text-primary">
                                    Sign up now
                                </a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- login Image -->
            <div class="col-md-6 col-12 d-none d-md-flex justify-content-center align-items-center">
                <img src="{{ asset('images/login.png') }}" alt="Login Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
