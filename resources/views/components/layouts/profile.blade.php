<x-layouts.app>
    <div class="container px-sm-0 py-2" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
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

        <!-- profile-header -->
        <div class="col-12">
            <div class="profile-header shadow-sm position-relative overflow-hidden py-3 py-md-5 px-4">
                <div class="position-absolute top-0 end-0 w-50 h-100 opacity-20"
                    style="background: radial-gradient(circle at top right, #6a11cb, #2575fc); filter: blur(80px);">
                </div>
                <div class="row align-items-center position-relative py-3 py-md-4">
                    <div class="col-12 col-md-6">
                        <div
                            class="text-center @if (app()->getLocale() == 'ar') text-md-end @else text-md-start @endif mb-3 mb-md-0">
                            <h2 class="fw-bold mb-2 fs-4 fs-md-3">{{ __('profile.title') }}</h2>
                            <p class="mb-0 fs-6 fs-md-5 text-white">{{ __('profile.welcome_message') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div
                            class="text-center @if (app()->getLocale() == 'ar') text-md-start @else text-md-end @endif">
                            <h3 class="fw-bold mb-2 text-truncate px-2 text-white"
                                style="text-shadow: 0 2px 10px rgba(0,0,0,0.3); font-size: clamp(1.1rem, 3vw, 1.5rem);">
                                {{ auth()->user()->name }}
                            </h3>
                            <div
                                class="d-inline-flex align-items-center bg-white bg-opacity-10 backdrop-blur-sm rounded-pill px-3 px-md-4 py-2 py-md-2">
                                <i class="bi bi-star-fill text-warning mx-1 mx-md-2"></i>
                                <small
                                    class="text-white fw-semibold fs-6">{{ auth()->user()->plan_type->getLabel() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- stats cards -->
        <livewire:pages.profile.profile-stats />

        <!-- sub-menu -->
        @include('components.assets.profile.sub_menu')

        <div class="col-12">
            {{ $slot }}
        </div>
    </div>
</x-layouts.app>
