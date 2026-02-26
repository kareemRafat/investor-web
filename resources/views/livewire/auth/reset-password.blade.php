@push('styles')
    <style>
        /* ===== RESET PASSWORD PAGE STYLES ===== */
        .reset-password-container .split-container {
            height: 100vh;
            overflow: hidden;
        }

        .reset-password-container .form-side {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 40px 30px;
        }

        .reset-password-container .brand-side {
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .reset-password-container .form-side::-webkit-scrollbar {
            width: 6px;
        }

        .reset-password-container .form-side::-webkit-scrollbar-track {
            background: transparent;
        }

        .reset-password-container .form-side::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .reset-password-container .form-side::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endpush

<div class="login-container reset-password-container">
    <div class="split-container" x-data="{ loading: false }">
        <!-- Form Side -->
        <div class="form-side">
            <div class="form-container">
                <form action="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), route('password.update')) }}" method="POST" x-on:submit="loading = true">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <input type="hidden" name="email" value="{{ request()->email }}">

                    <div class="d-flex flex-column gap-3">
                        <!-- Logo -->
                        <div class="mb-3 text-center">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid" width="100">
                        </div>

                        <!-- Titles -->
                        <h1 class="logo-text">{{ __('auth.reset_password.title') }}</h1>
                        <p class="subtitle">{{ __('auth.reset_password.subtitle') }}</p>

                        <!-- Password -->
                        <x-auth.password-input name="password" :label="__('auth.reset_password.password')" />
                        <x-auth.password-input name="password_confirmation" :label="__('auth.reset_password.password_confirmation')" />

                        <!-- Password Requirements -->
                        {{-- <div class="card border-0 bg-light p-3 mb-3">
                            <h6 class="small mb-2">{{ __('auth.reset_password.password_requirements') }}</h6>
                            <ul class="list-unstyled small mb-0">
                                <li class="mb-1">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    {{ __('auth.reset_password.min_length') }}
                                </li>
                                <li class="mb-1">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    {{ __('auth.reset_password.uppercase') }}
                                </li>
                                <li class="mb-1">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    {{ __('auth.reset_password.lowercase') }}
                                </li>
                                <li>
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    {{ __('auth.reset_password.number') }}
                                </li>
                            </ul>
                        </div> --}}

                        @error('email')
                            <div class="alert alert-danger border-0 p-2 mb-3 small">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror

                        @if (session('status'))
                            <div class="alert alert-success border-0 p-2 mb-3 small">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Submit -->
                        <button type="submit"
                            class="btn btn-login w-100 d-flex align-items-center justify-content-center gap-2"
                            x-bind:class="{ 'is-loading': loading }" style="min-height: 48px;">
                            <span x-show="loading" x-cloak class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            <span
                                x-text="loading ? '{{ __('auth.reset_password.confirm') }}...' : '{{ __('auth.reset_password.confirm') }}'">
                                {{ __('auth.reset_password.confirm') }}
                            </span>
                        </button>



                        <p class="text-center mt-3 small text-dark">
                            {{ __('auth.reset_password.note') }}
                        </p>
                    </div>
                    <!-- Back Link -->
                    <div class="text-center mt-1">
                        <a href="{{  route('login') }}" wire:navigate
                            class="link-primary small">
                            <i class="bi bi-arrow-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }} me-1"></i>
                            {{ __('auth.forgot_password.back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Brand Side -->
        <div class="brand-side d-none d-lg-flex flex-column justify-content-center align-items-center">
            <div class="glass-card mb-4">
                <h5>{{ __('auth.verify_email.secure_accounts') }}</h5>
                <div class="amount">99.9%</div>
                <p class="small mt-2" style="color: white; opacity: 0.8;">
                    أمان مضمون لحسابك
                </p>
            </div>

            <div class="glass-card card-2 mb-4">
                <h5>{{ __('auth.login.active_stocks') }}</h5>
                <div class="progress-bars">
                    <div class="progress-bar-item">
                        <div class="progress-bar-fill" style="width: 70%;"></div>
                    </div>
                </div>
                <p class="small mt-2" style="color: white; opacity: 0.8;">
                    استثمار آمن
                </p>
            </div>

            <div class="brand-content text-center">
                <h2 class="brand-title">{{ __('auth.login.gateway_title') }}</h2>
                <p class="brand-description">{{ __('auth.login.gateway_description') }}</p>
            </div>
        </div>
    </div>
</div>
