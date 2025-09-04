<!-- Verify Email Section -->
<div class="container">
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- Verify Email Form -->
            <div class="col-md-6 col-12">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="d-flex flex-column gap-1 justify-content-center h-100">
                        <!-- logo -->
                        <div class="mb-3">
                            <a href="/" wire:navigate>
                                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid" width="100">
                            </a>
                        </div>

                        <h4 class="fw-bold">
                            {{ __('auth.email-verify') }}
                        </h4>
                        <h6 class="text-secondary mb-2 mt-3 small">
                            <p>Before proceeding, please check your email for a verification link.</p>
                            <span>If you did not receive the email, click below to request another.</span>
                        </h6>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-2 mt-2 font-medium text-sm text-success fw-semibold">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ __('auth.email-verify-message') }}
                            </div>
                        @endif

                        <button type="submit"
                            class="btn btn-custom mt-2 py-2 d-flex justify-content-center gap-4 align-items-center small w-100">
                            <span class="small">Resend Verification Email</span>
                        </button>

                        <div class="text-center mt-4">
                            <span class="small">
                                Didn't receive the email?
                                <span class="text-primary">Check your spam folder</span>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Verify Image -->
            <div class="col-md-6 col-12 d-none d-md-flex justify-content-center align-items-center">
                <img src="{{ asset('images/email.png') }}" alt="Verify Email Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
