@php
    $errorTranslations = [
        // Email
        'The email field is required.' => [
            'en' => 'The email field is required.',
            'ar' => 'البريد الإلكتروني مطلوب.',
        ],
        'The email must be a valid email address.' => [
            'en' => 'The email must be a valid email address.',
            'ar' => 'صيغة البريد الإلكتروني غير صحيحة.',
        ],

        // Password
        'The password field is required.' => [
            'en' => 'The password field is required.',
            'ar' => 'كلمة المرور مطلوبة.',
        ],
        'The password must be at least 8 characters.' => [
            'en' => 'The password must be at least 8 characters.',
            'ar' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل.',
        ],

        // Credentials
        'These credentials do not match our records.' => [
            'en' => 'These credentials do not match our records.',
            'ar' => 'بيانات الاعتماد غير صحيحة.',
        ],
    ];
@endphp
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
                            {{ __('pages.login.welcome_back') }}
                        </h6>
                        <h4 class="fw-bold">
                            {{ __('pages.login.login_title') }}
                        </h4>
                        <!-- login with google -->
                        <div
                            class="mb-2 mt-1 bg_login_google d-flex justify-content-center align-items-center gap-4 p-2 py-3 small rounded-2">
                            <img src="{{ asset('images/google.svg') }}" alt="Google Logo" class="img-fluid"
                                width="20" height="20" />
                            <span>
                                {{ __('pages.login.google_login') }}
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
                                placeholder="{{ __('pages.login.email') }}" />
                            <label for="floatingInput" class="form-label">{{ __('pages.login.email') }}</label>
                        </div>
                        @error('email')
                            <span class="alert alert-danger border-0 p-2 bg-danger text-white">
                                {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                            </span>
                        @enderror

                        @php
                            $passwordError = $errors->first('password');
                        @endphp
                        <x-auth.password-input name="password" label="{{ __('pages.login.password') }}"
                            :error="$passwordError
                                ? $errorTranslations[$passwordError][app()->getLocale()] ?? $passwordError
                                : null" />
                        <div class="d-flex mb-3">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input me-2" />
                            <label for="remember" class="form-check-label me-2 small text-muted">
                                {{ __('pages.login.remember_me') }}
                            </label>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="{{ route('forgot-password') }}" wire:navigate
                                class="text-decoration-none text-danger small">
                                {{ __('pages.login.forgot') }}
                            </a>
                        </div>
                        <button type="submit"
                            class="btn btn-custom py-2 d-flex justify-content-center gap-4 align-items-center small w-100">
                            <span class="small">
                                {{ __('pages.login.continue') }}
                            </span>
                            <!-- icon chervon -->
                            <i
                                class="bi {{ app()->getLocale() === 'ar' ? 'bi-chevron-left' : 'bi-chevron-right' }} small"></i>
                        </button>
                        <!-- مستخدم جديد؟ -->
                        <div class="text-center mt-5">
                            <span class="small">
                                {{ __('pages.login.new_user') }}
                                <a href="{{ route('register') }}" wire:navigate
                                    class="text-decoration-none text-primary">
                                    {{ __('pages.login.signup') }}
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
