<div class="container py-4" dir="rtl">
    @once
        <style>
            :root {
                --primary: #4f46e5;
                /* Indigo */
                --primary-soft: #eef2ff;
                --text-main: #1e293b;
                --text-muted: #64748b;
                --border-color: #e2e8f0;
                --input-bg: #f8fafc;
                --danger-color: #dc2626;
                --danger-soft: #fee2e2;
            }

            body {
                background-color: #f1f5f9;
                color: var(--text-main);
                font-family: system-ui, -apple-system, sans-serif;
            }

            /* === Header Style === */
            .profile-header {
                /* استخدام لون الهيدر الغامق الذي طلبته سابقاً */
                background: linear-gradient(135deg, var(--primary) 0%, #818cf8 100%);
                border-radius: 16px;
                padding: 3rem 2rem;
                color: white;
                margin-bottom: 2rem;
            }

            /* === Stats Cards (نفس التصميم المطلوب البارز) === */
            .stat-card {
                background: white;
                border-radius: 12px;
                padding: 2rem 1.5rem;
                border: 1px solid var(--border-color);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
                display: flex;
                align-items: center;
                gap: 1rem;
                transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
                height: 100%;
            }

            .stat-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
                border-color: var(--primary);
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                flex-shrink: 0;
            }

            .stat-info h3 {
                font-size: 1.5rem;
                font-weight: 700;
                margin: 0;
                line-height: 1;
            }

            .stat-info span {
                font-size: 0.85rem;
                color: var(--text-muted);
                font-weight: 500;
            }

            /* ألوان الكروت */
            .stat-purple .stat-icon {
                background-color: #f3e8ff;
                color: #9333ea;
            }

            .stat-blue .stat-icon {
                background-color: #e0f2fe;
                color: #0284c7;
            }

            .stat-green .stat-icon {
                background-color: #dcfce7;
                color: #16a34a;
            }

            .stat-orange .stat-icon {
                background-color: #ffedd5;
                color: #ea580c;
            }


            /* === Navigation Strip (القائمة العلوية) === */
            .nav-strip {
                background: white;
                padding: 0.75rem;
                border-radius: 12px;
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
                margin-bottom: 1rem;
                border: 1px solid var(--border-color);
            }

            .nav-strip .nav-item {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.75rem 1.25rem;
                border-radius: 8px;
                font-weight: 600;
                color: var(--text-muted);
                text-decoration: none;
                transition: all 0.2s;
                cursor: pointer;
            }

            .nav-strip .nav-item.active {
                background-color: var(--primary);
                color: white;
            }

            /* === Settings Cards (الصفحات الفرعية) === */
            .settings-card {
                background: white;
                border-radius: 16px;
                border: 1px solid var(--border-color);
                padding: 2.5rem;
                margin-bottom: 2rem;
                position: relative;
            }

            .section-title {
                font-size: 1.1rem;
                font-weight: 700;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.75rem;
                color: var(--text-main);
                padding-bottom: 1rem;
                border-bottom: 1px solid var(--border-color);
            }

            /* === Form Fields (الشكل المطلوب النظيف) === */
            .custom-input-group {
                background-color: var(--input-bg);
                border: 1px solid var(--border-color);
                border-radius: 10px;
                display: flex;
                align-items: center;
                transition: all 0.3s ease;
            }

            .custom-input-group:focus-within {
                background-color: #fff;
                border-color: var(--primary);
                box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            }

            .custom-input-group .input-icon {
                color: var(--text-muted);
                padding: 0 1rem;
                font-size: 1.1rem;
            }

            .custom-input-group .form-control,
            .custom-input-group .form-select {
                border: none;
                background: transparent;
                padding: 0.8rem 0;
                color: var(--text-main);
                font-weight: 500;
            }

            .form-label {
                font-size: 0.9rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .btn-save {
                background-color: var(--primary);
                color: white;
                padding: 0.8rem 2.5rem;
                border-radius: 10px;
                font-weight: 600;
                border: none;
                transition: 0.2s;
            }

            .btn-save:hover {
                background-color: #4338ca;
                transform: translateY(-2px);
            }

            .avatar-edit-btn {
                position: absolute;
                bottom: 0;
                left: 0;
                background: var(--primary);
                color: white;
                width: 32px;
                height: 32px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px solid white;
                cursor: pointer;
            }

            /* تنسيق خاص للـ 2FA */
            .security-alert {
                background-color: var(--danger-soft);
                border-color: var(--danger-color);
                color: var(--danger-color);
                border-radius: 10px;
                padding: 1rem;
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .security-alert strong {
                color: var(--danger-color);
            }
        </style>
    @endonce

    <div class="row">
        <div class="profile-header shadow-sm">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-2">{{ __('profile.title') }}</h2>
                    <p class="mb-0 opacity-75 fs-5">أهلاً بك، يمكنك هنا متابعة إحصائياتك وتعديل بياناتك.</p>
                </div>
                <div class="col-lg-4 text-lg-start mt-4 mt-lg-0">
                    <div
                        class="d-inline-flex align-items-center gap-3 bg-white bg-opacity-10 px-4 py-2 rounded-pill border border-white border-opacity-25">
                        <img src="https://ui-avatars.com/api/?name=أحمد+محمد&background=random"
                            class="rounded-circle border border-2 border-white" width="40" height="40">
                        <div class="text-start">
                            <div class="fw-bold fs-6">أحمد محمد</div>
                            <div class="small opacity-75" style="font-size: 0.75rem;">عضو مميز</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 pe-0">
            <div class="stat-card stat-purple">
                <div class="stat-icon">
                    <i class="bi bi-lightbulb"></i>
                </div>
                <div class="stat-info">
                    <h3>5</h3>
                    <span>الأفكار المطروحة</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stat-card stat-blue">
                <div class="stat-icon">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>2</h3>
                    <span>أفكار منشورة</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stat-card stat-green">
                <div class="stat-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div class="stat-info">
                    <h3>3</h3>
                    <span>عروض استثمار</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 ps-0">
            <div class="stat-card stat-orange">
                <div class="stat-icon">
                    <i class="bi bi-star-fill"></i>
                </div>
                <div class="stat-info">
                    <h3>4.8</h3>
                    <span>التقييم العام</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="nav-strip sticky-top" style="top: 0; z-index: 99;">
            <a class="nav-item active"><i class="bi bi-person"></i> البيانات الشخصية</a>
            <a class="nav-item"><i class="bi bi-image"></i> الصورة</a>
            <a class="nav-item"><i class="bi bi-envelope"></i> الاتصال</a>
            <a class="nav-item"><i class="bi bi-shield-lock"></i> الأمان</a> <a class="nav-item ms-auto text-danger"><i
                    class="bi bi-box-arrow-left"></i> خروج</a>
        </div>

        <div class="settings-card">
            <div class="section-title">
                <i class="bi bi-person-lines-fill text-primary"></i>
                المعلومات الأساسية
            </div>
            <form>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">الاسم بالكامل</label>
                        <div class="custom-input-group">
                            <span class="input-icon"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" value="أحمد محمد علي">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">اسم المستخدم</label>
                        <div class="custom-input-group">
                            <span class="input-icon"><i class="bi bi-at"></i></span>
                            <input type="text" class="form-control" value="ahmed_dev">
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">نبذة عنك</label>
                        <div class="custom-input-group align-items-start pt-2">
                            <span class="input-icon mt-1"><i class="bi bi-chat-quote"></i></span>
                            <textarea class="form-control" rows="3">مطور برمجيات شغوف بالتقنيات الحديثة...</textarea>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-save">حفظ التغييرات</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="settings-card">
            <div class="section-title">
                <i class="bi bi-image text-primary"></i>
                صورة الملف الشخصي
            </div>
            <div class="d-flex align-items-center gap-4">
                <div class="position-relative">
                    <img src="https://ui-avatars.com/api/?name=أحمد+محمد&background=4f46e5&color=fff&size=100"
                        class="rounded-circle" width="100" height="100">
                    <label class="avatar-edit-btn shadow-sm">
                        <i class="bi bi-camera-fill small"></i>
                        <input type="file" class="d-none">
                    </label>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">تغيير الصورة</h6>
                    <p class="text-muted small mb-2">JPG, GIF or PNG. Max size of 800K</p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3">رفع صورة</button>
                        <button class="btn btn-sm btn-light text-danger rounded-pill px-3">حذف</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="settings-card">
            <div class="section-title">
                <i class="bi bi-envelope-paper text-primary"></i>
                معلومات الاتصال
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">البريد الإلكتروني</label>
                    <div class="custom-input-group bg-light">
                        <span class="input-icon"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" value="ahmed@example.com" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">رقم الهاتف</label>
                    <div class="custom-input-group">
                        <span class="input-icon"><i class="bi bi-telephone"></i></span>
                        <input type="tel" class="form-control" value="01000000000">
                    </div>
                </div>
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-save">حفظ معلومات الاتصال</button>
                </div>
            </div>
        </div>


        <div class="settings-card">
            <div class="section-title">
                <i class="bi bi-shield-lock text-danger"></i>
                الأمان وكلمة المرور
            </div>
            <form>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="security-alert mb-3">
                            <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                            <div>
                                <strong class="d-block mb-1">تنبيه أمني:</strong>
                                <small>ننصح بتغيير كلمة المرور بشكل دوري لتجنب أي اختراقات محتملة.</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">كلمة المرور الحالية</label>
                        <div class="custom-input-group">
                            <span class="input-icon"><i class="bi bi-key"></i></span>
                            <input type="password" class="form-control" placeholder="********">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">كلمة المرور الجديدة</label>
                        <div class="custom-input-group">
                            <span class="input-icon"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" placeholder="أدخل كلمة المرور الجديدة">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">تأكيد كلمة المرور</label>
                        <div class="custom-input-group">
                            <span class="input-icon"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" placeholder="أعد كتابة كلمة المرور">
                        </div>
                    </div>

                    <div class="col-12 text-end mt-4">
                        <button type="button" class="btn btn-save">تحديث الأمان</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
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
