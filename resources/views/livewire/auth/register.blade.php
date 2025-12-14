                        @php
                            $currentLocale = app()->getLocale();

                            // Manual error translation mapping
                            $errorTranslations = [
                                // Name errors
                                'The name field is required.' => [
                                    'en' => 'The name field is required.',
                                    'ar' => 'حقل الاسم مطلوب.',
                                ],
                                'The name must be at least 2 characters.' => [
                                    'en' => 'The name must be at least 2 characters.',
                                    'ar' => 'يجب أن يكون الاسم على الأقل حرفين.',
                                ],
                                'The name may not be greater than 255 characters.' => [
                                    'en' => 'The name may not be greater than 255 characters.',
                                    'ar' => 'يجب ألا يتجاوز الاسم 255 حرف.',
                                ],

                                // Email errors
                                'The email field is required.' => [
                                    'en' => 'The email field is required.',
                                    'ar' => 'حقل البريد الإلكتروني مطلوب.',
                                ],
                                'The email must be a valid email address.' => [
                                    'en' => 'The email must be a valid email address.',
                                    'ar' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحاً.',
                                ],
                                'The email has already been taken.' => [
                                    'en' => 'The email has already been taken.',
                                    'ar' => 'البريد الإلكتروني مُستخدم من قبل.',
                                ],

                                // Phone errors
                                'The phone field is required.' => [
                                    'en' => 'The phone field is required.',
                                    'ar' => 'حقل الهاتف مطلوب.',
                                ],
                                'The phone format is invalid.' => [
                                    'en' => 'The phone format is invalid.',
                                    'ar' => 'تنسيق الهاتف غير صالح.',
                                ],
                                'The phone has already been taken.' => [
                                    'en' => 'The phone has already been taken.',
                                    'ar' => 'رقم الهاتف مُستخدم من قبل.',
                                ],

                                // Password errors
                                'The password field is required.' => [
                                    'en' => 'The password field is required.',
                                    'ar' => 'حقل كلمة المرور مطلوب.',
                                ],
                                'The password must be at least 8 characters.' => [
                                    'en' => 'The password must be at least 8 characters.',
                                    'ar' => 'يجب أن تكون كلمة المرور 8 أحرف على الأقل.',
                                ],
                                'The password confirmation does not match.' => [
                                    'en' => 'The password confirmation does not match.',
                                    'ar' => 'تأكيد كلمة المرور غير متطابق.',
                                ],
                                'The password must contain at least one uppercase letter.' => [
                                    'en' => 'The password must contain at least one uppercase letter.',
                                    'ar' => 'يجب أن تحتوي كلمة المرور على حرف كبير واحد على الأقل.',
                                ],
                                'The password must contain at least one lowercase letter.' => [
                                    'en' => 'The password must contain at least one lowercase letter.',
                                    'ar' => 'يجب أن تحتوي كلمة المرور على حرف صغير واحد على الأقل.',
                                ],
                                'The password must contain at least one number.' => [
                                    'en' => 'The password must contain at least one number.',
                                    'ar' => 'يجب أن تحتوي كلمة المرور على رقم واحد على الأقل.',
                                ],
                                'The password must contain at least one symbol.' => [
                                    'en' => 'The password must contain at least one symbol.',
                                    'ar' => 'يجب أن تحتوي كلمة المرور على رمز واحد على الأقل.',
                                ],

                                // Country errors
                                'The residence country field is required.' => [
                                    'en' => 'The residence country field is required.',
                                    'ar' => 'حقل بلد الإقامة مطلوب.',
                                ],

                                // Job title errors
                                'The job title field is required.' => [
                                    'en' => 'The job title field is required.',
                                    'ar' => 'حقل المسمى الوظيفي مطلوب.',
                                ],

                                // Birth date errors
                                'The birth date field is required.' => [
                                    'en' => 'The birth date field is required.',
                                    'ar' => 'حقل تاريخ الميلاد مطلوب.',
                                ],
                                'The birth date does not match the format Y-m-d.' => [
                                    'en' => 'The birth date format is invalid.',
                                    'ar' => 'تنسيق تاريخ الميلاد غير صالح.',
                                ],
                                'The birth date must be a date before today.' => [
                                    'en' => 'The birth date must be a date before today.',
                                    'ar' => 'يجب أن يكون تاريخ الميلاد قبل اليوم.',
                                ],
                            ];
                        @endphp

                        @push('styles')
                            <style>
                                /* ===== REGISTER PAGE OVERRIDES ===== */
                                .login-container .split-container {
                                    height: auto;
                                }

                                .login-container .register-container {
                                    max-width: 600px;
                                }

                                .register-grid {
                                    display: grid;
                                    grid-template-columns: 1fr 1fr;
                                    gap: 16px;
                                }

                                @media (max-width: 576px) {
                                    .register-grid {
                                        grid-template-columns: 1fr;
                                    }
                                }

                                /* ===== Reverse layout for Register page only ===== */
                                .login-container.register-page .split-container {
                                    flex-direction: row-reverse;
                                }

                                /* موبايل: نخليه طبيعي */
                                @media (max-width: 991px) {
                                    .login-container.register-page .split-container {
                                        flex-direction: column;
                                    }
                                }


                            </style>
                        @endpush

                        <div class="login-container register-page">
                            <div class="split-container">
                                <div class="form-side">
                                    <div class="form-container register-container">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <!-- Logo & Title -->
                                            <div class="mb-4 text-center">
                                                <img src="{{ asset('images/logo.svg') }}" alt="Logo"
                                                    class="img-fluid mb-2" width="100">
                                                <h1 class="logo-text">{{ __('auth.register.title') }}</h1>
                                                <p class="subtitle">{{ __('auth.register.subtitle') }}</p>
                                            </div>

                                            <!-- Register with Google -->
                                            <div
                                                class="mb-3 bg_login_google d-flex justify-content-center align-items-center gap-4 p-2 py-3 small rounded-2">
                                                <img src="{{ asset('images/google.svg') }}" alt="Google Logo"
                                                    class="img-fluid" width="20" height="20">
                                                <span>{{ __('pages.register.google') }}</span>
                                            </div>

                                            <!-- OR -->
                                            <div class="text-center mb-3">
                                                <label
                                                    class="or_label d-flex justify-content-center align-items-center bg-white">
                                                    {{ __('pages.register.or') }}
                                                </label>
                                            </div>

                                            <!-- Fields Grid -->
                                            <div class="register-grid mb-3">
                                                <!-- Name -->
                                                <div>
                                                    <label class="form-label">{{ __('pages.register.name') }}</label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') error @enderror"
                                                        value="{{ old('name') }}"
                                                        placeholder="{{ __('pages.register.name') }}">
                                                    @error('name')
                                                        <div class="error-message">
                                                            {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Email -->
                                                <div>
                                                    <label class="form-label">{{ __('pages.register.email') }}</label>
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') error @enderror"
                                                        value="{{ old('email') }}"
                                                        placeholder="{{ __('pages.register.email') }}">
                                                    @error('email')
                                                        <div class="error-message">
                                                            {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Phone -->
                                                <div>
                                                    <label class="form-label">{{ __('pages.register.phone') }}</label>
                                                    <input type="tel" name="phone"
                                                        class="form-control @error('phone') error @enderror"
                                                        value="{{ old('phone') }}"
                                                        placeholder="{{ __('pages.register.phone') }}">
                                                    @error('phone')
                                                        <div class="error-message">
                                                            {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Residence Country -->
                                                <div>
                                                    <label
                                                        class="form-label">{{ __('pages.register.residence_country') }}</label>
                                                    <select name="residence_country"
                                                        class="form-control  @error('residence_country') error @enderror">
                                                        <option value="">
                                                            {{ __('profile.placeholders.select_country') }}</option>
                                                        @foreach (__('profile.countries') as $name)
                                                            <option value="{{ $name }}"
                                                                {{ old('residence_country') == $name ? 'selected' : '' }}>
                                                                {{ $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('residence_country')
                                                        <div class="error-message">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Job Title -->
                                                <div>
                                                    <label
                                                        class="form-label">{{ __('pages.register.job_title') }}</label>
                                                    <input type="text" name="job_title"
                                                        class="form-control @error('job_title') error @enderror"
                                                        value="{{ old('job_title') }}"
                                                        placeholder="{{ __('pages.register.job_title') }}">
                                                    @error('job_title')
                                                        <div class="error-message">
                                                            {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Birth Date -->
                                                <div>
                                                    <label
                                                        class="form-label">{{ __('pages.register.birth_date') }}</label>
                                                    <input type="date" name="birth_date"
                                                        class="form-control @error('birth_date') error @enderror"
                                                        value="{{ old('birth_date') }}">
                                                    @error('birth_date')
                                                        <div class="error-message">
                                                            {{ $errorTranslations[$message][app()->getLocale()] ?? $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Password -->
                                                <div>
                                                    <x-auth.password-input name="password"
                                                        label="{{ __('pages.login.password') }}" :error="$errors->first('password')
                                                            ? $errorTranslations[$errors->first('password')][
                                                                    app()->getLocale()
                                                                ] ?? $errors->first('password')
                                                            : null" />
                                                </div>

                                                <!-- Password Confirmation -->
                                                <div>
                                                    <x-auth.password-input name="password_confirmation"
                                                        :label="__('pages.register.password_confirmation')" />
                                                </div>
                                            </div>

                                            <!-- Terms -->
                                            <div class="form-check mb-4">
                                                <label class="d-flex align-items-center gap-2 small"
                                                    style="color:#64748b;">
                                                    <input type="checkbox" name="terms">
                                                    {!! __('auth.register.accept_terms') !!}
                                                </label>
                                            </div>

                                            <!-- Submit -->
                                            <button type="submit" class="btn btn-login w-100">
                                                {{ __('pages.register.continue') }}
                                            </button>

                                            <!-- Login Link -->
                                            <p class="text-center mt-4 small" style="color:#64748b;">
                                                {{ __('pages.register.already_have_account') }}
                                                <a href="{{ route('login') }}"
                                                    class="link-primary">{{ __('pages.register.login') }}</a>
                                            </p>
                                        </form>

                                    </div>
                                </div>

                                <!--  Brand Side  -->
                                <div class="brand-side d-none d-lg-flex">

                                    <!-- Floating Card 1 -->
                                    <div class="glass-card">
                                        <h5>
                                            <span>{{ __('auth.login.monthly_revenue') }}</span>
                                        </h5>

                                        <div class="amount">$18,920</div>

                                        <svg class="graph-line" viewBox="0 0 100 25" preserveAspectRatio="none">
                                            <path d="M0,25 Q20,10 40,18 T100,5" stroke="rgba(255,255,255,0.8)"
                                                fill="none" stroke-width="3" stroke-linecap="round" />
                                        </svg>

                                        <div class="trend-badge mt-3">
                                            +24%
                                        </div>
                                    </div>

                                    <!-- Floating Card 2 -->
                                    <div class="glass-card card-2">
                                        <h5>
                                            <span>{{ __('auth.login.active_stocks') }}</span>
                                        </h5>

                                        <div class="progress-bars">
                                            <div class="progress-bar-item">
                                                <div class="progress-bar-fill" style="width: 65%"></div>
                                            </div>
                                            <div class="progress-bar-item">
                                                <div class="progress-bar-fill" style="width: 45%; background:#93c5fd;">
                                                </div>
                                            </div>
                                        </div>

                                        <p style="color:white;font-size:13px;margin-top:10px;opacity:.9;">
                                            {{ __('auth.login.performance_text') }}
                                        </p>
                                    </div>

                                    <!-- Brand Text -->
                                    <div class="brand-content">
                                        <h2 class="brand-title">{{ __('auth.login.gateway_title') }}</h2>
                                        <p class="brand-description">
                                            {{ __('auth.login.gateway_description') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
