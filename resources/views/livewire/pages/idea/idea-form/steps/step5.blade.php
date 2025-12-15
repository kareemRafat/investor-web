<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step5.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        <div class="row g-1 g-sm-2">

            {{-- Establishing a company --}}
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.company') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="company_yes" wire:model="data.company"
                                        value="yes" name="company">
                                    <label class="yn-button" for="company_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="company_no" wire:model="data.company"
                                        value="no" name="company">
                                    <label class="yn-button" for="company_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <span class="option-label-text">{{ __('idea.steps.step5.office_spaces') }}</span>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="space_type"
                                        id="space_type_large" wire:model="data.space_type" value="large">
                                    <label class="form-check-label" for="space_type_large">
                                        {{ __('idea.common.large') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="space_type"
                                        id="space_type_small" wire:model="data.space_type" value="small">
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
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.staff') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="staff_yes" wire:model="data.staff"
                                        value="yes" name="staff">
                                    <label class="yn-button" for="staff_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="staff_no" wire:model="data.staff"
                                        value="no" name="staff">
                                    <label class="yn-button" for="staff_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="number-input-wrapper">
                                <label for="staff_number" class="number-input-label">
                                    {{ __('idea.common.number') }}
                                </label>
                                <input type="number" class="number-input" id="staff_number"
                                    wire:model="data.staff_number"
                                    placeholder="{{ __('idea.common.enter_number') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Unprofessional workers --}}
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.workers') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="workers_yes" wire:model="data.workers"
                                        value="yes" name="workers">
                                    <label class="yn-button" for="workers_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="workers_no" wire:model="data.workers"
                                        value="no" name="workers">
                                    <label class="yn-button" for="workers_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="number-input-wrapper">
                                <label for="workers_number" class="number-input-label">
                                    {{ __('idea.common.number') }}
                                </label>
                                <input type="number" class="number-input" id="workers_number"
                                    wire:model="data.workers_number"
                                    placeholder="{{ __('idea.common.enter_number') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Executive Spaces --}}
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.executive_spaces') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="spaces_yes"
                                        wire:model="data.executive_spaces" value="yes" name="executive_spaces">
                                    <label class="yn-button" for="spaces_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="spaces_no"
                                        wire:model="data.executive_spaces" value="no" name="executive_spaces">
                                    <label class="yn-button" for="spaces_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="factory_open" wire:model="data.executive_spaces_type"
                                        value="open_spaces">
                                    <label class="form-check-label" for="factory_open">
                                        {{ __('idea.common.open_spaces') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="factory_type" wire:model="data.executive_spaces_type" value="factory">
                                    <label class="form-check-label" for="factory_type">
                                        {{ __('idea.common.factory') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="land_type" wire:model="data.executive_spaces_type" value="land_space">
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
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.equipment') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="equipment_yes"
                                        wire:model="data.equipment" value="yes" name="equipment">
                                    <label class="yn-button" for="equipment_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="equipment_no"
                                        wire:model="data.equipment" value="no" name="equipment">
                                    <label class="yn-button" for="equipment_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="Industrial"
                                        wire:model="data.equipment_type" value="industrial" name="equipment_type">
                                    <label class="form-check-label" for="Industrial">
                                        {{ __('idea.common.industrial') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="Electronic"
                                        wire:model="data.equipment_type" value="electronic" name="equipment_type">
                                    <label class="form-check-label" for="Electronic">
                                        {{ __('idea.common.electronic') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="other_equipment"
                                        wire:model="data.equipment_type" value="other" name="equipment_type">
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
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.software') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="software_yes"
                                        wire:model="data.software" value="yes" name="software">
                                    <label class="yn-button" for="software_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="software_no"
                                        wire:model="data.software" value="no" name="software">
                                    <label class="yn-button" for="software_no">
                                        {{ __('idea.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="static"
                                        wire:model="data.software_type" value="static" name="software_type">
                                    <label class="form-check-label" for="static">
                                        {{ __('idea.common.static') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="dynamic"
                                        wire:model="data.software_type" value="dynamic" name="software_type">
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
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('idea.steps.step5.website') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="website_yes"
                                        wire:model="data.website" value="yes" name="website">
                                    <label class="yn-button" for="website_yes">
                                        {{ __('idea.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="website_no"
                                        wire:model="data.website" value="no" name="website">
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

    <div class="d-flex justify-content-center">
        @if ($errors->any())
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $errors->first() }}
            </span>
        @endif
    </div>
</div>
