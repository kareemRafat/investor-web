@push('styles')
    <style>
        /* ===== LOGIN PAGE OVERRIDES ===== */
        .login-container.login-page {
            height: 100vh;
            overflow: hidden;
        }

        .login-container.login-page .split-container {
            height: 100vh;
        }

        .login-container.login-page .form-side {
            flex: 1;
            height: 100vh;
            overflow-y: auto;
            padding: 60px 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container.login-page .brand-side {
            flex: 1;
            height: 100vh;
            overflow: hidden;
        }

        @media (max-width: 991px) {
            .login-container.login-page {
                height: auto;
                overflow: visible;
            }

            .login-container.login-page .split-container {
                height: auto;
                flex-direction: column;
            }

            .login-container.login-page .form-side {
                height: auto;
                overflow: visible;
                padding: 40px 20px;
            }
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            height: 48px;
        }

        .btn-login .spinner-border {
            width: 1.1rem;
            height: 1.1rem;
            border-width: 0.15em;
        }

        .form-check-input-custom {
            width: 18px !important;
            height: 18px !important;
            margin: 0 !important;
            cursor: pointer;
        }

        .form-check-label-custom {
            cursor: pointer;
            margin: 0 !important;
            line-height: 1;
            user-select: none;
        }

        /* Loading state helper */
        .btn-login.is-loading {
            pointer-events: none;
            opacity: 0.8;
        }
    </style>
@endpush

<div class="login-container login-page">
    <div class="split-container" x-data="{ loading: false }">
        <!-- Form Side -->
        <div class="form-side">
            <div class="form-container">
                <form action="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('login.store')) }}" method="POST" id="loginForm" x-on:submit="loading = true">
                    @csrf

                    <!-- Logo & Title -->
                    <div class="mb-4 text-center">
                        <a href="/">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid mb-3"
                                width="80">
                        </a>
                        <h1 class="logo-text h3 mb-2">{{ __('auth.login.welcome_back') }}</h1>
                        <p class="subtitle mb-4">{{ __('auth.login.subtitle') }}</p>
                    </div>

                    <!-- Google Login -->
                    <a href="{{ route('auth.google.redirect') }}" class="google-btn mb-4 text-decoration-none" x-bind:class="{ 'pe-none opacity-50': loading }">
                        <img src="{{ asset('images/google.svg') }}" alt="Google Logo" width="20" height="20">
                        <span>{{ __('auth.login.google_login') }}</span>
                    </a>

                    <!-- Divider -->
                    <div class="or_label mb-4"></div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('auth.login.email') }}</label>
                        <input name="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="{{ __('auth.login.email_placeholder') }}" value="{{ old('email') }}"
                            x-bind:readonly="loading" />
                        @error('email')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('auth.login.password') }}</label>
                        <div class="position-relative">
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="{{ __('auth.login.password_placeholder') }}" x-bind:readonly="loading" />
                            <i class="bi bi-eye password-toggle" onclick="togglePassword()"></i>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <input class="form-check-input-custom" type="checkbox" id="remember" name="remember" x-bind:disabled="loading">
                            <label class="form-check-label-custom small text-secondary" for="remember">
                                {{ __('auth.login.remember_me') }}
                            </label>
                        </div>
                        <a href="{{ route('forgot-password') }}" wire:navigate class="link-primary small fw-bold">
                            {{ __('auth.login.forgot_password') }}
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" 
                        class="btn btn-login w-100 mb-4 d-flex align-items-center justify-content-center gap-2"
                        x-bind:class="{ 'is-loading': loading }"
                        style="min-height: 48px;">
                        <span x-show="loading" x-cloak class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span x-text="loading ? '{{ __('auth.login.continue') }}...' : '{{ __('auth.login.continue') }}'">
                            {{ __('auth.login.continue') }}
                        </span>
                    </button>

                    <!-- Sign Up -->
                    <p class="text-center small text-secondary">
                        {{ __('auth.login.new_user') }}
                        <a href="{{ route('register') }}" wire:navigate class="link-primary fw-bold">
                            {{ __('auth.login.signup') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>

        <!-- Brand Side with Floating Cards -->
        <div class="brand-side d-none d-lg-flex">

            <!-- Card 1: Monthly Revenue -->
            <div class="glass-card">
                <h5>
                    <span>{{ __('auth.login.monthly_revenue') }}</span>
                </h5>
                <div class="amount">$12,450.00</div>

                <svg class="graph-line" viewBox="0 0 100 25" preserveAspectRatio="none">
                    <path d="M0,25 Q20,5 40,15 T100,0" stroke="rgba(255,255,255,0.8)" fill="none" stroke-width="3"
                        stroke-linecap="round" />
                </svg>

                <div class="trend-badge mt-3">
                    {{ __('auth.login.trend_percentage') }}
                </div>
            </div>

            <!-- Card 2: Active Stocks -->
            <div class="glass-card card-2">
                <h5>
                    <span>{{ __('auth.login.active_stocks') }}</span>
                </h5>

                <div class="progress-bars">
                    <div class="progress-bar-item">
                        <div class="progress-bar-fill" style="width: 70%;"></div>
                    </div>
                    <div class="progress-bar-item">
                        <div class="progress-bar-fill" style="width: 40%; background: #93c5fd;"></div>
                    </div>
                </div>

                <p style="color: white; font-size: 13px; margin-top: 10px; opacity: 0.9; margin-bottom: 0;">
                    {{ __('auth.login.performance_text') }}
                </p>
            </div>

            <!-- Bottom Text Content -->
            <div class="brand-content">
                <h2 class="brand-title">{{ __('auth.login.gateway_title') }}</h2>
                <p class="brand-description">
                    {{ __('auth.login.gateway_description') }}
                </p>
            </div>
        </div>
    </div>
</div>


<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.password-toggle');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        }
    }
</script>
