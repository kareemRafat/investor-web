<!-- Forget Password Section -->
<div class="container">
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- login Form -->
            <div class="col-md-6 col-12">
                <form action="">
                    <div class="d-flex flex-column gap-1  justify-content-center h-100">
                        <!-- logo -->
                        <div class="mb-3">
                            <img src="{{ asset("images/logo.svg") }}" alt="Logo" class="img-fluid" width="100">
                        </div>

                        <h4 class="fw-bold">
                            Forgot Your Password?
                        </h4>
                        <h6 class="text-secondary mb-4 mt-3 small">
                            Enter the email address associated with your account and we'll send you a link to reset
                            your password.
                        </h6>
                        <!-- login with email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="EMAIL" />
                            <label for="floatingInput" class="form-label">EMAIL</label>
                        </div>
                        <button type="submit"
                            class="btn btn-custom py-2 d-flex justify-content-center gap-4 align-items-center small w-100">
                            <span class="small">
                                Send
                            </span>
                        </button>
                        <!-- New User? -->
                        <div class="text-center mt-4">
                            <span class="small">
                                Didn't receive the email?
                                <span class="text-primary">
                                    Check your spam folder
                                </span>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- forget-password Image -->
            <div class="col-md-6 col-12 d-none d-md-flex justify-content-center align-items-center">
                <img src="{{ asset("images/forget-password.png") }}" alt="Login Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
