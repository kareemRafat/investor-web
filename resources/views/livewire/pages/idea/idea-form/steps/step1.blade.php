<div>

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step1.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        <div class="row g-2 g-md-3">
            @foreach ($ideaOptions as $key => $label)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="radio" class="btn-check" wire:model="ideaField" id="idea-{{ $key }}"
                        value="{{ $key }}" name="ideaField">
                    <label for="idea-{{ $key }}" class="choice-component idea-variant w-100">
                        <span class="choice-text">{{ $label }}</span>
                        <i class="bi bi-check-circle-fill check-indicator"></i>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    @error('ideaField')
        <div class="error-message-wrapper">
            <div class="alert alert-danger rounded-3 shadow-sm mt-3 mx-auto" style="max-width: 500px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
