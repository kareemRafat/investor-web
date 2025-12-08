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
        <livewire:pages.profile.components.profile-info />

        <!-- Ideas Section -->
        <livewire:pages.profile.components.ideas />
    </div>
</div>
