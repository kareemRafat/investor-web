<footer class="bg-white rounded-4 shadow-sm mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="container">
        <div class="row py-5 g-4">
            <!-- About Section -->
            <div class="col-lg-3 col-md-6 col-12">
                <h6 class="fw-bold mb-3 text-dark">حول</h6>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="./about.html" class="text-muted text-decoration-none small">من نحن</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">ميثاقنا</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">الإحصائيات</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">الصحافة</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">الوظائف</a></li>
                </ul>
            </div>

            <!-- Support Section -->
            <div class="col-lg-3 col-md-6 col-12">
                <h6 class="fw-bold mb-3 text-dark">الدعم</h6>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="#" class="text-muted text-decoration-none small">مركز المساعدة</a></li>
                    <li><a href="./terms.html" class="text-muted text-decoration-none small">قواعدنا</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">موارد المبدعين</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">التمويل المباشر</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">أصول العلامة التجارية</a></li>
                </ul>
            </div>

            <!-- More Section -->
            <div class="col-lg-3 col-md-6 col-12">
                <h6 class="fw-bold mb-3 text-dark">المزيد من INVESTMENT</h6>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="#" class="text-muted text-decoration-none small">النشرات الإخبارية</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">تحديثات المشاريع</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">المبدع المستقل</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">تطبيقات الجوال</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small">الأبحاث</a></li>
                </ul>
            </div>

            <!-- Categories Section -->
            <div class="col-lg-3 col-md-6 col-12">
                <h6 class="fw-bold mb-3 text-dark">التصنيفات</h6>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#" class="text-muted text-decoration-none small">الفنون</a>
                    <a href="#" class="text-muted text-decoration-none small">الكوميديا</a>
                    <a href="#" class="text-muted text-decoration-none small">التصميم</a>
                    <a href="#" class="text-muted text-decoration-none small">الأفلام</a>
                    <a href="#" class="text-muted text-decoration-none small">الطعام</a>
                    <a href="#" class="text-muted text-decoration-none small">الألعاب</a>
                    <a href="#" class="text-muted text-decoration-none small">الموسيقى</a>
                    <a href="#" class="text-muted text-decoration-none small">النشر</a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="row py-4 border-top">
            <div class="col-lg-4 col-md-6 col-12 mb-3 mb-lg-0">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('images/logo.svg') }}" alt="logo" width="30" height="30" />
                    <span class="small text-muted">Investment, PBC © 2025</span>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <a href="#" class="text-muted" aria-label="Facebook">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                    <a href="#" class="text-muted" aria-label="Instagram">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                    <a href="#" class="text-muted" aria-label="Twitter">
                        <i class="bi bi-twitter fs-5"></i>
                    </a>
                    <a href="#" class="text-muted" aria-label="YouTube">
                        <i class="bi bi-youtube fs-5"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="d-flex align-items-center justify-content-lg-end gap-3">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                            id="footerLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                            العربية
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="footerLanguage">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li><a class="dropdown-item small" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Links -->
        <div class="row pb-4">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-3 small text-muted">
                    <a href="#" class="text-muted text-decoration-none">الثقة والأمان</a>
                    <a href="./terms.html" class="text-muted text-decoration-none">شروط الاستخدام</a>
                    <a href="./privacy.html" class="text-muted text-decoration-none">سياسة الخصوصية</a>
                    <a href="#" class="text-muted text-decoration-none">سياسة الكوكيز</a>
                    <a href="#" class="text-muted text-decoration-none">تفضيلات الكوكيز</a>
                    <a href="#" class="text-muted text-decoration-none">بيان إمكانية الوصول</a>
                    <a href="#" class="text-muted text-decoration-none">إشعار الموافقة CA</a>
                </div>
            </div>
        </div>
    </div>
</footer>
