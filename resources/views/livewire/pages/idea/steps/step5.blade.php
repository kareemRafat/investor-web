<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step5.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-sm p-3 p-md-4">
        <div class="row g-1 g-sm-2">

            {{-- Establishing a company --}}
            <div class="col-12">
                <div class="requirement-row @error('state.step5.data.company') choice-invalid @enderror @error('state.step5.data.space_type') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step5.data.company'] || errors['state.step5.data.space_type'] }">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.company') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="company_yes" x-model="state.step5.data.company"
                                        value="yes" name="company">
                                    <label class="yn-button" for="company_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="company_no" x-model="state.step5.data.company"
                                        value="no" name="company">
                                    <label class="yn-button" for="company_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section" :style="state.step5.data.company !== 'yes' ? 'opacity: 0.5;' : ''">
                                <span class="option-label-text">{{ __('idea.steps.step5.office_spaces') }}</span>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="space_type"
                                        id="space_type_large" x-model="state.step5.data.space_type" value="large"
                                        :disabled="state.step5.data.company !== 'yes'">
                                    <label class="form-check-label" for="space_type_large">
                                        {{ __('idea.common.large') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="space_type"
                                        id="space_type_small" x-model="state.step5.data.space_type" value="small"
                                        :disabled="state.step5.data.company !== 'yes'">
                                    <label class="form-check-label" for="space_type_small">
                                        {{ __('idea.common.small') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Specialized Employees --}}
            <div class="col-12">
                <div class="requirement-row @error('state.step5.data.staff') choice-invalid @enderror @error('state.step5.data.staff_number') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step5.data.staff'] || errors['state.step5.data.staff_number'] }">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.staff') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="staff_yes" x-model="state.step5.data.staff"
                                        value="yes" name="staff">
                                    <label class="yn-button" for="staff_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="staff_no" x-model="state.step5.data.staff"
                                        value="no" name="staff">
                                    <label class="yn-button" for="staff_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="number-input-wrapper" :style="state.step5.data.staff !== 'yes' ? 'opacity: 0.5;' : ''">
                                <label for="staff_number" class="number-input-label">
                                    {{ __('idea.common.number') }}
                                </label>
                                <input type="number" class="number-input" id="staff_number"
                                    x-model="state.step5.data.staff_number"
                                    placeholder="{{ __('idea.common.enter_number') }}"
                                    :disabled="state.step5.data.staff !== 'yes'" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Unprofessional workers --}}
            <div class="col-12">
                <div class="requirement-row @error('state.step5.data.workers') choice-invalid @enderror @error('state.step5.data.workers_number') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step5.data.workers'] || errors['state.step5.data.workers_number'] }">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.workers') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="workers_yes" x-model="state.step5.data.workers"
                                        value="yes" name="workers">
                                    <label class="yn-button" for="workers_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="workers_no" x-model="state.step5.data.workers"
                                        value="no" name="workers">
                                    <label class="yn-button" for="workers_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="number-input-wrapper" :style="state.step5.data.workers !== 'yes' ? 'opacity: 0.5;' : ''">
                                <label for="workers_number" class="number-input-label">
                                    {{ __('idea.common.number') }}
                                </label>
                                <input type="number" class="number-input" id="workers_number"
                                    x-model="state.step5.data.workers_number"
                                    placeholder="{{ __('idea.common.enter_number') }}"
                                    :disabled="state.step5.data.workers !== 'yes'" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Executive Spaces --}}
            <div class="col-12">
                <div class="requirement-row @error('state.step5.data.executive_spaces') choice-invalid @enderror @error('state.step5.data.executive_spaces_type') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step5.data.executive_spaces'] || errors['state.step5.data.executive_spaces_type'] }">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.executive_spaces') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="spaces_yes"
                                        x-model="state.step5.data.executive_spaces" value="yes" name="executive_spaces">
                                    <label class="yn-button" for="spaces_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="spaces_no"
                                        x-model="state.step5.data.executive_spaces" value="no" name="executive_spaces">
                                    <label class="yn-button" for="spaces_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section" :style="state.step5.data.executive_spaces !== 'yes' ? 'opacity: 0.5;' : ''">
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="factory_open" x-model="state.step5.data.executive_spaces_type"
                                        value="open_spaces" :disabled="state.step5.data.executive_spaces !== 'yes'">
                                    <label class="form-check-label" for="factory_open">
                                        {{ __('idea.common.open_spaces') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="factory_type" x-model="state.step5.data.executive_spaces_type" value="factory"
                                        :disabled="state.step5.data.executive_spaces !== 'yes'">
                                    <label class="form-check-label" for="factory_type">
                                        {{ __('idea.common.factory') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="land_type" x-model="state.step5.data.executive_spaces_type" value="land_space"
                                        :disabled="state.step5.data.executive_spaces !== 'yes'">
                                    <label class="form-check-label" for="land_type">
                                        {{ __('idea.common.land_space') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Devices and Equipment --}}
            <div class="col-12">
                <div class="requirement-row @error('state.step5.data.equipment') choice-invalid @enderror @error('state.step5.data.equipment_type') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step5.data.equipment'] || errors['state.step5.data.equipment_type'] }">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.equipment') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="equipment_yes"
                                        x-model="state.step5.data.equipment" value="yes" name="equipment">
                                    <label class="yn-button" for="equipment_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="equipment_no"
                                        x-model="state.step5.data.equipment" value="no" name="equipment">
                                    <label class="yn-button" for="equipment_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section" :style="state.step5.data.equipment !== 'yes' ? 'opacity: 0.5;' : ''">
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="Industrial"
                                        x-model="state.step5.data.equipment_type" value="industrial" name="equipment_type"
                                        :disabled="state.step5.data.equipment !== 'yes'">
                                    <label class="form-check-label" for="Industrial">
                                        {{ __('idea.common.industrial') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="Electronic"
                                        x-model="state.step5.data.equipment_type" value="electronic" name="equipment_type"
                                        :disabled="state.step5.data.equipment !== 'yes'">
                                    <label class="form-check-label" for="Electronic">
                                        {{ __('idea.common.electronic') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="other_equipment"
                                        x-model="state.step5.data.equipment_type" value="other" name="equipment_type"
                                        :disabled="state.step5.data.equipment !== 'yes'">
                                    <label class="form-check-label" for="other_equipment">
                                        {{ __('idea.common.other') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Software and applications --}}
            <div class="col-12">
                <div class="requirement-row @error('state.step5.data.software') choice-invalid @enderror @error('state.step5.data.software_type') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step5.data.software'] || errors['state.step5.data.software_type'] }">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.software') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="software_yes"
                                        x-model="state.step5.data.software" value="yes" name="software">
                                    <label class="yn-button" for="software_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="software_no"
                                        x-model="state.step5.data.software" value="no" name="software">
                                    <label class="yn-button" for="software_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section" :style="state.step5.data.software !== 'yes' ? 'opacity: 0.5;' : ''">
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="static"
                                        x-model="state.step5.data.software_type" value="static" name="software_type"
                                        :disabled="state.step5.data.software !== 'yes'">
                                    <label class="form-check-label" for="static">
                                        {{ __('idea.common.static') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="dynamic"
                                        x-model="state.step5.data.software_type" value="dynamic" name="software_type"
                                        :disabled="state.step5.data.software !== 'yes'">
                                    <label class="form-check-label" for="dynamic">
                                        {{ __('idea.common.dynamic') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Website --}}
            <div class="col-12">
                <div class="requirement-row @error('state.step5.data.website') choice-invalid @enderror"
                    :class="{ 'choice-invalid': errors['state.step5.data.website'] }">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.website') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="website_yes"
                                        x-model="state.step5.data.website" value="yes" name="website">
                                    <label class="yn-button" for="website_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="website_no"
                                        x-model="state.step5.data.website" value="no" name="website">
                                    <label class="yn-button" for="website_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex flex-column align-items-center">
        @php
            $step5ErrorKeys = [
                'state.step5.data.company',
                'state.step5.data.space_type',
                'state.step5.data.staff',
                'state.step5.data.staff_number',
                'state.step5.data.workers',
                'state.step5.data.workers_number',
                'state.step5.data.executive_spaces',
                'state.step5.data.executive_spaces_type',
                'state.step5.data.equipment',
                'state.step5.data.equipment_type',
                'state.step5.data.software',
                'state.step5.data.software_type',
                'state.step5.data.website',
            ];
        @endphp
        @foreach ($step5ErrorKeys as $errorKey)
            @error($errorKey)
                <div class="field-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>{{ $message }}</span>
                </div>
            @enderror
        @endforeach
        <div x-show="Object.keys(errors).length > 0" class="field-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span x-text="Object.values(errors)[0]"></span>
        </div>
    </div>
</div>
