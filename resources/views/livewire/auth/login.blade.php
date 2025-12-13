@php
    $errorTranslations = [
        'The email field is required.' => [
            'en' => 'The email field is required.',
            'ar' => 'البريد الإلكتروني مطلوب.',
        ],
        'The email must be a valid email address.' => [
            'en' => 'The email must be a valid email address.',
            'ar' => 'صيغة البريد الإلكتروني غير صحيحة.',
        ],
        'The password field is required.' => [
            'en' => 'The password field is required.',
            'ar' => 'كلمة المرور مطلوبة.',
        ],
        'The password must be at least 8 characters.' => [
            'en' => 'The password must be at least 8 characters.',
            'ar' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل.',
        ],
        'These credentials do not match our records.' => [
            'en' => 'These credentials do not match our records.',
            'ar' => 'بيانات الاعتماد غير صحيحة.',
        ],
    ];
@endphp


<div class="login-container">
    <div class="split-container">
        <!-- Form Side -->
        <div class="form-side">
            <div class="form-container">
                <form action="/login" method="POST">
                    @csrf

                    <!-- Logo & Title -->
                    <div class="mb-4">
                        <h1 class="logo-text">مرحباً بعودتك</h1>
                        <p class="subtitle">سجّل دخولك لمتابعة فرصك الاستثمارية</p>
                    </div>

                    <!-- Google Login -->
                    <button type="button" class="google-btn mb-3">
                        <svg width="18" height="18" viewBox="0 0 24 24">
                            <path fill="#4285F4"
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853"
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC05"
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path fill="#EA4335"
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                        <span>{{ __('pages.login.google_login') }}</span>
                    </button>

                    <!-- Divider -->
                    <div class="divider">
                        <span>أو</span>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('pages.login.email') }}</label>
                        <input name="email" type="email" class="form-control" placeholder="name@example.com"
                            value="{{ old('email') }}" />
                    </div>
                    @error('email')
                        <div class="alert alert-danger border-0 p-2 mb-3 small">
                            {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                        </div>
                    @enderror

                    <!-- Password -->
                    @php
                        $passwordError = $errors->first('password');
                    @endphp
                    <div class="mb-3">
                        <label class="form-label">{{ __('pages.login.password') }}</label>
                        <div class="position-relative">
                            <input name="password" type="password" class="form-control" id="password"
                                placeholder="••••••••" />
                            <i class="bi bi-eye password-toggle" onclick="togglePassword()"></i>
                        </div>
                    </div>
                    @if ($passwordError)
                        <div class="alert alert-danger border-0 p-2 mb-3 small">
                            {{ $errorTranslations[$passwordError][app()->getLocale()] ?? $passwordError }}
                        </div>
                    @endif

                    <!-- Remember & Forgot -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input" />
                            <label for="remember" class="form-check-label small" style="color: #64748b;">
                                {{ __('pages.login.remember_me') }}
                            </label>
                        </div>
                        <a href="{{ route('forgot-password') }}" wire:navigate class="link-primary small">
                            {{ __('pages.login.forgot') }}
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login">
                        {{ __('pages.login.continue') }}
                    </button>

                    <!-- Sign Up -->
                    <p class="text-center mt-4 small" style="color: #64748b;">
                        {{ __('pages.login.new_user') }}
                        <a href="{{ route('register') }}" wire:navigate class="link-primary">
                            {{ __('pages.login.signup') }}
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
                    <span>الأرباح الشهرية</span>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <circle cx="2" cy="8" r="1.5" />
                        <circle cx="8" cy="8" r="1.5" />
                        <circle cx="14" cy="8" r="1.5" />
                    </svg>
                </h5>
                <div class="amount">$12,450.00</div>

                <svg class="graph-line" viewBox="0 0 100 25" preserveAspectRatio="none">
                    <path d="M0,25 Q20,5 40,15 T100,0" stroke="rgba(255,255,255,0.8)" fill="none" stroke-width="3"
                        stroke-linecap="round" />
                </svg>

                <div style="margin-top: 15px;">
                    <span class="trend-badge">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 3.5a.5.5 0 0 1 .5.5v4.5H13a.5.5 0 0 1 0 1H8.5V14a.5.5 0 0 1-1 0V9.5H3a.5.5 0 0 1 0-1h4.5V4a.5.5 0 0 1 .5-.5z" />
                        </svg>
                        8.2%
                    </span>
                </div>
            </div>

            <!-- Card 2: Active Stocks -->
            <div class="glass-card card-2">
                <h5>
                    <span>الأسهم النشطة</span>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M7.5 1.018a7 7 0 0 0-4.79 11.566L7.5 7.793V1.018zm1 0V7.5h6.482A7.001 7.001 0 0 0 8.5 1.018zM14.982 8.5H8.207l-4.79 4.79A7 7 0 0 0 14.982 8.5z" />
                    </svg>
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
                    أداء ممتاز في قطاع التكنولوجيا
                </p>
            </div>

            <!-- Bottom Text Content -->
            <div class="brand-content">
                <h2 class="brand-title">بوابتك للاستثمار الآمن</h2>
                <p class="brand-description">
                    أدوات تحليل متقدمة، تقارير فورية، وحماية على مستوى البنوك لبياناتك المالية.
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
