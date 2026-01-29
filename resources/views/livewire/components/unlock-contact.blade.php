<div
    x-data="{
        isUnlocked: @entangle('isUnlocked'),
        showModal() {
            const modalEl = document.getElementById('unlockModal-{{ $this->getId() }}');
            if (modalEl && window.bootstrap) {
                let modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.show();
            } else {
                console.error('Bootstrap or Modal element missing');
            }
        },
        hideModal() {
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
        <div class="card border-primary mb-3 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
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
            class="btn btn-primary btn-lg rounded-3 w-100 py-3 shadow-sm text-white"
        >
            <i class="bi bi-unlock-fill mx-2 text-white"></i>
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

                    @if($step === 1)
                        <div class="mb-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="bi bi-credit-card text-primary fs-3"></i>
                            </div>
                            <p class="text-muted">{{ __('pages.unlock_contact.modal_desc') }}</p>
                        </div>

                        <div class="card bg-light border-0 rounded-3 mb-4 text-dark">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <span class="text-dark">{{ __('pages.unlock_contact.current_credits') }}</span>
                                <span class="badge bg-primary fs-6">{{ Auth::user()?->contact_credits ?? 0 }}</span>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            @if((Auth::user()?->contact_credits ?? 0) > 0)
                                <button type="button" class="btn btn-primary btn-lg rounded-3 py-3 text-white" wire:click="selectMethod('credit')" wire:loading.attr="disabled">
                                    <i class="bi bi-coin mx-2"></i>
                                    {{ __('pages.unlock_contact.use_credit') }}
                                </button>
                            @else
                                <a href="{{ route('main.pricing') }}" class="btn btn-warning btn-lg rounded-3 py-3 text-white text-decoration-none">
                                    <i class="bi bi-arrow-up-circle me-2"></i>
                                    {{ __('pages.unlock_contact.upgrade') }}
                                </a>
                            @endif

                            <div class="position-relative my-3">
                                <hr class="text-muted">
                                <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">OR</span>
                            </div>

                            <button type="button" class="btn btn-outline-primary btn-lg rounded-3 py-3" wire:click="selectMethod('payment')" wire:loading.attr="disabled">
                                <i class="bi bi-credit-card-2-front mx-2"></i>
                                {{ __('pages.unlock_contact.pay_9') }}
                            </button>
                        </div>
                    @elseif($step === 2)
                        <div class="text-start">
                            <button type="button" class="btn btn-link text-decoration-none p-0 mb-3 text-dark" wire:click="$set('step', 1)">
                                <i class="bi bi-arrow-left me-1"></i> {{ __('pages.unlock_contact.back') }}
                            </button>
                            <h6 class="fw-bold mb-4">{{ __('pages.unlock_contact.payment_title') }}</h6>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">{{ __('pages.unlock_contact.card_number') }}</label>
                                <input type="text" class="form-control" wire:model="cardNumber" placeholder="0000 0000 0000 0000">
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="mb-3">
                                        <label class="form-label small fw-semibold">{{ __('pages.unlock_contact.expiry_date') }}</label>
                                        <input type="text" class="form-control" wire:model="expiryDate" placeholder="MM/YY">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label class="form-label small fw-semibold">{{ __('pages.unlock_contact.cvv') }}</label>
                                        <input type="text" class="form-control" wire:model="cvv" placeholder="123">
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary btn-lg w-100 rounded-3 py-3 mt-3 text-white" wire:click="processPayment" wire:loading.attr="disabled">
                                <span wire:loading.remove>
                                    <i class="bi bi-shield-lock me-2"></i> {{ __('pages.unlock_contact.pay_now') }} ($9)
                                </span>
                                <span wire:loading>
                                    <span class="spinner-border spinner-border-sm me-1 text-white"></span>
                                    {{ __('pages.unlock_contact.processing') }}
                                </span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-3 px-4 w-100" data-bs-dismiss="modal">{{ __('pages.unlock_contact.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
