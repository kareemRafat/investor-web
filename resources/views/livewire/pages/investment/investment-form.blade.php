<div class="container px-sm-0" 
     x-data="{ 
        step: @entangle('currentStep'),
        totalSteps: 7,
        state: @entangle('state'),
        errors: {},
        validationMessages: @js($this->getValidationMessages()),
        scrollToTop() { window.scrollTo({ top: 0, behavior: 'smooth' }) },
        get progress() { return (this.step / this.totalSteps) * 100 },
        validate() {
            this.errors = {};
            let isValid = true;

            if (this.step === 1) {
                if (!this.state.step1.investorField) {
                    this.errors['state.step1.investorField'] = this.validationMessages['state.step1.investorField'];
                    isValid = false;
                }
            } else if (this.step === 2) {
                if (!this.state.step2.countries || this.state.step2.countries.length === 0) {
                    this.errors['state.step2.countries'] = this.validationMessages['state.step2.countries'];
                    isValid = false;
                } else if (this.state.step2.countries.length > 3) {
                    this.errors['state.step2.countries'] = this.validationMessages['state.step2.countries'];
                    isValid = false;
                }
            } else if (this.step === 3) {
                if (!this.state.step3.disableResources) {
                    const data = this.state.step3.data;
                    const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';

                    if (!isPresent(data.company)) { this.errors['state.step3.data.company'] = this.validationMessages['resources.company']; isValid = false; }
                    if (data.company === 'yes' && !isPresent(data.space_type)) { this.errors['state.step3.data.space_type'] = this.validationMessages['resources.space_type']; isValid = false; }
                    if (!isPresent(data.staff)) { this.errors['state.step3.data.staff'] = this.validationMessages['resources.staff']; isValid = false; }
                    if (data.staff === 'yes' && !isPresent(data.staff_number)) { this.errors['state.step3.data.staff_number'] = this.validationMessages['resources.staff_number']; isValid = false; }
                    if (!isPresent(data.workers)) { this.errors['state.step3.data.workers'] = this.validationMessages['resources.workers']; isValid = false; }
                    if (data.workers === 'yes' && !isPresent(data.workers_number)) { this.errors['state.step3.data.workers_number'] = this.validationMessages['resources.workers_number']; isValid = false; }
                    if (!isPresent(data.executive_spaces)) { this.errors['state.step3.data.executive_spaces'] = this.validationMessages['resources.executive_spaces']; isValid = false; }
                    if (data.executive_spaces === 'yes' && !isPresent(data.executive_spaces_type)) { this.errors['state.step3.data.executive_spaces_type'] = this.validationMessages['resources.executive_spaces_type']; isValid = false; }
                    if (!isPresent(data.equipment)) { this.errors['state.step3.data.equipment'] = this.validationMessages['resources.equipment']; isValid = false; }
                    if (data.equipment === 'yes' && !isPresent(data.equipment_type)) { this.errors['state.step3.data.equipment_type'] = this.validationMessages['resources.equipment_type']; isValid = false; }
                    if (!isPresent(data.software)) { this.errors['state.step3.data.software'] = this.validationMessages['resources.software']; isValid = false; }
                    if (data.software === 'yes' && !isPresent(data.software_type)) { this.errors['state.step3.data.software_type'] = this.validationMessages['resources.software_type']; isValid = false; }
                    if (!isPresent(data.website)) { this.errors['state.step3.data.website'] = this.validationMessages['resources.website']; isValid = false; }
                }
            } else if (this.step === 4) {
                const data = this.state.step4.data;
                if (!data.contribute_type) {
                    this.errors['state.step4.data.contribute_type'] = this.validationMessages['contribution.type'];
                    isValid = false;
                } else if (data.contribute_type === 'personal') {
                    if (!data.staff) {
                        this.errors['state.step4.data.staff'] = this.validationMessages['contribution.staff'];
                        isValid = false;
                    }
                } else if (data.contribute_type === 'capital') {
                    if (!data.money_amount && !data.money_percent) {
                        this.errors['state.step4.data.money_amount'] = this.validationMessages['contribution.money_required_one'];
                        isValid = false;
                    }
                } else if (data.contribute_type === 'both') {
                    if (!data.person_money_amount && !data.person_money_percent) {
                        this.errors['state.step4.data.person_money_amount'] = this.validationMessages['contribution.person_money_required_one'];
                        isValid = false;
                    }
                    if (!data.staff_person_money) {
                        this.errors['state.step4.data.staff_person_money'] = this.validationMessages['contribution.staff_person_money'];
                        isValid = false;
                    }
                }
            } else if (this.step === 5) {
                if (!this.state.step5.disableResources) {
                    const data = this.state.step5.data;
                    if (!data.money_contributions) {
                        this.errors['state.step5.data.money_contributions'] = this.validationMessages['state.step5.data.money_contributions'];
                        isValid = false;
                    }
                }
            } else if (this.step === 6) {
                const data = this.state.step6.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';

                if (!isPresent(data.investor_title)) { this.errors['state.step6.data.investor_title'] = this.validationMessages['profile.title']; isValid = false; }
                if (!isPresent(data.summary)) { this.errors['state.step6.data.summary'] = this.validationMessages['profile.summary']; isValid = false; }
                
                if (this.state.step6.showProfileFields) {
                    if (!isPresent(this.state.step6.job_title)) { this.errors['state.step6.job_title'] = this.validationMessages['profile.job_title']; isValid = false; }
                    if (!isPresent(this.state.step6.phone)) { this.errors['state.step6.phone'] = this.validationMessages['profile.phone']; isValid = false; }
                    if (!isPresent(this.state.step6.residence_country)) { this.errors['state.step6.residence_country'] = this.validationMessages['profile.residence_country']; isValid = false; }
                    if (!isPresent(this.state.step6.birth_date)) { this.errors['state.step6.birth_date'] = this.validationMessages['profile.birth_date']; isValid = false; }
                }
            }

            if (!isValid) {
                // Add shake effect to the first error if possible, or just focus
            }

            return isValid;
        }
     }"
     x-init="
        $watch('state', () => { errors = {}; });
        $watch('step', () => { errors = {}; });
     "
     x-on:livewire-step-changed.window="scrollToTop()">

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-8px); }
            40% { transform: translateX(8px); }
            60% { transform: translateX(-8px); }
            80% { transform: translateX(8px); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .error-alert-custom {
            animation: shake 0.5s ease-in-out, fadeIn 0.3s ease-in-out;
            background-color: #dc3545;
            color: white;
            border-radius: 12px;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
            margin-top: 1rem;
            text-align: center;
            justify-content: center;
        }
    </style>
    
    <div class="row g-3 mb-3">
        <div class="col-12">

            {{-- steps --}}
            <div class="position-relative" wire:loading.class="opacity-50" wire:target="handleNextAction, previousStep, goToStep, save">
                <div x-show="step === 1" x-transition>
                    @include('livewire.pages.investment.steps.step1')
                </div>
                <div x-show="step === 2" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step2')
                </div>
                <div x-show="step === 3" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step3')
                </div>
                <div x-show="step === 4" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step4')
                </div>
                <div x-show="step === 5" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step5')
                </div>
                <div x-show="step === 6" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step6')
                </div>
                <div x-show="step === 7" x-transition x-cloak>
                    @include('livewire.pages.investment.steps.step7')
                </div>
            </div>

            <div wire:cloak class="d-flex align-items-center gap-3 justify-content-center mt-4 mb-3">
                @if ($currentStep != 1)
                    <button wire:click="previousStep" type="button" class="yn-button"
                        style="min-width: 120px; background: white; color: #667eea; border-color: #c7d2fe;"
                        aria-label="{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}">
                        <span class="d-flex align-items-center justify-content-center gap-2">
                            @if (app()->getLocale() === 'ar')
                                <i class="bi bi-arrow-right-circle"></i>
                                <span>{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}</span>
                            @else
                                <i class="bi bi-arrow-left-circle"></i>
                                <span>{{ $currentStep === 7 ? __('investor.form.edit') : __('investor.form.previous') }}</span>
                            @endif
                        </span>
                    </button>
                @endif

                <button type="button"
                    @click.prevent="validate() ? $wire.handleNextAction() : null" 
                    wire:loading.attr="disabled"
                    wire:target="handleNextAction" 
                    class="yn-button"
                    style="min-width: 120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);"
                    aria-label="{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}"
                    title="{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}">

                    <span class="d-flex align-items-center justify-content-center gap-2">
                        {{-- Text --}}
                        <span>{{ $currentStep === 7 ? __('investor.form.finish') : __('investor.form.next') }}</span>

                        {{-- Icon: Arrow (shown when NOT loading) --}}
                        <span wire:loading.remove wire:target="handleNextAction">
                            @if (app()->getLocale() === 'ar')
                                <i class="bi bi-arrow-left-circle"></i>
                            @else
                                <i class="bi bi-arrow-right-circle"></i>
                            @endif
                        </span>

                        {{-- Spinner (shown when loading) --}}
                        <span wire:loading wire:target="handleNextAction" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span>
                    </span>
                </button>
            </div>

            <div wire:cloak class="stepper d-flex align-items-center justify-content-center flex-wrap gap-2 mb-4">
                @for ($i = 1; $i <= 7; $i++)
                    <div class="stepper-item position-relative
                        @if ($i < $currentStep) completed_step
                        @elseif($i === $currentStep) active_step @endif"
                        @if ($i <= $maxAllowedStep) wire:click="goToStep({{ $i }})"
                        style="cursor: pointer"
                        @else
                        style="opacity: .4; cursor: not-allowed" @endif>
                        <div class="stepper-circle">
                            @if ($i < $currentStep)
                                <i class="bi bi-check-circle-fill"></i>
                            @else
                                {{ $i }}
                            @endif
                        </div>
                    </div>

                    @if ($i < 7)
                        <div class="stepper-line"></div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</div>
