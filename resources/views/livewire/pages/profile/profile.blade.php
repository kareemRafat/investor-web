<div>
    @if (! $user->hasCompleteProfile())
        <div class="alert alert-warning border-0 shadow-sm rounded-4 mb-4 p-3 d-flex align-items-center">
            <div class="bg-warning bg-opacity-20 p-2 rounded-3 me-3">
                <i class="bi bi-exclamation-triangle-fill text-warning fs-4"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-1">{{ __('profile.incomplete_profile.title') }}</h6>
                <p class="small mb-0 text-muted">{{ __('profile.incomplete_profile.message') }}</p>
            </div>
        </div>
    @endif

    <div class="settings-card mb-4">
        <div class="section-title">
            <i class="bi bi-star-fill text-warning"></i>
            {{ __('profile.subscription.title') }}
        </div>

        <div class="row g-3 text-dark">
            <!-- Current Plan -->
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm bg-light rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="bi bi-award text-primary fs-4"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block lh-1 mb-1">{{ __('profile.subscription.current_plan') }}</small>
                            <h6 class="fw-bold text-dark mb-0">
                                {{ $user->plan_type->getLabel() ?? ucfirst($user->plan_type->value) }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Remaining Credits -->
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm bg-light rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="bi bi-unlock text-success fs-4"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block lh-1 mb-1">{{ __('profile.subscription.remaining_credits') }}</small>
                            <h6 class="fw-bold text-dark mb-0">{{ $user->contact_credits ?? 0 }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Credits Reset -->
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm bg-light rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="bi bi-arrow-repeat text-info fs-4"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block lh-1 mb-1">{{ __('profile.subscription.next_reset') }}</small>
                            <h6 class="fw-bold text-dark mb-0">
                                {{ $user->credits_reset_at ? $user->credits_reset_at->translatedFormat('d M Y') : __('profile.subscription.na') }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Plan Renewal -->
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm bg-light rounded-3">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3">
                            <i class="bi bi-calendar-check text-warning fs-4"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block lh-1 mb-1">{{ __('profile.subscription.next_renewal') }}</small>
                            <h6 class="fw-bold text-dark mb-0">
                                {{ $user->next_renewal_at ? $user->next_renewal_at->translatedFormat('d M Y') : __('profile.subscription.na') }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="settings-card">
        <div class="section-title">
            <i class="bi bi-person-lines-fill text-primary"></i>
            {{ __('profile.basic_info.title') }}
        </div>
        <form wire:submit.prevent="updateProfile">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('profile.labels.full_name') }}</label>
                    <div class="custom-input-group mb-2">
                        <span class="input-icon"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name"
                            placeholder="{{ __('profile.placeholders.full_name') }}">
                    </div>
                    @error('name')
                        <small class="text-white bg-danger py-1 px-2 rounded-1">
                            <i class="bi bi-shield-exclamation"></i>
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">{{ __('profile.labels.job_title') }}</label>
                    <div class="custom-input-group mb-2">
                        <span class="input-icon"><i class="bi bi-briefcase"></i></span>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                            wire:model="job_title" placeholder="{{ __('profile.placeholders.job_title') }}">
                    </div>
                    @error('job_title')
                        <small class="text-white bg-danger py-1 px-2 rounded-1">
                            <i class="bi bi-shield-exclamation"></i>
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">{{ __('profile.labels.email') }}</label>
                    <div class="custom-input-group mb-2">
                        <span class="input-icon"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            wire:model="email" placeholder="{{ __('profile.placeholders.email') }}">
                    </div>
                    @error('email')
                        <small class="text-white bg-danger py-1 px-2 rounded-1">
                            <i class="bi bi-shield-exclamation"></i>
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">{{ __('profile.labels.phone') }}</label>
                    <div class="custom-input-group mb-2">
                        <span class="input-icon"><i class="bi bi-phone"></i></span>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                            wire:model="phone" placeholder="{{ __('profile.placeholders.phone') }}">
                    </div>
                    @error('phone')
                        <small class="text-white bg-danger py-1 px-2 rounded-1">
                            <i class="bi bi-shield-exclamation"></i>
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">{{ __('profile.labels.birth_date') }}</label>
                    <div class="custom-input-group mb-2">
                        <span class="input-icon"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                            wire:model="birth_date">
                    </div>
                    @error('birth_date')
                        <small class="text-white bg-danger py-1 px-2 rounded-1">
                            <i class="bi bi-shield-exclamation"></i>
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">{{ __('profile.labels.residence_country') }}</label>
                    <div class="custom-input-group mb-2">
                        <span class="input-icon"><i class="bi bi-geo-alt"></i></span>
                        <select class="form-select px-4 @error('residence_country') is-invalid @enderror"
                            wire:model="residence_country">
                            <option value="">{{ __('profile.placeholders.select_country') }}</option>
                            @foreach (__('profile.countries') as $code => $name)
                                <option value="{{ $name }}"
                                    {{ $name == $residence_country ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('residence_country')
                        <small class="text-white bg-danger py-1 px-2 rounded-1">
                            <i class="bi bi-shield-exclamation"></i>
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-12 text-end mt-4">
                    <div class="row g-3 justify-content-center align-items-center">
                        <div class="col-12 col-md-8 order-2 order-md-1">
                            @if (session()->has('success'))
                                <div class="alert alert-success mb-0 text-start alert-dismissible fade show"
                                    role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <i class="bi bi-check-circle-fill mx-1"></i>
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-save col-12 col-md-4 order-1 order-md-2 py-3"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove>{{ __('profile.basic_info.save_changes') }}</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm" role="status"></span>
                                {{ __('profile.messages.saving') }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
