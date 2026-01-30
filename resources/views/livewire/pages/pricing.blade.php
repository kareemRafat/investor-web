<div class="py-5">
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
            <!-- Free Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="mb-4">
                            <h3 class="h4 fw-bold text-dark mb-2">{{ __('pages.pricing.free_title') }}</h3>
                            <div class="d-flex align-items-baseline">
                                <span class="display-5 fw-bold text-dark">{{ __('pages.pricing.price_free') }}</span>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-5 flex-grow-1">
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
                        </ul>

                        <button wire:click="selectPlan('free')"
                            @if(auth()->user()?->plan_type === \App\Enums\PlanType::FREE) disabled @endif
                            class="btn {{ auth()->user()?->plan_type === \App\Enums\PlanType::FREE ? 'btn-secondary' : 'btn-outline-custom' }} w-100 py-3 fw-bold">
                            {{ auth()->user()?->plan_type === \App\Enums\PlanType::FREE ? __('pages.pricing.current_plan') : __('pages.pricing.choose_plan') }}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Monthly Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 {{ $this->isUpgrade('monthly') ? 'border-primary border-2 shadow' : 'border-0 shadow-sm' }} rounded-4 overflow-hidden position-relative">
                    @if($this->isUpgrade('monthly'))
                    <div class="position-absolute top-0 start-50 translate-middle-x badge bg-primary px-3 py-2 rounded-bottom shadow-sm mt-1">
                        {{ __('pages.pricing.upgrade') }}
                    </div>
                    @endif
                    <div class="card-body p-4 d-flex flex-column pt-5">
                        <div class="mb-4">
                            <h3 class="h4 fw-bold text-dark mb-2">{{ __('pages.pricing.monthly_title') }}</h3>
                            <div class="d-flex align-items-baseline">
                                <span class="display-5 fw-bold text-primary">{{ __('pages.pricing.price_monthly') }}</span>
                                <span class="ms-1 text-muted">{{ __('pages.pricing.per_month') }}</span>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-5 flex-grow-1">
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
                                <span class="text-muted">{{ __('pages.pricing.features.support') }}</span>
                            </li>
                        </ul>

                        <button wire:click="selectPlan('monthly')"
                            @if(auth()->user()?->plan_type === \App\Enums\PlanType::MONTHLY) disabled @endif
                            class="btn {{ auth()->user()?->plan_type === \App\Enums\PlanType::MONTHLY ? 'btn-secondary' : 'btn-custom' }} w-100 py-3 fw-bold shadow-sm">
                            {{ auth()->user()?->plan_type === \App\Enums\PlanType::MONTHLY ? __('pages.pricing.current_plan') : __('pages.pricing.choose_plan') }}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Yearly Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 {{ $this->isUpgrade('yearly') ? 'border-primary border-2 shadow' : 'border-0 shadow-sm' }} rounded-4 overflow-hidden position-relative">
                    @if($this->isUpgrade('yearly'))
                    <div class="position-absolute top-0 start-50 translate-middle-x badge bg-primary px-3 py-2 rounded-bottom shadow-sm mt-1">
                        {{ __('pages.pricing.upgrade') }}
                    </div>
                    @endif
                    <div class="card-body p-4 d-flex flex-column @if($this->isUpgrade('yearly')) pt-5 @endif">
                        <div class="mb-4">
                            <h3 class="h4 fw-bold text-dark mb-2">{{ __('pages.pricing.yearly_title') }}</h3>
                            <div class="d-flex align-items-baseline">
                                <span class="display-5 fw-bold text-dark">{{ __('pages.pricing.price_yearly') }}</span>
                                <span class="ms-1 text-muted">{{ __('pages.pricing.per_year') }}</span>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-5 flex-grow-1">
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
                                <span class="text-muted">{{ __('pages.pricing.features.priority_support') }}</span>
                            </li>
                        </ul>

                        <button wire:click="selectPlan('yearly')"
                            @if(auth()->user()?->plan_type === \App\Enums\PlanType::YEARLY) disabled @endif
                            class="btn {{ auth()->user()?->plan_type === \App\Enums\PlanType::YEARLY ? 'btn-secondary' : 'btn-outline-custom' }} w-100 py-3 fw-bold">
                            {{ auth()->user()?->plan_type === \App\Enums\PlanType::YEARLY ? __('pages.pricing.current_plan') : __('pages.pricing.choose_plan') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
