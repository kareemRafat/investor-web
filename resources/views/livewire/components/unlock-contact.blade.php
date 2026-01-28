<div
    x-data="{
        isUnlocked: @entangle('isUnlocked'),
        showModal() {
            console.log('Alpine: open-unlock-modal received');
            const modalEl = document.getElementById('unlockModal-{{ $this->getId() }}');
            if (modalEl && window.bootstrap) {
                let modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.show();
            } else {
                console.error('Bootstrap or Modal element missing');
            }
        },
        hideModal() {
            console.log('Alpine: close-unlock-modal received');
            const modalEl = document.getElementById('unlockModal-{{ $this->getId() }}');
            if (modalEl && window.bootstrap) {
                let modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
        }
    }"
    x-on:open-unlock-modal.window="showModal()"
    x-on:close-unlock-modal.window="hideModal()"
>
    @if($isUnlocked)
        <div class="card border-success mb-3 shadow-sm">
            <div class="card-header bg-success text-white py-3">
                <div class="d-flex align-items-center gap-2 text-white">
                    <i class="bi bi-person-check-fill fs-5 text-white"></i>
                    <h6 class="mb-0 fw-bold text-white">{{ __('pages.unlock_contact.details_title') }}</h6>
                </div>
            </div>
            <div class="card-body p-4 text-dark">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded-circle p-2">
                                <i class="bi bi-person text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">{{ __('pages.unlock_contact.name') }}</small>
                                <span class="fw-semibold text-dark">{{ $model->user->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded-circle p-2">
                                <i class="bi bi-envelope text-danger"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">{{ __('pages.unlock_contact.email') }}</small>
                                <a href="mailto:{{ $model->user->email ?? '' }}" class="text-decoration-none fw-semibold">
                                    {{ $model->user->email ?? 'N/A' }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded-circle p-2">
                                <i class="bi bi-phone text-success"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">{{ __('pages.unlock_contact.phone') }}</small>
                                <a href="tel:{{ $model->user->phone ?? '' }}" class="text-decoration-none fw-semibold">
                                    {{ $model->user->phone ?? 'N/A' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <button type="button"
            wire:click="confirmUnlock"
            x-on:click="console.log('Button clicked, calling confirmUnlock...')"
            class="btn btn-primary btn-lg rounded-3 w-100 py-3 shadow-sm text-white"
        >
            <i class="bi bi-unlock-fill me-2 text-white"></i>
            <span class="fw-semibold text-white">
                {{ __('pages.unlock_contact.button') }}
            </span>
        </button>
    @endif

    {{-- Unlock Modal --}}
    <div class="modal fade" id="unlockModal-{{ $this->getId() }}" tabindex="-1" aria-labelledby="unlockModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow text-dark">
                <div class="modal-header border-bottom-0 d-flex justify-content-between align-items-center">
                    <h5 class="modal-title fw-bold text-dark mb-0">
                        {{ __('pages.unlock_contact.modal_title') }}
                    </h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    @if($errorMessage)
                        <div class="alert alert-danger rounded-3 mb-3">
                            <i class="bi bi-exclamation-circle me-2"></i> {{ $errorMessage }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-credit-card text-primary fs-3"></i>
                        </div>
                        <p class="text-muted">{{ __('pages.unlock_contact.modal_desc') }}</p>
                    </div>

                    <div class="card bg-light border-0 rounded-3 mb-3 text-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <span class="text-dark">{{ __('pages.unlock_contact.current_credits') }}</span>
                            <span class="badge bg-primary fs-6">{{ Auth::user()?->contact_credits ?? 0 }}</span>
                        </div>
                    </div>

                    @if((Auth::user()?->contact_credits ?? 0) <= 0)
                        <div class="alert alert-warning border-0 rounded-3 mb-0 text-start">
                            <i class="bi bi-info-circle me-2"></i>
                            {{ __('pages.unlock_contact.no_credits') }}
                        </div>
                    @endif
                </div>
                <div class="modal-footer border-top-0 p-4">
                    <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">{{ __('pages.unlock_contact.cancel') }}</button>
                    @if((Auth::user()?->contact_credits ?? 0) > 0)
                        <button type="button" class="btn btn-primary rounded-3 px-4 text-white" wire:click="unlock" wire:loading.attr="disabled">
                            <span wire:loading.remove>{{ __('pages.unlock_contact.confirm') }}</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm me-1 text-white"></span>
                                {{ __('pages.unlock_contact.processing') }}
                            </span>
                        </button>
                    @else
                         <a href="{{ route('main.profile') }}" class="btn btn-warning rounded-3 px-4 text-white text-decoration-none">{{ __('pages.unlock_contact.upgrade') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
