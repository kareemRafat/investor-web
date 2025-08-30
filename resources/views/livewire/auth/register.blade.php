
    <!-- Register Section -->
    <div class="container">
        <div class="min-vh-100 d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <!-- login Form -->
                <div class="col-md-6 col-12">
                    <form action="">
                        <div class="d-flex flex-column gap-1">
                            <!-- logo -->
                            <div class="mb-3">
                                <img src="{{ asset("images/logo.svg") }} " alt="Logo" class="img-fluid" width="100">
                            </div>
                            <h6 class="text-secondary mb-0 small">
                                Welcome back 👋
                            </h6>
                            <h4 class="fw-bold">
                                Create a new account
                            </h4>
                            <!-- Register with google -->
                            <div
                                class="mb-2 mt-1 bg_login_google d-flex justify-content-center align-items-center gap-4 p-2 py-3 small rounded-2">
                                <img src="{{ asset("images/google.svg") }} " alt="Google Logo" class="img-fluid" width="20"
                                    height="20" />
                                <span>
                                    Sign up with Google
                                </span>
                            </div>
                            <!-- سجل بحسابك -->
                            <div class="text-center mb-2">
                                <label class="or_label my-4 d-flex justify-content-center align-items-center bg-white">
                                </label>
                            </div>
                            <!-- login with email -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="Enter your email" />
                                <label for="floatingInput" class="form-label">EMAIL</label>
                            </div>
                            <!-- phone -->
                            <div class="form-floating mb-3 position-relative">
                                <input type="tel" class="form-control" id="floatingPhone"
                                    placeholder="Enter your phone number" />
                                <label for="floatingPhone" class="form-label">PHONE NUMBER</label>
                            </div>
                            <!-- password -->
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Enter your password" />
                                <!-- eye slash click to show -->
                                <i class="bi bi-eye-slash position-absolute start-0 top-50 translate-middle-y me-3"></i>
                                <!-- eye click to hide -->
                                <!-- <i class="bi bi-eye position-absolute start-0 top-50 translate-middle-y me-3"></i> -->
                                <label for="floatingPassword" class="form-label">PASSWORD</label>
                            </div>
                            <div class="d-flex mb-3">
                                <a href="{{ route("forgot-password") }}" wire:navigate class="text-decoration-none text-danger small">
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
                            <!-- Already have an account? -->
                            <div class="text-center mt-5">
                                <span class="small">
                                    Already have an account?
                                    <a href="{{ route("login") }}" wire:navigate class="text-decoration-none text-primary">
                                        Log in
                                    </a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- sign-up Image -->
                <div class="col-md-6 col-12 d-none d-md-flex justify-content-center align-items-center">
                    <img src="{{ asset("images/sign-up.png") }}" alt="sign Up Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

