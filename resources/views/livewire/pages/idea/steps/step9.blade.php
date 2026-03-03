<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step9.subtitle') }}"
        :currentStep="$currentStep"
        :totalSteps="$totalSteps" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <div class="col-12">
                <input type="text" class="form-control border-custom rounded-5 p-2"
                    placeholder="{{ __('idea.steps.step9.idea_title') }}" wire:model='state.step9.data.idea_title'>
            </div>
            <div class="col-12">
                <textarea class="form-control border-custom rounded-5 pt-3" rows="8"
                    placeholder="{{ __('idea.steps.step9.placeholder') }}" wire:model='state.step9.data.summary'
                    style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};"
                    dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}"></textarea>

                <div class="d-flex justify-content-between gap-3 mt-2">
                    <small class="text-muted text-start text-primary">
                        {{ __('idea.steps.step9.confidential_info') }}
                    </small>
                    <small class="text-primary">
                        {{ __('idea.steps.step9.max_characters') }}
                    </small>
                </div>
            </div>

            <div class="col-12 mt-4">
                <label class="form-label fw-semibold mb-2">
                    {{ __('idea.steps.step9.contact_visibility_title') }}
                </label>

                <div class="d-flex gap-4">

                    {{-- Closed --}}
                    <label
                        class="d-flex align-items-center gap-2 border rounded-5 px-3 py-2 cursor-pointer
                   {{ ($state['step9']['data']['contact_visibility'] ?? 'closed') === 'closed' ? 'border-primary text-primary' : 'border-custom' }}">
                        <input type="radio" class="form-check-input" value="closed"
                            wire:model="state.step9.data.contact_visibility">
                        <span>
                            🔒 {{ __('idea.steps.step9.contact_closed') }}
                        </span>
                    </label>

                    {{-- Open --}}
                    @php
                        $isFree = auth()->user()->plan_type === \App\Enums\PlanType::FREE;
                    @endphp
                    <label
                        class="d-flex align-items-center gap-2 border rounded-5 px-3 py-2
                   {{ ($state['step9']['data']['contact_visibility'] ?? 'closed') === 'open' ? 'border-primary text-primary' : 'border-custom' }}
                   {{ $isFree ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">
                        <input type="radio" class="form-check-input" value="open"
                            wire:model="state.step9.data.contact_visibility"
                            {{ $isFree ? 'disabled' : '' }}>
                        <span>
                            🔓 {{ __('idea.steps.step9.contact_open') }}
                        </span>
                    </label>

                </div>

                @if($isFree)
                    <p class="text-danger d-block mt-2">
                        <i class="bi bi-info-circle"></i>
                        {{ __('idea.steps.step9.upgrade_required_for_open') }}
                        <a href="{{ route('main.pricing') }}" class="text-primary text-decoration-underline mx-1">{{ __('idea.steps.step9.upgrade_now') }}</a>
                    </p>
                @else
                    <p class="text-info d-block mt-2">
                        <i class="bi bi-info-circle"></i>
                        {{ __('idea.steps.step9.open_costs_credit') }}
                    </p>
                @endif

                <p class="text-muted d-block mt-1">
                    {{ __('idea.steps.step9.contact_visibility_hint') }}
                </p>
            </div>


            <div class="col-12 mt-4" dir="ltr">
                <label for="idea-attachment"
                    class="form-control d-flex align-items-center gap-2 cursor-pointer justify-content-between py-3 border-custom rounded-5">
                    <span>{{ __('idea.steps.step9.file_format') }}</span>
                    <i class="bi bi-paperclip fs-5"></i>
                </label>
                <input type="file" id="idea-attachment" class="d-none" wire:model='state.step9.data.attachment'>
                {{-- Display selected or current file name --}}
                @if ($state['step9']['data']['attachment'] || $state['step9']['currentAttachment'] !== 'Uploaded File')
                    <div class="mt-2 d-flex align-items-center gap-2"
                        dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
                        <small class="text-primary fw-bold">
                            {{ __('idea.steps.step9.selected_file') }}:
                            <span
                                class="mx-2">{{ $state['step9']['data']['attachment'] ? $state['step9']['data']['attachment']->getClientOriginalName() : $state['step9']['currentAttachment'] }}</span>
                        </small>
                    </div>
                @endif
            </div>

            @if ($state['step9']['showProfileFields'])
                <div class="col-12 mt-4 pt-3 border-top">
                    <h6 class="fw-bold mb-3 text-primary">
                        <i class="bi bi-person-badge me-2"></i>
                        {{ __('profile.completion_title') }}
                    </h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">{{ __('pages.register.job_title') }}</label>
                            <input type="text" wire:model="state.step9.job_title" class="form-control border-custom rounded-5"
                                placeholder="{{ __('profile.placeholders.job_title') }}">
                            @error('state.step9.job_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">{{ __('pages.register.phone') }}</label>
                            <input type="tel" wire:model="state.step9.phone" class="form-control border-custom rounded-5"
                                placeholder="{{ __('profile.placeholders.phone') }}">
                            @error('state.step9.phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">{{ __('pages.register.birth_date') }}</label>
                            <input type="date" wire:model="state.step9.birth_date" class="form-control border-custom rounded-5">
                            @error('state.step9.birth_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">{{ __('pages.register.residence_country') }}</label>
                            <select wire:model="state.step9.residence_country" class="form-select border-custom rounded-5">
                                <option value="">{{ __('profile.placeholders.select_country') }}</option>
                                @foreach (__('profile.countries') as $code => $name)
                                    <option value="{{ $name }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('state.step9.residence_country')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif

            <hr class="mt-3">
        </div>

        <!-- hidden client date -->
        <x-form.hidden-client-date wire-model="state.step9.data.created_at" />
    </div>



    <div class="d-flex flex-column align-items-center">
        @if ($errors->any())
            <div class="error-alert-custom">
                <i class="bi bi-exclamation-circle-fill fs-5"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif
        <div x-show="Object.keys(errors).length > 0" class="error-alert-custom">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <span x-text="Object.values(errors)[0]"></span>
        </div>
    </div>
</div>
