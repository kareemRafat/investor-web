<div>

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step1.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
        <div class="row g-2 g-md-3">
            @foreach ($ideaOptions as $key => $label)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="radio" class="btn-check" wire:model="ideaField" id="idea-{{ $key }}"
                        value="{{ $key }}" name="ideaField">
                    <label for="idea-{{ $key }}" class="choice-component idea-variant w-100">
                        <span class="choice-text">{{ $label }}</span>
                        <div class="choice-radio-indicator">
                            <i class="bi bi-check-lg fs-5"></i>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        @error('ideaField')
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>
