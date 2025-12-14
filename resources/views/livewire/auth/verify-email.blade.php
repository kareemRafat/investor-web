@push('styles')
    <style>
        /* ===== VERIFY EMAIL PAGE STYLES ===== */
        .verify-email-container .split-container {
            height: 100vh;
            overflow: hidden;
        }

        .verify-email-container .form-side {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 40px 30px;
        }

        .verify-email-container .brand-side {
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .verify-email-container .form-side::-webkit-scrollbar {
            width: 6px;
        }

        .verify-email-container .form-side::-webkit-scrollbar-track {
            background: transparent;
        }

        .verify-email-container .form-side::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .verify-email-container .form-side::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endpush

<div class="login-container verify-email-container">
    <div class="split-container">
        <!-- Form Side -->
        <div class="form-side">
            <div class="form-container">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="d-flex flex-column gap-3">
                        <!-- Logo -->
                        <div class="mb-3 text-center">
                            <a href="/" wire:navigate>
                                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid"
                                    width="100">
                            </a>
                        </div>

                        <!-- Title -->
                        <h1 class="logo-text">{{ __('auth.verify_email.title') }}</h1>
                        <p class="subtitle">
                            {{ __('auth.verify_email.subtitle') }}
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success border-0 p-2 mb-3 small">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ __('auth.verify_email.message_sent') }}
                            </div>
                        @endif

                        <button type="submit" class="btn btn-login w-100">
                            {{ __('auth.verify_email.resend_verification') }}
                        </button>

                        <p class="text-center mt-3 small" style="color:#64748b;">
                            {{ __('auth.verify_email.not_received') }}
                            <span class="text-primary">{{ __('auth.verify_email.check_spam') }}</span>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Brand Side -->
        <div class="brand-side d-none d-lg-flex flex-column justify-content-center align-items-center">
            <!-- Floating Card Example -->
            <div class="glass-card mb-4">
                <h5>{{ __('auth.verify_email.secure_accounts') }}</h5>
                <div class="amount">99.9%</div>
                <p class="small mt-2" style="color: white; opacity: 0.8;">
                    {{ __('auth.verify_email.security_protection') }}
                </p>
            </div>

            <div class="glass-card card-2 mb-4">
                <h5>{{ __('auth.verify_email.active_users') }}</h5>
                <div class="progress-bars">
                    <div class="progress-bar-item">
                        <div class="progress-bar-fill" style="width: 85%;"></div>
                    </div>
                </div>
                <p class="small mt-2" style="color: white; opacity: 0.8;">
                    {{ __('auth.verify_email.verification_required') }}
                </p>
            </div>

            <div class="brand-content text-center">
                <h2 class="brand-title">{{ __('auth.verify_email.gateway_title') }}</h2>
                <p class="brand-description">{{ __('auth.verify_email.gateway_description') }}</p>
            </div>
        </div>
    </div>
</div>
