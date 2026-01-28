<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step6.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <div class="col-12">
                <input type="text" class="form-control border-custom rounded-5 p-2"
                    placeholder="{{ __('investor.steps.step6.investor_title') }}" wire:model='data.investor_title'>
            </div>
            <div class="col-12 position-relative">
                <textarea class="form-control border-custom rounded-5 pt-3" rows="8"
                    placeholder="{{ __('investor.steps.step6.placeholder') }}" wire:model='data.summary'
                    style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};"
                    dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}"></textarea>

                <div class="d-flex justify-content-between gap-3 mt-2">
                    <small class="text-muted text-start text-primary">
                        {{ __('investor.steps.step6.confidential_info') }}
                    </small>
                    <small class="text-primary">
                        {{ __('investor.steps.step6.max_characters') }}
                    </small>
                </div>
            </div>

            {{-- contact visibilty --}}
            <div class="col-12 mt-4">
                <label class="form-label fw-semibold mb-2">
                    {{ __('investor.steps.step6.contact_visibility_title') }}
                </label>

                <div class="d-flex gap-4">

                    {{-- Closed --}}
                    <label
                        class="d-flex align-items-center gap-2 border rounded-5 px-3 py-2 cursor-pointer
                   {{ ($data['contact_visibility'] ?? 'closed') === 'closed' ? 'border-primary text-primary' : 'border-custom' }}">
                        <input type="radio" class="form-check-input" value="closed"
                            wire:model="data.contact_visibility">
                        <span>
                            🔒 {{ __('investor.steps.step6.contact_closed') }}
                        </span>
                    </label>

                    {{-- Open --}}
                    <label
                        class="d-flex align-items-center gap-2 border rounded-5 px-3 py-2 cursor-pointer
                   {{ ($data['contact_visibility'] ?? 'closed') === 'open' ? 'border-primary text-primary' : 'border-custom' }}">
                        <input type="radio" class="form-check-input" value="open"
                            wire:model="data.contact_visibility">
                        <span>
                            🔓 {{ __('investor.steps.step6.contact_open') }}
                        </span>
                    </label>

                </div>

                <small class="text-muted d-block mt-2">
                    {{ __('investor.steps.step6.contact_visibility_hint') }}
                </small>
            </div>

            <div class="col-12 position-relative mt-4" dir="ltr">
                <label for="investor-attachment"
                    class="form-control d-flex align-items-center gap-2 cursor-pointer justify-content-between py-3 border-custom rounded-5">
                    <span>{{ __('investor.steps.step6.file_format') }}</span>
                    <i class="bi bi-paperclip fs-5"></i>
                </label>
                <input type="file" id="investor-attachment" class="d-none" wire:model="data.attachment">
                {{-- Display selected or current file name --}}
                @if ($data['attachment'] || $currentAttachment !== 'Uploaded File')
                    <div class="mt-2 d-flex align-items-center gap-2"
                        dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
                        <small class="text-primary fw-bold">
                            {{ __('investor.steps.step6.selected_file') }}:
                            <span
                                class="mx-2">{{ $data['attachment'] ? $data['attachment']->getClientOriginalName() : $currentAttachment }}</span>
                        </small>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- hidden client date -->
    <x-form.hidden-client-date wire-model="data.created_at" />

    @if ($errors->any())
        <div class="d-flex justify-content-center">
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">{{ $errors->first() }}</span>
        </div>
    @endif
</div>
