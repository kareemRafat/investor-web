<div>
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step6.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
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
                                        x-model.number="state.step6.data.{{ $key }}"
                                        class="number-input @error('state.step6.total') is-invalid @enderror"
                                        :class="errors['state.step6.total'] && 'is-invalid'"
                                        placeholder="{{ __('idea.steps.step6.placeholder') }}" />
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
                    <div class="fw-bold fs-4 mb-2" :class="step6Total === 100 ? 'text-success' : 'text-danger'">
                        {{ __('idea.steps.step6.total') }}: <span x-text="step6Total"></span>%
                    </div>
                    <div class="small">
                        @error('state.step6.total')
                            <span class="text-danger fw-semibold">{{ $message }}</span>
                        @else
                            <template x-if="step6Total === 100">
                                <span class="text-success fw-semibold">
                                    {{ __('idea.steps.step6.perfect') }}
                                </span>
                            </template>
                            <template x-if="step6Total !== 100">
                                <span class="text-danger fw-semibold">
                                    {{ __('idea.steps.step6.must_equal') }}
                                </span>
                            </template>
                        @enderror
                    </div>
                    <div x-show="errors['state.step6.total']" class="field-error">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <span x-text="errors['state.step6.total']"></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
