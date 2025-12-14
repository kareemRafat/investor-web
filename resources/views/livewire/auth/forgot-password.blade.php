@php
    $errorTranslations = [
        'The email field is required.' => [
            'en' => 'The email field is required.',
            'ar' => 'حقل البريد الإلكتروني مطلوب.',
        ],
        'The email must be a valid email address.' => [
            'en' => 'The email must be a valid email address.',
            'ar' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحاً.',
        ],
        "We can't find a user with that email address." => [
            'en' => "We can't find a user with that email address.",
            'ar' => 'لا يمكننا العثور على مستخدم بعنوان البريد الإلكتروني هذا.',
        ],
        'Please wait before retrying.' => [
            'en' => 'Please wait before retrying.',
            'ar' => 'يرجى الانتظار قبل المحاولة مرة أخرى.',
        ],
        'The selected email is invalid.' => [
            'en' => 'The selected email is invalid.',
            'ar' => 'البريد الإلكتروني المحدد غير صالح.',
        ],
    ];
@endphp

@push('styles')
    <style>
        /* ===== FORGOT PASSWORD PAGE STYLES ===== */

        .forgot-password-container .split-container {
            height: 100vh;
            overflow: hidden;
        }

        .forgot-password-container .form-side {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .forgot-password-container .brand-side {
            height: 100vh;
            overflow: hidden;
        }

        .forgot-password-container .form-side::-webkit-scrollbar {
            width: 6px;
        }

        .forgot-password-container .form-side::-webkit-scrollbar-track {
            background: transparent;
        }

        .forgot-password-container .form-side::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .forgot-password-container .form-side::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endpush

<div class="login-container forgot-password-container">
    <div class="split-container">
        <!-- Form Side -->
        <div class="form-side">
            <div class="form-container">
                <form action="/forgot-password" method="POST">
                    @csrf

                    <!-- Logo & Title -->
                    <div class="mb-4">
                        <a href="/" wire:navigate>
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid mb-3"
                                width="80">
                        </a>
                        <h1 class="logo-text">{{ __('auth.forgot_password.title') }}</h1>
                        <p class="subtitle">{{ __('auth.forgot_password.subtitle') }}</p>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('auth.forgot_password.email') }}</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="{{ __('auth.forgot_password.email_placeholder') }}"
                            value="{{ old('email') }}" />
                    </div>

                    @error('email')
                        <div class="alert alert-danger border-0 p-2 mb-3 small">
                            {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                        </div>
                    @enderror

                    @if (session('status'))
                        <div class="alert alert-success border-0 p-2 mb-3 small">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-login w-100 mb-3">
                        {{ __('auth.forgot_password.send') }}
                    </button>

                    <!-- Info Text -->
                    <div class="text-center mb-3">
                        <p class="small" style="color: #64748b;">
                            {{ __('auth.forgot_password.not_received') }}
                            <span class="text-primary">{{ __('auth.forgot_password.check_spam') }}</span>
                        </p>
                    </div>

                    <!-- Back Link -->
                    @php
                        $previous = url()->previous();
                        $current = url()->current();
                    @endphp

                    <div class="text-center">
                        <a href="{{ $previous !== $current ? $previous : route('login') }}" wire:navigate
                            class="link-primary small">
                            <i class="bi bi-arrow-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }} me-1"></i>
                            {{ __('auth.forgot_password.back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Brand Side -->
        <div class="brand-side d-none d-lg-flex">

            <!-- Card 1: Security Stats -->
            <div class="glass-card">
                <h5>
                    <span>{{ __('auth.forgot_password.secure_accounts') }}</span>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                        <path
                            d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                </h5>
                <div class="amount">99.9%</div>

                <svg class="graph-line" viewBox="0 0 100 25" preserveAspectRatio="none">
                    <path d="M0,15 L100,15" stroke="rgba(255,255,255,0.8)" fill="none" stroke-width="3"
                        stroke-linecap="round" />
                </svg>

                <div style="margin-top: 15px;">
                    <span class="trend-badge">
                        <i class="bi bi-shield-check"></i>
                        {{ __('auth.forgot_password.complete_security') }}
                    </span>
                </div>
            </div>

            <!-- Card 2: Recovery Time -->
            <div class="glass-card card-2">
                <h5>
                    <span>{{ __('auth.forgot_password.recovery_time') }}</span>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                    </svg>
                </h5>

                <div class="amount" style="font-size: 28px;">{{ __('auth.forgot_password.minutes') }}</div>

                <div class="progress-bars">
                    <div class="progress-bar-item">
                        <div class="progress-bar-fill" style="width: 90%;"></div>
                    </div>
                </div>

                <p style="color: white; font-size: 13px; margin-top: 10px; opacity: 0.9; margin-bottom: 0;">
                    {{ __('auth.forgot_password.quick_recovery') }}
                </p>
            </div>

            <!-- Bottom Content -->
            <div class="brand-content">
                <h2 class="brand-title">{{ __('auth.forgot_password.help_title') }}</h2>
                <p class="brand-description">
                    {{ __('auth.forgot_password.help_description') }}
                </p>
            </div>
        </div>
    </div>
</div>
