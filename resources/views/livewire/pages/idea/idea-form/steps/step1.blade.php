<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step1.subtitle') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-3 justify-content-center">
            @foreach ($ideaOptions as $key => $label)
                <div class="col-6 col-lg-3 col-md-6">
                    <input type="radio" class="btn-check" wire:model="ideaField" id="idea-{{ $key }}"
                        value="{{ $key }}" autocomplete="off" name="ideaField">

                    <label
                        class="btn btn-outline-primary w-100 h-100 px-1 px-md-2 py-3 rounded-8 shadow-sm fw-bold small"
                        for="idea-{{ $key }}">
                        {{ $label }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    @error('ideaField')
        <div class="d-flex justify-content-center">
            <div  class="text-light bg-danger rounded p-2 text-center fw-bold mt-3 w-25">{{ $message }}</div>
        </div>
    @enderror
</div>
