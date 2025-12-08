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
