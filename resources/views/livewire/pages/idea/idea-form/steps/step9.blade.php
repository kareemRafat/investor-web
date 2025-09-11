<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step9.subtitle') }}" />

    @dump($errors->all())

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <div class="col-12">
                <textarea class="form-control border-custom rounded-8 pt-3" rows="10"
                    placeholder="{{ __('idea.steps.step9.placeholder') }}" wire:model='data.summary'
                    style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};"></textarea>

                <div class="d-flex justify-content-between gap-3 mt-2">
                    <small class="text-muted text-start text-primary">
                        {{ __('idea.steps.step9.confidential_info') }}
                    </small>
                    <small class="text-primary">
                        {{ __('idea.steps.step9.max_characters') }}
                    </small>
                </div>

                @error('data.summary')
                    <div class="text-danger d-block my-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12 mt-4" dir="ltr">
                <label for="idea-attachment"
                    class="form-control d-flex align-items-center gap-2 cursor-pointer justify-content-between py-3 border-custom rounded-8">
                    <span>{{ __('idea.steps.step9.file_format') }}</span>
                    <i class="bi bi-paperclip fs-5"></i>
                </label>
                <input type="file" id="idea-attachment" class="d-none" multiple >
            </div>
        </div>
    </div>
</div>
