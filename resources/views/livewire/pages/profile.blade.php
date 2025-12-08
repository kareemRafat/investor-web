<!-- Profile Section -->
<div class="container mb-5">
    @once
        <style>
            .profile-card {
                transition: transform 0.2s;
            }

            .profile-card:hover {
                transform: translateY(-2px);
            }

            .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1rem;
                border-radius: 20px;
                font-size: 0.875rem;
                font-weight: 600;
            }

            .status-badge.pending {
                background-color: #fff3cd;
                color: #856404;
            }

            .status-badge.published {
                background-color: #d1ecf1;
                color: #0c5460;
            }

            .status-badge.rejected {
                background-color: #f8d7da;
                color: #721c24;
            }

            .status-badge.connected {
                background-color: #d4edda;
                color: #155724;
            }

            .status-indicator {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                display: inline-block;
            }

            .idea-card {
                border-right: 4px solid transparent;
                transition: all 0.3s;
            }

            .idea-card:hover {
                border-right-color: var(--bs-primary);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .profile-header {
                background: linear-gradient(135deg, var(--bs-primary) 0%, #5a6fd8 100%);
                color: white;
                padding: 2rem;
                border-radius: 12px;
                margin-bottom: 2rem;
            }

            .info-card {
                border: none;
                border-radius: 12px;
                overflow: hidden;
            }

            .section-title {
                position: relative;
                padding-right: 1rem;
            }

            .section-title::before {
                content: '';
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 4px;
                height: 60%;
                background-color: var(--bs-primary);
                border-radius: 2px;
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                object-fit: cover;
                border: 4px solid white;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            }

            .avatar-upload {
                position: relative;
                display: inline-block;
            }

            .avatar-upload-btn {
                position: absolute;
                bottom: 45px;
                {{ app()->getLocale() == 'ar' ? 'left: 0;' : 'right: 0;' }} background: var(--bs-primary);
                color: white;
                border-radius: 50%;
                width: 35px;
                height: 35px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                border: 3px solid white;
                transition: all 0.3s;
            }

            .avatar-upload-btn:hover {
                background: #303f9f;
                transform: scale(1.1);
            }

            .info-item {
                padding: 1rem;
                background: #f8f9fa;
                border-radius: 8px;
                border-right: 3px solid transparent;
                transition: all 0.3s;
            }

            .info-item:hover {
                border-right-color: var(--bs-primary);
                background: #e9ecef;
            }

            .info-item .icon-wrapper {
                width: 45px;
                height: 45px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
            }

            .stats-card {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 1.5rem;
                border-radius: 12px;
                text-align: center;
                transition: transform 0.3s;
            }

            .stats-card:hover {
                transform: translateY(-5px);
            }

            .form-control:focus,
            .form-select:focus {
                border-color: var(--bs-primary);
                box-shadow: 0 0 0 0.2rem rgba(63, 81, 181, 0.15);
            }

            .profile-tabs {
                border-bottom: 2px solid #e9ecef;
            }

            .profile-tabs .nav-link {
                color: #6c757d;
                border: none;
                padding: 1rem 1.5rem;
                position: relative;
                font-weight: 600;
            }

            .profile-tabs .nav-link:hover {
                color: var(--bs-primary);
            }

            .profile-tabs .nav-link.active {
                color: var(--bs-primary);
            }

            .profile-tabs .nav-link.active::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                right: 0;
                height: 2px;
                background: var(--bs-primary);
            }

            @media (max-width: 768px) {
                .idea-card {
                    border-right: none;
                    border-top: 4px solid transparent;
                }

                .idea-card:hover {
                    border-top-color: var(--bs-primary);
                }

                .profile-avatar {
                    width: 100px;
                    height: 100px;
                }
            }
        </style>
    @endonce
    <div class="row">
        <!-- Profile Header -->
        <div class="profile-header shadow-sm">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">{{ __('profile.title') }}</h3>
                    <p class="mb-0 opacity-75">{{ __('profile.subtitle') }}</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <div class="d-flex justify-content-lg-end gap-2">
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="bi bi-lightbulb me-1"></i>
                            5 {{ __('profile.stats.ideas') }}
                        </span>
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="bi bi-calendar-check me-1"></i>
                            {{ __('profile.stats.since', ['year' => 2024]) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Information Section -->
        <div class="card info-card shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <ul class="nav profile-tabs nav-fill flex-column flex-sm-row" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                            data-bs-target="#personal" type="button" role="tab">
                            <i class="{{ __('profile.tabs.personal.icon') }} me-2"></i>
                            {{ __('profile.tabs.personal.title') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab">
                            <i class="{{ __('profile.tabs.contact.icon') }} me-2"></i>
                            {{ __('profile.tabs.contact.title') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security"
                            type="button" role="tab">
                            <i class="{{ __('profile.tabs.security.icon') }} me-2"></i>
                            {{ __('profile.tabs.security.title') }}
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content" id="profileTabsContent">
                    <!-- Personal Tab -->
                    <div class="tab-pane fade show active" id="personal" role="tabpanel">
                        <div class="row g-4">
                            <!-- Profile Photo Section -->
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-lg-3 text-center mb-3 mb-lg-0">
                                        <div class="avatar-upload d-inline-block">
                                            <img src="https://ui-avatars.com/api/?name=أحمد+محمد&background=3f51b5&color=fff&size=120"
                                                alt="Profile" class="profile-avatar" />
                                            <label for="avatarUpload" class="avatar-upload-btn">
                                                <i class="bi bi-camera-fill"></i>
                                            </label>
                                            <input type="file" id="avatarUpload" class="d-none" accept="image/*" />
                                            <small
                                                class="d-block mt-2 text-muted">{{ __('profile.buttons.upload_avatar') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="info-item">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="icon-wrapper bg-primary text-primary">
                                                            <i class="bi bi-person-badge text-white"></i>
                                                        </div>
                                                        <div>
                                                            <small
                                                                class="text-muted d-block">{{ __('profile.personal_info.full_name') }}</small>
                                                            <strong>أحمد محمد علي</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="icon-wrapper bg-success text-white">
                                                            <i class="bi bi-envelope text-white"></i>
                                                        </div>
                                                        <div>
                                                            <small
                                                                class="text-muted d-block">{{ __('profile.personal_info.email') }}</small>
                                                            <strong class="small">ahmed@email.com</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="icon-wrapper bg-warning text-white">
                                                            <i class="bi bi-telephone text-white"></i>
                                                        </div>
                                                        <div>
                                                            <small
                                                                class="text-muted d-block">{{ __('profile.personal_info.phone') }}</small>
                                                            <strong>+966 50 123 4567</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="icon-wrapper bg-danger text-white">
                                                            <i class="bi bi-geo-alt text-white"></i>
                                                        </div>
                                                        <div>
                                                            <small
                                                                class="text-muted d-block">{{ __('profile.personal_info.location') }}</small>
                                                            <strong>الرياض، السعودية</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Statistics Cards -->
                            <div class="col-12 mt-4">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="stats-card">
                                            <i class="bi bi-lightbulb-fill fs-2 mb-2"></i>
                                            <h4 class="fw-bold mb-0">5</h4>
                                            <small class="opacity-75">{{ __('profile.stats.ideas') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="stats-card"
                                            style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                            <i class="bi bi-check-circle-fill fs-2 mb-2"></i>
                                            <h4 class="fw-bold mb-0">2</h4>
                                            <small
                                                class="opacity-75">{{ __('profile.stats.published_ideas') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="stats-card"
                                            style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                            <i class="bi bi-people-fill fs-2 mb-2"></i>
                                            <h4 class="fw-bold mb-0">3</h4>
                                            <small
                                                class="opacity-75">{{ __('profile.stats.investment_offers') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="stats-card"
                                            style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                            <i class="bi bi-star-fill fs-2 mb-2"></i>
                                            <h4 class="fw-bold mb-0">4.8</h4>
                                            <small
                                                class="opacity-75">{{ __('profile.stats.published_offers') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Form -->
                            <div class="col-12 mt-4">
                                <form action="" class="row g-4">
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label fw-semibold">
                                            <i class="bi bi-person text-primary me-2"></i>
                                            {{ __('profile.personal_info.full_name') }}
                                        </label>
                                        <input type="text" class="form-control py-3" id="fullName"
                                            placeholder="{{ __('profile.personal_info.full_name') }}"
                                            value="أحمد محمد علي" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username" class="form-label fw-semibold">
                                            <i class="bi bi-at text-primary me-2"></i>
                                            {{ __('profile.personal_info.username') }}
                                        </label>
                                        <input type="text" class="form-control py-3" id="username"
                                            placeholder="{{ __('profile.personal_info.username') }}"
                                            value="ahmed_mohamed" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birthdate" class="form-label fw-semibold">
                                            <i class="bi bi-calendar text-primary me-2"></i>
                                            {{ __('profile.personal_info.birthdate') }}
                                        </label>
                                        <input type="date" class="form-control py-3" id="birthdate"
                                            value="1990-01-15" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label fw-semibold">
                                            <i class="bi bi-gender-ambiguous text-primary me-2"></i>
                                            {{ __('profile.personal_info.gender') }}
                                        </label>
                                        <select class="form-select py-3" id="gender">
                                            <option selected>{{ __('profile.general.male') }}</option>
                                            <option>{{ __('profile.general.female') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="bio" class="form-label fw-semibold">
                                            <i class="bi bi-chat-quote text-primary me-2"></i>
                                            {{ __('profile.personal_info.bio') }}
                                        </label>
                                        <textarea class="form-control" id="bio" rows="4"
                                            placeholder="{{ __('profile.personal_info.bio_placeholder') }}">رائد أعمال شغوف بالاستثمار في المشاريع الناشئة والتقنية</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-custom py-3 px-5">
                                            <i class="bi bi-check-circle me-2"></i>
                                            {{ __('profile.buttons.save_changes') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Tab -->
                    <div class="tab-pane fade" id="contact" role="tabpanel">
                        <form action="" class="row g-4">
                            <div class="col-md-6">
                                <label for="email2" class="form-label fw-semibold">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    {{ __('profile.personal_info.email') }}
                                </label>
                                <input type="email" class="form-control py-3" id="email2"
                                    placeholder="example@email.com" value="ahmed@email.com" />
                            </div>
                            <div class="col-md-6">
                                <label for="phone2" class="form-label fw-semibold">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    {{ __('profile.personal_info.phone') }}
                                </label>
                                <input type="tel" class="form-control py-3" id="phone2"
                                    placeholder="+966 XX XXX XXXX" value="+966 50 123 4567" />
                            </div>
                            <div class="col-md-4">
                                <label for="country2" class="form-label fw-semibold">
                                    <i class="bi bi-flag text-primary me-2"></i>
                                    {{ __('profile.contact_info.country') }}
                                </label>
                                <select class="form-select py-3" id="country2">
                                    <option selected>{{ __('profile.countries.saudi_arabia') }}</option>
                                    <option>{{ __('profile.countries.uae') }}</option>
                                    <option>{{ __('profile.countries.egypt') }}</option>
                                    <option>{{ __('profile.countries.kuwait') }}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="city2" class="form-label fw-semibold">
                                    <i class="bi bi-geo-alt text-primary me-2"></i>
                                    {{ __('profile.contact_info.city') }}
                                </label>
                                <input type="text" class="form-control py-3" id="city2"
                                    placeholder="{{ __('profile.contact_info.city') }}" value="الرياض" />
                            </div>
                            <div class="col-md-4">
                                <label for="zipcode" class="form-label fw-semibold">
                                    <i class="bi bi-mailbox text-primary me-2"></i>
                                    {{ __('profile.contact_info.zipcode') }}
                                </label>
                                <input type="text" class="form-control py-3" id="zipcode" placeholder="12345"
                                    value="11564" />
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">
                                    <i class="bi bi-house text-primary me-2"></i>
                                    {{ __('profile.contact_info.address') }}
                                </label>
                                <textarea class="form-control" id="address" rows="3"
                                    placeholder="{{ __('profile.contact_info.address_placeholder') }}">حي العليا، طريق الملك فهد، الرياض</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-custom py-3 px-5">
                                    <i class="bi bi-check-circle me-2"></i>
                                    {{ __('profile.buttons.save_contact') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="alert alert-info border-0">
                                    <i class="bi bi-info-circle me-2"></i>
                                    <strong>{{ __('profile.security.security_tip') }}</strong>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="currentPassword" class="form-label fw-semibold">
                                    <i class="bi bi-lock text-primary me-2"></i>
                                    {{ __('profile.security.current_password') }}
                                </label>
                                <input type="password" class="form-control py-3" id="currentPassword"
                                    placeholder="••••••••" />
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <label for="newPassword" class="form-label fw-semibold">
                                    <i class="bi bi-key text-primary me-2"></i>
                                    {{ __('profile.security.new_password') }}
                                </label>
                                <input type="password" class="form-control py-3" id="newPassword"
                                    placeholder="••••••••" />
                            </div>
                            <div class="col-md-6">
                                <label for="confirmPassword" class="form-label fw-semibold">
                                    <i class="bi bi-shield-check text-primary me-2"></i>
                                    {{ __('profile.security.confirm_password') }}
                                </label>
                                <input type="password" class="form-control py-3" id="confirmPassword"
                                    placeholder="••••••••" />
                            </div>
                            <div class="col-12 d-flex flex-column gap-3 flex-sm-row">
                                <button type="submit" class="btn btn-primary py-3 px-5  rounded-4">
                                    <i class="bi bi-check-circle me-2"></i>
                                    {{ __('profile.buttons.update_password') }}
                                </button>
                                <a href="./forget-password.html" class="btn btn-danger bg-danger px-5 rounded-4 py-3">
                                    <i class="bi bi-x-circle me-2"></i>
                                    {{ __('profile.security.forgot_password') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ideas Section -->
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-dark">{{ __('profile.ideas.title') }}</h5>
                    <a href="./ideas.html" class="btn btn-sm btn-primary rounded-pill px-4">
                        <i class="bi bi-eye me-2"></i>
                        <span>{{ __('profile.buttons.view_ideas') }}</span>
                    </a>
                </div>
            </div>

            <div class="card-body p-0">

                <!-- Idea 1 -->
                <div class="p-4 border-bottom">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary bg-gradient text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 fw-bold"
                                    style="width: 45px; height: 45px; font-size: 1.1rem;">
                                    1
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary">مطلوب مشروع سياحي</h6>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        15 يناير 2025
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex flex-column gap-2">
                                <small class="text-dark">
                                    <i class="bi bi-cash-coin text-success me-1"></i>
                                    <strong>{{ __('profile.ideas.capital') }}:</strong> 500,000 ريال
                                </small>
                                <small class="text-dark">
                                    <i class="bi bi-geo-alt text-info me-1"></i>
                                    <strong>{{ __('profile.ideas.location') }}:</strong> دول الخليج، مصر
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <small class="text-muted">
                                <i class="bi bi-briefcase me-1"></i>
                                شركة قائمة، موظفون
                            </small>
                        </div>
                        <div class="col-lg-2 text-lg-end">
                            <span class="badge bg-warning text-dark px-3 py-2">
                                <i class="bi bi-clock me-1"></i>
                                {{ __('profile.ideas.status.pending') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Idea 2 -->
                <div class="p-4 border-bottom bg-light bg-opacity-50">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary bg-gradient text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 fw-bold"
                                    style="width: 45px; height: 45px; font-size: 1.1rem;">
                                    2
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary">تطبيق توصيل طعام</h6>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        10 يناير 2025
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex flex-column gap-2">
                                <small class="text-dark">
                                    <i class="bi bi-cash-coin text-success me-1"></i>
                                    <strong>{{ __('profile.ideas.capital') }}:</strong> 300,000 ريال
                                </small>
                                <small class="text-dark">
                                    <i class="bi bi-geo-alt text-info me-1"></i>
                                    <strong>{{ __('profile.ideas.location') }}:</strong> السعودية
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <small class="text-muted">
                                <i class="bi bi-briefcase me-1"></i>
                                فريق تقني، خطة عمل
                            </small>
                        </div>
                        <div class="col-lg-2 text-lg-end">
                            <span class="badge bg-primary px-3 py-2">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ __('profile.ideas.status.published') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Idea 3 -->
                <div class="p-4 border-bottom">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary bg-gradient text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 fw-bold"
                                    style="width: 45px; height: 45px; font-size: 1.1rem;">
                                    3
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary">مصنع منتجات غذائية</h6>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        5 يناير 2025
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex flex-column gap-2">
                                <small class="text-dark">
                                    <i class="bi bi-cash-coin text-success me-1"></i>
                                    <strong>{{ __('profile.ideas.capital') }}:</strong> 1,000,000 ريال
                                </small>
                                <small class="text-dark">
                                    <i class="bi bi-geo-alt text-info me-1"></i>
                                    <strong>{{ __('profile.ideas.location') }}:</strong> مصر
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <small class="text-muted">
                                <i class="bi bi-briefcase me-1"></i>
                                معدات، مقر، تراخيص
                            </small>
                        </div>
                        <div class="col-lg-2 text-lg-end">
                            <span class="badge bg-danger px-3 py-2">
                                <i class="bi bi-x-circle me-1"></i>
                                {{ __('profile.ideas.status.rejected') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Idea 4 -->
                <div class="p-4 bg-light bg-opacity-50">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary bg-gradient text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 fw-bold"
                                    style="width: 45px; height: 45px; font-size: 1.1rem;">
                                    4
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary">منصة تعليمية إلكترونية</h6>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        1 يناير 2025
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex flex-column gap-2">
                                <small class="text-dark">
                                    <i class="bi bi-cash-coin text-success me-1"></i>
                                    <strong>{{ __('profile.ideas.capital') }}:</strong> 200,000 ريال
                                </small>
                                <small class="text-dark">
                                    <i class="bi bi-geo-alt text-info me-1"></i>
                                    <strong>{{ __('profile.ideas.location') }}:</strong> دول الخليج
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <small class="text-muted">
                                <i class="bi bi-briefcase me-1"></i>
                                محتوى تعليمي، مدربون
                            </small>
                        </div>
                        <div class="col-lg-2 text-lg-end">
                            <span class="badge bg-success px-3 py-2">
                                <i class="bi bi-link-45deg me-1"></i>
                                {{ __('profile.ideas.status.connected') }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
