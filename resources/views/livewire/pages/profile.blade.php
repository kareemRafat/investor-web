<style>
    body {
        background-color: var(--bg-body) !important;
        position: relative;
        overflow-x: hidden;
    }

    /* make circle after */
    body::after {
        content: '';
        position: absolute;
        top: -210px;
        right: -210px;
        width: 540px;
        height: 540px;
        background-color: var(--bg-circle) !important;
        border-radius: 50%;
        z-index: -1;
        opacity: 0.9;
    }

    /* make circl before */
    body::before {
        content: '';
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 250px;
        height: 250px;
        background-color: var(--bg-circle) !important;
        border-radius: 50%;
        z-index: -1;
        opacity: 0.9;
    }

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
        bottom: 0;
        right: 0;
        background: var(--bs-primary);
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

<!-- Profile Section -->
<div class="container mb-5">
    <div class="row">
        <!-- Profile Header -->
        <div class="profile-header shadow-sm">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">الملف الشخصي</h3>
                    <p class="mb-0 opacity-75">إدارة معلوماتك الشخصية ومتابعة أفكارك الاستثمارية</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <div class="d-flex justify-content-lg-end gap-2">
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="bi bi-lightbulb me-1"></i>
                            5 أفكار
                        </span>
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="bi bi-calendar-check me-1"></i>
                            عضو منذ 2024
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
                            <i class="bi bi-person-circle me-2"></i>
                            البيانات الشخصية
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab">
                            <i class="bi bi-telephone me-2"></i>
                            معلومات الاتصال
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security"
                            type="button" role="tab">
                            <i class="bi bi-shield-check me-2"></i>
                            الأمان
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
                                                            <small class="text-muted d-block">الاسم
                                                                الكامل</small>
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
                                                            <small class="text-muted d-block">البريد
                                                                الإلكتروني</small>
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
                                                            <small class="text-muted d-block">رقم الهاتف</small>
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
                                                            <small class="text-muted d-block">الموقع</small>
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
                                            <small class="opacity-75">أفكار مقدمة</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="stats-card"
                                            style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                            <i class="bi bi-check-circle-fill fs-2 mb-2"></i>
                                            <h4 class="fw-bold mb-0">2</h4>
                                            <small class="opacity-75">أفكار منشورة</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="stats-card"
                                            style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                            <i class="bi bi-people-fill fs-2 mb-2"></i>
                                            <h4 class="fw-bold mb-0">3</h4>
                                            <small class="opacity-75">اتصالات فعالة</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="stats-card"
                                            style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                            <i class="bi bi-star-fill fs-2 mb-2"></i>
                                            <h4 class="fw-bold mb-0">4.8</h4>
                                            <small class="opacity-75">التقييم</small>
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
                                            الإسم بالكامل
                                        </label>
                                        <input type="text" class="form-control py-3" id="fullName"
                                            placeholder="أدخل الإسم بالكامل" value="أحمد محمد علي" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username" class="form-label fw-semibold">
                                            <i class="bi bi-at text-primary me-2"></i>
                                            اسم المستخدم
                                        </label>
                                        <input type="text" class="form-control py-3" id="username"
                                            placeholder="اسم المستخدم" value="ahmed_mohamed" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birthdate" class="form-label fw-semibold">
                                            <i class="bi bi-calendar text-primary me-2"></i>
                                            تاريخ الميلاد
                                        </label>
                                        <input type="date" class="form-control py-3" id="birthdate"
                                            value="1990-01-15" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label fw-semibold">
                                            <i class="bi bi-gender-ambiguous text-primary me-2"></i>
                                            النوع
                                        </label>
                                        <select class="form-select py-3" id="gender">
                                            <option selected>ذكر</option>
                                            <option>أنثى</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="bio" class="form-label fw-semibold">
                                            <i class="bi bi-chat-quote text-primary me-2"></i>
                                            نبذة عنك
                                        </label>
                                        <textarea class="form-control" id="bio" rows="4" placeholder="اكتب نبذة مختصرة عنك...">رائد أعمال شغوف بالاستثمار في المشاريع الناشئة والتقنية</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-custom py-3 px-5">
                                            <i class="bi bi-check-circle me-2"></i>
                                            حفظ التعديلات
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
                                    البريد الإلكتروني
                                </label>
                                <input type="email" class="form-control py-3" id="email2"
                                    placeholder="example@email.com" value="ahmed@email.com" />
                            </div>
                            <div class="col-md-6">
                                <label for="phone2" class="form-label fw-semibold">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    رقم الهاتف
                                </label>
                                <input type="tel" class="form-control py-3" id="phone2"
                                    placeholder="+966 XX XXX XXXX" value="+966 50 123 4567" />
                            </div>
                            <div class="col-md-4">
                                <label for="country2" class="form-label fw-semibold">
                                    <i class="bi bi-flag text-primary me-2"></i>
                                    الدولة
                                </label>
                                <select class="form-select py-3" id="country2">
                                    <option selected>السعودية</option>
                                    <option>الإمارات</option>
                                    <option>مصر</option>
                                    <option>الكويت</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="city2" class="form-label fw-semibold">
                                    <i class="bi bi-geo-alt text-primary me-2"></i>
                                    المدينة
                                </label>
                                <input type="text" class="form-control py-3" id="city2" placeholder="الرياض"
                                    value="الرياض" />
                            </div>
                            <div class="col-md-4">
                                <label for="zipcode" class="form-label fw-semibold">
                                    <i class="bi bi-mailbox text-primary me-2"></i>
                                    الرمز البريدي
                                </label>
                                <input type="text" class="form-control py-3" id="zipcode" placeholder="12345"
                                    value="11564" />
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">
                                    <i class="bi bi-house text-primary me-2"></i>
                                    العنوان الكامل
                                </label>
                                <textarea class="form-control" id="address" rows="3" placeholder="أدخل العنوان الكامل...">حي العليا، طريق الملك فهد، الرياض</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-custom py-3 px-5">
                                    <i class="bi bi-check-circle me-2"></i>
                                    حفظ معلومات الاتصال
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
                                    <strong>نصيحة أمنية:</strong> استخدم كلمة مرور قوية تحتوي على أحرف كبيرة
                                    وصغيرة وأرقام ورموز
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="currentPassword" class="form-label fw-semibold">
                                    <i class="bi bi-lock text-primary me-2"></i>
                                    كلمة المرور الحالية
                                </label>
                                <input type="password" class="form-control py-3" id="currentPassword"
                                    placeholder="••••••••" />
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <label for="newPassword" class="form-label fw-semibold">
                                    <i class="bi bi-key text-primary me-2"></i>
                                    كلمة المرور الجديدة
                                </label>
                                <input type="password" class="form-control py-3" id="newPassword"
                                    placeholder="••••••••" />
                            </div>
                            <div class="col-md-6">
                                <label for="confirmPassword" class="form-label fw-semibold">
                                    <i class="bi bi-shield-check text-primary me-2"></i>
                                    تأكيد كلمة المرور
                                </label>
                                <input type="password" class="form-control py-3" id="confirmPassword"
                                    placeholder="••••••••" />
                            </div>
                            <div class="col-12 d-flex flex-column gap-3 flex-sm-row">
                                <button type="submit" class="btn btn-primary py-3 px-5  rounded-4">
                                    <i class="bi bi-check-circle me-2"></i>
                                    تحديث كلمة المرور
                                </button>
                                <a href="./forget-password.html" class="btn btn-danger bg-danger px-5 rounded-4 py-3">
                                    <i class="bi bi-x-circle me-2"></i>
                                    نسيت كلمة المرور؟
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Ideas Section -->
        <div class="card info-card shadow-sm p-0">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 section-title fw-bold text-dark">الأفكار المقدمة</h5>
                <a href="./ideas.html" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-eye me-1"></i>
                    عرض جميع الأفكار
                </a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <!-- Idea 1 -->
                    <div class="list-group-item border-0 p-0">
                        <div class="idea-card p-4">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-3">
                                    <h6 class="fw-bold mb-2 text-primary">
                                        <i class="bi bi-lightbulb-fill me-2"></i>
                                        مطلوب مشروع سياحي
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        15 يناير 2025
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column gap-2">
                                        <p class="mb-0 small">
                                            <i class="bi bi-cash-coin text-success me-2"></i>
                                            <strong>رأس المال:</strong> 500,000 ريال
                                        </p>
                                        <p class="mb-0 small">
                                            <i class="bi bi-geo-alt text-danger me-2"></i>
                                            <strong>الموقع:</strong> دول الخليج، مصر
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p class="mb-0 small text-muted">
                                        <i class="bi bi-briefcase me-2"></i>
                                        شركة قائمة، موظفون متخصصون
                                    </p>
                                </div>
                                <div class="col-lg-2 text-lg-center">
                                    <span class="status-badge pending">
                                        <span class="status-indicator bg-warning"></span>
                                        قيد المراجعة
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Idea 2 -->
                    <div class="list-group-item border-0 p-0 bg-light">
                        <div class="idea-card p-4">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-3">
                                    <h6 class="fw-bold mb-2 text-primary">
                                        <i class="bi bi-lightbulb-fill me-2"></i>
                                        تطبيق توصيل طعام
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        10 يناير 2025
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column gap-2">
                                        <p class="mb-0 small">
                                            <i class="bi bi-cash-coin text-success me-2"></i>
                                            <strong>رأس المال:</strong> 300,000 ريال
                                        </p>
                                        <p class="mb-0 small">
                                            <i class="bi bi-geo-alt text-danger me-2"></i>
                                            <strong>الموقع:</strong> السعودية
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p class="mb-0 small text-muted">
                                        <i class="bi bi-briefcase me-2"></i>
                                        فريق تقني، خطة عمل
                                    </p>
                                </div>
                                <div class="col-lg-2 text-lg-center">
                                    <span class="status-badge published">
                                        <span class="status-indicator bg-primary"></span>
                                        منشورة
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Idea 3 -->
                    <div class="list-group-item border-0 p-0">
                        <div class="idea-card p-4">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-3">
                                    <h6 class="fw-bold mb-2 text-primary">
                                        <i class="bi bi-lightbulb-fill me-2"></i>
                                        مصنع منتجات غذائية
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        5 يناير 2025
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column gap-2">
                                        <p class="mb-0 small">
                                            <i class="bi bi-cash-coin text-success me-2"></i>
                                            <strong>رأس المال:</strong> 1,000,000 ريال
                                        </p>
                                        <p class="mb-0 small">
                                            <i class="bi bi-geo-alt text-danger me-2"></i>
                                            <strong>الموقع:</strong> مصر
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p class="mb-0 small text-muted">
                                        <i class="bi bi-briefcase me-2"></i>
                                        معدات، مقر، تراخيص
                                    </p>
                                </div>
                                <div class="col-lg-2 text-lg-center">
                                    <span class="status-badge rejected">
                                        <span class="status-indicator bg-danger"></span>
                                        مرفوضة
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Idea 4 -->
                    <div class="list-group-item border-0 p-0 bg-light">
                        <div class="idea-card p-4">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-3">
                                    <h6 class="fw-bold mb-2 text-primary">
                                        <i class="bi bi-lightbulb-fill me-2"></i>
                                        منصة تعليمية إلكترونية
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        1 يناير 2025
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column gap-2">
                                        <p class="mb-0 small">
                                            <i class="bi bi-cash-coin text-success me-2"></i>
                                            <strong>رأس المال:</strong> 200,000 ريال
                                        </p>
                                        <p class="mb-0 small">
                                            <i class="bi bi-geo-alt text-danger me-2"></i>
                                            <strong>الموقع:</strong> دول الخليج
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p class="mb-0 small text-muted">
                                        <i class="bi bi-briefcase me-2"></i>
                                        محتوى تعليمي، مدربون
                                    </p>
                                </div>
                                <div class="col-lg-2 text-lg-center">
                                    <span class="status-badge connected">
                                        <span class="status-indicator bg-success"></span>
                                        تم التواصل
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
