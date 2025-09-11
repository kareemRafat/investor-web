<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="Summary of the idea and its files" />

    @dump($errors->all())

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3">
            <div class="col-12">
                <textarea class="form-control border-custom rounded-8 pt-3" rows="10"
                    placeholder="Write a clear summary of your idea" wire:model='data.summary'></textarea>
                <div class="d-flex justify-content-between gap-3 mt-2">
                    <small class="text-muted text-start text-primary">
                        If there is any important and confidential information about the idea, we advise you
                        not to mention it clearly in this
                        summary to preserve your rights and protect it from being stolen by others.
                    </small>
                    <small class="text-primary">2000 characters maximum</small>

                </div>
                @error('data.summary')
                    <div class="text-danger d-block my-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mt-4" dir="ltr">
                <label for="idea-attachment"
                    class="form-control d-flex align-items-center gap-2 cursor-pointer justify-content-between py-3 border-custom rounded-8">
                    <span>
                        File format must be Word, Excel, PDF, or images
                    </span>
                    <i class="bi bi-paperclip fs-5"></i>
                </label>
                <input type="file" id="idea-attachment" class="d-none" multiple>
            </div>
        </div>
    </div>
</div>
