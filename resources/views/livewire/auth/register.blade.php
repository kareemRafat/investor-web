<!-- Register Section -->
<div class="container">
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- Register Form -->
            <div class="col-md-6 col-12">
                <form action="/register" method="POST">
                    @csrf
                    <div class="d-flex flex-column gap-1">
                        <!-- logo -->
                        <div class="mb-3">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="img-fluid" width="100">
                        </div>
                        <h6 class="text-secondary mb-0 small">
                            {{ __('pages.register.welcome') }}
                        </h6>
                        <h4 class="fw-bold">
                            {{ __('pages.register.create_account') }}
                        </h4>
                        <!-- Register with google -->
                        <div
                            class="mb-2 mt-1 bg_login_google d-flex justify-content-center align-items-center gap-4 p-2 py-3 small rounded-2">
                            <img src="{{ asset('images/google.svg') }}" alt="Google Logo" class="img-fluid"
                                width="20" height="20" />
                            <span>
                                {{ __('pages.register.google') }}
                            </span>
                        </div>
                        <!-- OR -->
                        <div class="text-center mb-2">
                            <label class="or_label my-4 d-flex justify-content-center align-items-center bg-white">
                                {{ __('pages.register.or') }}
                            </label>
                        </div>

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

                        <!-- name -->
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="floatingInput"
                                placeholder="{{ __('pages.register.name') }}" value="{{ old('name') }}" />
                            <label for="floatingInput" class="form-label">{{ __('pages.register.name') }}</label>
                            @error('name')
                                @php
                                    $translatedError = isset($errorTranslations[$message][$currentLocale])
                                        ? $errorTranslations[$message][$currentLocale]
                                        : $message;
                                @endphp
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $translatedError }}
                                </div>
                            @enderror
                        </div>

                        <!-- email -->
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="{{ __('pages.register.email') }}" value="{{ old('email') }}" />
                            <label for="floatingInput" class="form-label">{{ __('pages.register.email') }}</label>
                            @error('email')
                                @php
                                    $translatedError = isset($errorTranslations[$message][$currentLocale])
                                        ? $errorTranslations[$message][$currentLocale]
                                        : $message;
                                @endphp
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $translatedError }}
                                </div>
                            @enderror
                        </div>

                        <!-- phone -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="phone" type="tel" class="form-control" id="floatingPhone"
                                placeholder="{{ __('pages.register.phone') }}" value="{{ old('phone') }}" />
                            <label for="floatingPhone" class="form-label">{{ __('pages.register.phone') }}</label>
                            @error('phone')
                                @php
                                    $translatedError = isset($errorTranslations[$message][$currentLocale])
                                        ? $errorTranslations[$message][$currentLocale]
                                        : $message;
                                @endphp
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $translatedError }}
                                </div>
                            @enderror
                        </div>

                        <!-- password -->
                        @php
                            $passwordError = $errors->first('password');
                        @endphp
                        <x-auth.password-input name="password" label="{{ __('pages.login.password') }}"
                            :error="$passwordError
                                ? $errorTranslations[$passwordError][app()->getLocale()] ?? $passwordError
                                : null" />


                        <!-- password confirmation -->
                        <x-auth.password-input name="password_confirmation" :label="__('pages.register.password_confirmation')" />


                        <!-- residence_country -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="residence_country" type="text" class="form-control" id="floatingAddress"
                                placeholder="{{ __('pages.register.residence_country') }}"
                                value="{{ old('residence_country') }}" />
                            <label for="floatingAddress"
                                class="form-label">{{ __('pages.register.residence_country') }}</label>
                            @error('residence_country')
                                @php
                                    $translatedError = isset($errorTranslations[$message][$currentLocale])
                                        ? $errorTranslations[$message][$currentLocale]
                                        : $message;
                                @endphp
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $translatedError }}
                                </div>
                            @enderror
                        </div>

                        <!-- job_title -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="job_title" type="text" class="form-control" id="floatingJob"
                                placeholder="{{ __('pages.register.job_title') }}" value="{{ old('job_title') }}" />
                            <label for="floatingJob" class="form-label">{{ __('pages.register.job_title') }}</label>
                            @error('job_title')
                                @php
                                    $translatedError = isset($errorTranslations[$message][$currentLocale])
                                        ? $errorTranslations[$message][$currentLocale]
                                        : $message;
                                @endphp
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $translatedError }}
                                </div>
                            @enderror
                        </div>

                        <!-- birth_date -->
                        <div class="form-floating mb-3 position-relative">
                            <input name="birth_date" type="date" class="form-control" id="floatingBirthDate"
                                placeholder="{{ __('pages.register.birth_date') }}" value="{{ old('birth_date') }}" />
                            <label for="floatingBirthDate"
                                class="form-label">{{ __('pages.register.birth_date') }}</label>
                            @error('birth_date')
                                @php
                                    $translatedError = isset($errorTranslations[$message][$currentLocale])
                                        ? $errorTranslations[$message][$currentLocale]
                                        : $message;
                                @endphp
                                <div class="text-danger mt-2 fw-semibold">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $translatedError }}
                                </div>
                            @enderror
                        </div>

                        <!-- forgot password -->
                        <div class="d-flex mb-3">
                            <a href="{{ route('forgot-password') }}" wire:navigate
                                class="text-decoration-none text-danger small">
                                {{ __('pages.register.forgot_password') }}
                            </a>
                        </div>

                        <!-- submit -->
                        <button type="submit"
                            class="btn btn-custom py-2 d-flex justify-content-center gap-4 align-items-center small w-100">
                            <span class="small">
                                {{ __('pages.register.continue') }}
                            </span>
                            <i
                                class="bi {{ app()->getLocale() === 'ar' ? 'bi-chevron-left' : 'bi-chevron-right' }} small"></i>
                        </button>

                        <!-- already have account -->
                        <div class="text-center my-5">
                            <span class="small">
                                {{ __('pages.register.already_have_account') }}
                                <a href="{{ route('login') }}" wire:navigate
                                    class="text-decoration-none text-primary">
                                    {{ __('pages.register.login') }}
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
