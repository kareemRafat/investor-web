<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step9.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <div class="col-12">
                <textarea class="form-control border-custom rounded-8 pt-3" rows="8"
                    placeholder="{{ __('idea.steps.step9.placeholder') }}" wire:model='data.summary'
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

            <div class="col-12 mt-4" dir="ltr">
                <label for="idea-attachment"
                    class="form-control d-flex align-items-center gap-2 cursor-pointer justify-content-between py-3 border-custom rounded-8">
                    <span>{{ __('idea.steps.step9.file_format') }}</span>
                    <i class="bi bi-paperclip fs-5"></i>
                </label>
                <input type="file" id="idea-attachment" class="d-none" wire:model='data.attachment'>
                {{-- Display selected or current file name --}}
                @if ($data['attachment'] || $currentAttachment !== 'Uploaded File')
                    <div class="mt-2 d-flex align-items-center gap-2"
                        dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
                        <small class="text-primary fw-bold">
                            {{ __('idea.steps.step9.selected_file') }}:
                            <span
                                class="mx-2">{{ $data['attachment'] ? $data['attachment']->getClientOriginalName() : $currentAttachment }}</span>
                        </small>
                    </div>
                @endif
            </div>
            <hr class="mt-3">
        </div>

        <!-- hidden client date -->
        <x-form.hidden-client-date wire-model="data.created_at" />
    </div>



    <div class="d-flex justify-content-center">
        @if ($errors->any())
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $errors->first() }}
            </span>
        @endif
    </div>
</div>
