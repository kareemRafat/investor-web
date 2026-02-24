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

            <!-- Payment Options -->
            <div class="col-lg-7 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                     <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h4 class="fw-bold text-dark mb-0">{{ __('pages.payment.method') ?? 'Payment Method' }}</h4>
                    </div>
                    <div class="card-body p-4">
                        @if($errorMessage)
                            <div class="alert alert-danger mb-4">
                                {{ $errorMessage }}
                            </div>
                        @endif

                        @if($this->isPayPalConfigured)
                            <div id="paypal-button-container" wire:ignore></div>
                        @else
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ __('pages.payment.paypal_config_error') }}
                            </div>
                        @endif
                        
                        <div class="d-grid mt-4">
                            <a href="{{ route('main.pricing') }}" class="btn btn-outline-secondary btn-lg fw-bold">{{ __('pages.payment.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @if($this->isPayPalConfigured)
    <script src="https://www.paypal.com/sdk/js?client-id={{ $this->payPalClientId }}&currency={{ config('paypal.currency', 'USD') }}&intent=capture"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            if (typeof paypal !== 'undefined') {
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return @this.createPayPalOrder();
                    },
                    onApprove: function(data, actions) {
                        return @this.capturePayPalOrder(data.orderID).then(response => {
                            if (response.status === 'success') {
                                window.location.href = response.redirect;
                            }
                        });
                    },
                    onCancel: function(data) {
                        @this.handlePayPalCancel();
                    },
                    onError: function(err) {
                        console.error('PayPal Error:', err);
                        @this.handlePayPalError(err);
                    }
                }).render('#paypal-button-container');
            }
        });
    </script>
    @endif
    @endpush
</div>