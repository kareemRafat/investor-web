<!-- Personal Information Section -->
<div class="card info-card shadow-sm mb-4">
    <div class="card-header bg-white border-0 py-3">
        <ul class="nav profile-tabs nav-fill flex-column flex-sm-row" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal"
                    type="button" role="tab">
                    <i class="{{ __('profile.tabs.personal.icon') }} me-2"></i>
                    {{ __('profile.tabs.personal.title') }}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab">
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
                                                    <strong>{{ $fullName }}</strong>
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
                                    <small class="opacity-75">{{ __('profile.stats.published_ideas') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="stats-card"
                                    style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                    <i class="bi bi-people-fill fs-2 mb-2"></i>
                                    <h4 class="fw-bold mb-0">3</h4>
                                    <small class="opacity-75">{{ __('profile.stats.investment_offers') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="stats-card"
                                    style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                    <i class="bi bi-star-fill fs-2 mb-2"></i>
                                    <h4 class="fw-bold mb-0">4.8</h4>
                                    <small class="opacity-75">{{ __('profile.stats.published_offers') }}</small>
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
                                    placeholder="{{ __('profile.personal_info.username') }}" value="ahmed_mohamed" />
                            </div>
                            <div class="col-md-6">
                                <label for="birthdate" class="form-label fw-semibold">
                                    <i class="bi bi-calendar text-primary me-2"></i>
                                    {{ __('profile.personal_info.birthdate') }}
                                </label>
                                <input type="date" class="form-control py-3" id="birthdate" value="1990-01-15" />
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
                        <input type="password" class="form-control py-3" id="newPassword" placeholder="••••••••" />
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
