<div x-data="{
    company: @entangle('data.company'),
    assets: @entangle('data.assets'),
    salaries: @entangle('data.salaries'),
    operating: @entangle('data.operating'),
    other: @entangle('data.other'),
    get total() {
        return Number(this.company || 0) +
            Number(this.assets || 0) +
            Number(this.salaries || 0) +
            Number(this.operating || 0) +
            Number(this.other || 0);
    }
}">
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step6.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        <div class="row g-1 g-sm-2">
            @php
                $fields = [
                    'company' => __('idea.steps.step6.fields.company'),
                    'assets' => __('idea.steps.step6.fields.assets'),
                    'salaries' => __('idea.steps.step6.fields.salaries'),
                    'operating' => __('idea.steps.step6.fields.operating'),
                    'other' => __('idea.steps.step6.fields.other'),
                ];
            @endphp

            @foreach ($fields as $key => $label)
                <div class="col-12">
                    <div class="requirement-row">
                        <div class="row g-2 align-items-center">
                            <div class="col-12 col-lg-5">
                                <div class="question-label">
                                    {{ $label }}
                                </div>
                            </div>

                            <div class="col-12 col-lg-7">
                                <div class="d-flex align-items-center gap-2">
                                    <input type="number" min="0" max="100"
                                        x-model.number="{{ $key }}" wire:model.defer="data.{{ $key }}"
                                        class="number-input" placeholder="{{ __('idea.steps.step6.placeholder') }}" />
                                    <div class="text-light">
                                        <span class="bg_icon rounded-circle">
                                            <i class="bi bi-percent"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12 mt-4">
                <div class="text-center">
                    <div class="fw-bold fs-4 mb-2" :class="total === 100 ? 'text-success' : 'text-danger'">
                        {{ __('idea.steps.step6.total') }}: <span x-text="total"></span>%
                    </div>
                    <div class="small">
                        @error('total')
                            <span class="text-danger fw-semibold">{{ $message }}</span>
                        @else
                            <template x-if="total === 100">
                                <span class="text-success fw-semibold">
                                    {{ __('idea.steps.step6.perfect') }}
                                </span>
                            </template>
                            <template x-if="total !== 100">
                                <span class="text-danger fw-semibold">
                                    {{ __('idea.steps.step6.must_equal') }}
                                </span>
                            </template>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
