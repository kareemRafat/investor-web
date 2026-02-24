<div class="py-5" x-data="{ showDowngradeModal: false }">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark display-5 mb-3">
                {{ __('pages.pricing.title') }}
            </h2>
            <p class="text-muted lead mx-auto" style="max-width: 700px;">
                {{ __('pages.pricing.subtitle') }}
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Start Plan -->
            <div class="col-lg-4 col-md-6">
                <div
                    class="card h-100 {{ $this->isUpgrade('free') ? 'border-primary border-2 shadow' : 'border-0 shadow-sm' }} rounded-4 overflow-hidden position-relative">
                    @if ($this->isUpgrade('free'))
                        <div
                            class="position-absolute top-0 start-50 translate-middle-x badge bg-primary px-4 py-2 rounded-bottom shadow-sm mt-1">
                            {{ __('pages.pricing.upgrade') }}
                        </div>
                    @endif
                    <div class="card-body p-4 d-flex flex-column text-center pt-5">
                        <div class="mb-4">
                            <div class="mb-3">
                                <i class="bi bi-rocket-takeoff text-warning display-4"></i>
                            </div>
                            <div class="d-inline-block bg-warning text-dark px-3 py-1 rounded fw-bold mb-3">
                                {{ __('pages.pricing.free_title') }}
                            </div>
                            <div class="d-flex align-items-baseline justify-content-center">
                                <span class="display-4 fw-bold text-dark">{{ __('pages.pricing.price_free') }}</span>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-5 flex-grow-1 text-end"
                            dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.browse_ideas') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.browse_investors') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-x-circle-fill text-danger mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.limited_unlocks') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.support') }}</span>
                            </li>
                        </ul>

                        <button
                            @if (auth()->user()?->isPremium()) @click="showDowngradeModal = true"
                            @else
                                wire:click="selectPlan('free')" @endif
                            @if (auth()->user()?->plan_type === \App\Enums\PlanType::FREE) disabled @endif
                            class="btn {{ auth()->user()?->plan_type === \App\Enums\PlanType::FREE ? 'btn-secondary' : 'btn-outline-primary' }} w-100 py-2 fw-bold rounded-3">
                            {{ auth()->user()?->plan_type === \App\Enums\PlanType::FREE ? __('pages.pricing.current_plan') : __('pages.pricing.choose_plan') }}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Monthly Plan -->
            <div class="col-lg-4 col-md-6">
                <div
                    class="card h-100 {{ $this->isUpgrade('monthly') ? 'border-primary border-2 shadow' : 'border-0 shadow-sm' }} rounded-4 overflow-hidden position-relative">
                    @if ($this->isUpgrade('monthly'))
                        <div
                            class="position-absolute top-0 start-50 translate-middle-x badge bg-primary px-4 py-2 rounded-bottom shadow-sm mt-1">
                            {{ __('pages.pricing.upgrade') }}
                        </div>
                    @endif
                    <div class="card-body p-4 d-flex flex-column pt-5 text-center">
                        <div class="mb-4">
                            <div class="mb-3">
                                <i class="bi bi-gem text-success display-4"></i>
                            </div>
                            <h3 class="h4 fw-bold text-dark mb-2">{{ __('pages.pricing.monthly_title') }}</h3>
                            <div class="d-flex align-items-baseline justify-content-center">
                                <span
                                    class="display-4 fw-bold text-success">{{ __('pages.pricing.price_monthly') }}</span>
                                <span class="ms-1 text-muted">{{ __('pages.pricing.per_month') }}</span>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-5 flex-grow-1 text-end"
                            dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.browse_ideas') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.browse_investors') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.monthly_credits') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted text-start">{{ __('pages.pricing.features.open_contact_posts') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.priority_support') }}</span>
                            </li>
                        </ul>

                        <a href="{{ route('payment.page', ['plan' => 'monthly']) }}" wire:navigate
                           class="btn {{ auth()->user()?->plan_type === \App\Enums\PlanType::MONTHLY ? 'btn-secondary disabled' : 'btn-primary' }} w-100 py-2 fw-bold shadow-sm rounded-3">
                            @if (auth()->user()?->plan_type === \App\Enums\PlanType::MONTHLY)
                                {{ __('pages.pricing.current_plan') }}
                            @else
                                {{ __('pages.pricing.choose_plan') }}
                            @endif
                        </a>
                    </div>
                </div>
            </div>

            <!-- Yearly Plan -->
            <div class="col-lg-4 col-md-12">
                <div
                    class="card h-100 {{ $this->isUpgrade('yearly') ? 'border-primary border-2 shadow' : 'border-0 shadow-sm' }} rounded-4 overflow-hidden position-relative">
                    @if ($this->isUpgrade('yearly'))
                        <div
                            class="position-absolute top-0 start-50 translate-middle-x badge bg-primary px-4 py-2 rounded-bottom shadow-sm mt-1">
                            {{ __('pages.pricing.upgrade') }}
                        </div>
                    @endif
                    <div
                        class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark px-3 py-2 rounded shadow-sm">
                        {{ __('pages.pricing.save_20') }}
                    </div>
                    <div class="card-body p-4 d-flex flex-column pt-5 text-center">
                        <div class="mb-4">
                            <div class="mb-3">
                                <i class="bi bi-gem text-danger display-4"></i>
                            </div>
                            <h3 class="h4 fw-bold text-dark mb-2">{{ __('pages.pricing.yearly_title') }}</h3>
                            <div class="d-flex align-items-baseline justify-content-center">
                                <span class="display-4 fw-bold text-danger">{{ __('pages.pricing.price_yearly') }}</span>
                                <span class="ms-1 text-muted">{{ __('pages.pricing.per_year') }}</span>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-5 flex-grow-1 text-end"
                            dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.browse_ideas') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.browse_investors') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.monthly_credits') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted text-start">{{ __('pages.pricing.features.open_contact_posts') }}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success mx-2"></i>
                                <span class="text-muted">{{ __('pages.pricing.features.whatsapp_support') }}</span>
                            </li>
                        </ul>

                        <a href="{{ route('payment.page', ['plan' => 'yearly']) }}" wire:navigate
                           class="btn {{ auth()->user()?->plan_type === \App\Enums\PlanType::YEARLY ? 'btn-secondary disabled' : 'btn-outline-primary' }} w-100 py-2 fw-bold rounded-3">
                            @if (auth()->user()?->plan_type === \App\Enums\PlanType::YEARLY)
                                {{ __('pages.pricing.current_plan') }}
                            @else
                                {{ __('pages.pricing.choose_plan') }}
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Downgrade Confirmation Modal -->
    <div x-show="showDowngradeModal" class="modal fade" :class="{ 'show d-block': showDowngradeModal }" tabindex="-1"
        style="background-color: rgba(0,0,0,0.5); z-index: 1055;" @keydown.window.escape="showDowngradeModal = false"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow border-0 overflow-hidden">
                <div
                    class="modal-header bg-light border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="modal-title fw-bold text-danger fs-6 mb-0">
                        <i class="bi bi-exclamation-triangle-fill mx-1"></i>
                        {{ __('pages.downgrade.title') }}
                    </h5>
                    <button type="button" class="btn-close m-0" @click="showDowngradeModal = false"
                        style="font-size: 0.8rem;"></button>
                </div>
                <div class="modal-body py-4">
                    <p class="mb-0 text-muted fw-bold" style="font-size: 0.95rem;">
                        {{ __('pages.downgrade.message') }}</p>
                </div>
                <div class="modal-footer border-top-0 pt-0 pb-4">
                    <button type="button" class="btn btn-light fw-bold px-4" @click="showDowngradeModal = false">
                        {{ __('pages.downgrade.cancel') }}
                    </button>
                    <button type="button" class="btn btn-danger fw-bold px-4" wire:click="selectPlan('free')"
                        @click="showDowngradeModal = false">
                        {{ __('pages.downgrade.confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
