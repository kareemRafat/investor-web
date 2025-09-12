<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step4.subtitle') }}" />

    @dump($errors->all())

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <div class="col-12">
                <textarea class="form-control border-custom rounded-8 pt-3" rows="10"
                    placeholder="{{ __('investor.steps.step5.placeholder') }}" wire:model='data.summary'
                    style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};"></textarea>

                <div class="d-flex justify-content-between gap-3 mt-2">
                    <small class="text-muted text-start text-primary">
                        {{ __('investor.steps.step5.confidential_info') }}
                    </small>
                    <small class="text-primary">
                        {{ __('investor.steps.step5.max_characters') }}
                    </small>
                </div>

                @error('data.summary')
                    <div class="text-danger d-block my-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12 mt-4" dir="ltr">
                <label for="investor-attachment"
                    class="form-control d-flex align-items-center gap-2 cursor-pointer justify-content-between py-3 border-custom rounded-8">
                    <span>{{ __('investor.steps.step5.file_format') }}</span>
                    <i class="bi bi-paperclip fs-5"></i>
                </label>
                <input type="file" id="investor-attachment" class="d-none" multiple>
            </div>
            <hr class="mt-3">
            <div class="col-lg-12 d-flex">
                <div class="bg-light shadow-sm rounded-8 p-3 text-center fw-bold mb-3">
                    {{ __('investor.steps.step5.first_time_question') }}
                </div>
                <div class="d-flex align-items-center gap-3 gap-md-4 flex-wrap mb-3 p-3">
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility_public"
                            wire:model="data.visibility" value="public">
                        <label class="form-check-label small" for="visibility_public">
                            {{ __('investor.steps.step5.show_public') }}
                        </label>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input" type="radio" name="visibility" id="visibility_private"
                            wire:model="data.visibility" value="private">
                        <label class="form-check-label small" for="visibility_private">
                            {{ __('investor.steps.step5.keep_private') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
