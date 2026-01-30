<div class="py-5">
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('main.pricing') }}" class="text-decoration-none text-muted fw-bold d-inline-flex align-items-center gap-2">
                <i class="bi {{ app()->getLocale() === 'ar' ? 'bi-arrow-right' : 'bi-arrow-left' }}"></i>
                {{ __('pages.payment.back') }}
            </a>
        </div>
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark display-5 mb-3">
                {{ __('pages.payment.title') }}
            </h2>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Plan Details -->
            <div class="col-lg-5 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h4 class="fw-bold text-dark mb-0">{{ __('pages.payment.plan_details') }}</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">{{ __('pages.pricing.plans') }}</span>
                            <span class="fw-bold text-primary h5 mb-0">
                                @if($plan === 'monthly')
                                    {{ __('pages.pricing.monthly_title') }}
                                @else
                                    {{ __('pages.pricing.yearly_title') }}
                                @endif
                            </span>
                        </div>
                        <hr class="text-muted my-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted fw-bold">{{ __('pages.payment.total') }}</span>
                            <span class="display-6 fw-bold text-dark">
                                @if($plan === 'monthly')
                                    {{ __('pages.pricing.price_monthly') }}
                                @else
                                    {{ __('pages.pricing.price_yearly') }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="col-lg-7 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                     <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h4 class="fw-bold text-dark mb-0">{{ __('pages.payment.card_info') }}</h4>
                    </div>
                    <div class="card-body p-4">
                        @if($errorMessage)
                            <div class="alert alert-danger mb-4">
                                {{ $errorMessage }}
                            </div>
                        @endif

                        <form wire:submit.prevent="processPayment">
                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold">{{ __('pages.payment.name_on_card') }}</label>
                                <input type="text" wire:model="nameOnCard" class="form-control form-control-lg rounded-3" placeholder="John Doe" required>
                                @error('nameOnCard') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold">{{ __('pages.payment.card_number') }}</label>
                                <input type="text" wire:model="cardNumber" class="form-control form-control-lg rounded-3" placeholder="0000 0000 0000 0000" required>
                                @error('cardNumber') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <label class="form-label text-muted small fw-bold">{{ __('pages.payment.expiry_date') }}</label>
                                    <input type="text" wire:model="expiryDate" class="form-control form-control-lg rounded-3" placeholder="MM/YY" required>
                                    @error('expiryDate') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-muted small fw-bold">{{ __('pages.payment.cvv') }}</label>
                                    <input type="text" wire:model="cvv" class="form-control form-control-lg rounded-3" placeholder="123" required>
                                    @error('cvv') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('main.pricing') }}" class="btn btn-outline-secondary btn-lg w-50 fw-bold">{{ __('pages.payment.cancel') }}</a>
                                <button type="submit" class="btn btn-custom btn-lg w-50 fw-bold" wire:loading.attr="disabled">
                                    <span wire:loading.remove>
                                        {{ __('pages.payment.pay_button', ['amount' => $plan === 'monthly' ? __('pages.pricing.price_monthly') : __('pages.pricing.price_yearly')]) }}
                                    </span>
                                    <span wire:loading>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Processing...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>