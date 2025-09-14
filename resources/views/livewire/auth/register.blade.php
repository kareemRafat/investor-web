<!-- Register Section -->
<div class="container">
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- login Form -->
            <div class="col-md-6 col-12">
                <form action="/register" method="POST">
                    @csrf
                    <div class="d-flex flex-column gap-1">
                        <!-- logo -->
                        <div class="mb-3">
                            <img src="{{ asset('images/logo.svg') }} " alt="Logo" class="img-fluid" width="100">
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
                            <img src="{{ asset('images/google.svg') }} " alt="Google Logo" class="img-fluid"
                                width="20" height="20" />
                            <span>
                                Sign up with Google
                            </span>
                        </div>
                        <!-- سجل بحسابك -->
                        <div class="text-center mb-2">
                            <label class="or_label my-4 d-flex justify-content-center align-items-center bg-white">
                            </label>
                        </div>

                        <!-- register with email -->
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="floatingInput"
                                placeholder="Enter your Name" value="{{ old('name') }}" />
                            <label for="floatingInput" class="form-label">Name</label>
                            <!-- Error message -->
                            @error('name')
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="Enter your email" value="{{ old('email') }}" />
                            <label for="floatingInput" class="form-label">EMAIL</label>
                            <!-- Error message -->
                            @error('email')
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- phone -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="phone" type="tel" class="form-control" id="floatingPhone"
                                placeholder="Enter your phone number" value="{{ old('phone') }}" />
                            <label for="floatingPhone" class="form-label">PHONE NUMBER</label>
                            <!-- Error message -->
                            @error('phone')
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- password -->
                        <x-auth.password-input name="password" label="Password" />

                        <!-- password confirmation -->
                        <x-auth.password-input name="password_confirmation" label="Password Confirmation" />

                        <!-- residence_country -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="residence_country" type="text" class="form-control" id="floatingAddress"
                                placeholder="Enter your phone number" value="{{ old('residence_country') }}" />
                            <label for="floatingAddress" class="form-label">Current Country of Residence</label>
                            <!-- Error message -->
                            @error('residence_country')
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- job_title -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="job_title" type="text" class="form-control" id="floatingJob"
                                placeholder="Enter your phone number" value="{{ old('job_title') }}" />
                            <label for="floatingJob" class="form-label">Job Title</label>
                            <!-- Error message -->
                            @error('job_title')
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- birth_date -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="birth_date" type="date" class="form-control" id="floatingBirthDate"
                                placeholder="Enter your birth date" value="{{ old('birth_date') }}" />
                            <label for="floatingBirthDate" class="form-label">Date of Birth</label>

                            <!-- Error message -->
                            @error('birth_date')
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


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
                        <!-- Already have an account? -->
                        <div class="text-center my-5">
                            <span class="small">
                                Already have an account?
                                <a href="{{ route('login') }}" wire:navigate
                                    class="text-decoration-none text-primary">
                                    Log in
                                </a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- sign-up Image -->
            <div class="col-md-6 col-12 d-none d-md-flex justify-content-center align-items-center">
                <img src="{{ asset('images/sign-up.png') }}" alt="sign Up Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
