<div>
    {{-- step header --}}
    <x-pages.investor-wizard.investor-header title="{{ __('pages/mainpage.investor_details') }}"
        subtitle="{{ __('investor.steps.step3.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        {{-- Disable All --}}
        <div class="d-flex align-items-center gap-3 mb-4 p-2 rounded-3" style="background: #f5f2fe; border: 2px solid #afa5fc;">
            <input type="checkbox" id="disable_resources" wire:model.live="disableResources"
                   class="form-check-input" style="width: 20px; height: 20px; cursor: pointer;">
            <label for="disable_resources" class="fw-bold text-primary mb-0" style="cursor: pointer; font-size: 15px;">
               {{ __('investor.steps.step3.checkbox') }}
            </label>
        </div>

        <div class="row g-3">

            {{-- Establishing a company --}}
            <div class="col-12">
                <div class="requirement-row">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex gap-2 align-items-center question-section">
                                <div class="question-label">
                                    {{ __('investor.steps.step3.company') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="company_yes"
                                        wire:model="data.company" value="yes" name="company" @disabled($disableResources)>
                                    <label class="yn-button" for="company_yes">
                                        {{ __('investor.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="company_no"
                                        wire:model="data.company" value="no" name="company" @disabled($disableResources)>
                                    <label class="yn-button" for="company_no">
                                        {{ __('investor.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <span class="option-label-text">{{ __('investor.steps.step3.office_spaces') }}</span>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="space_type"
                                        id="space_type_large" wire:model="data.space_type" value="large" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="space_type_large" style="cursor: pointer;">
                                        {{ __('investor.common.large') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="space_type"
                                        id="space_type_small" wire:model="data.space_type" value="small" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="space_type_small" style="cursor: pointer;">
                                        {{ __('investor.common.small') }}
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
                                    {{ __('investor.steps.step3.staff') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="staff_yes"
                                        wire:model="data.staff" value="yes" name="staff" @disabled($disableResources)>
                                    <label class="yn-button" for="staff_yes">
                                        {{ __('investor.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="staff_no"
                                        wire:model="data.staff" value="no" name="staff" @disabled($disableResources)>
                                    <label class="yn-button" for="staff_no">
                                        {{ __('investor.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="number-input-wrapper">
                                <label for="staff_number" class="number-input-label">
                                    {{ __('investor.common.number') }}
                                </label>
                                <input type="number" class="number-input" id="staff_number"
                                    wire:model="data.staff_number"
                                    placeholder="{{ __('investor.common.enter_number') }}" @disabled($disableResources)/>
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
                                    {{ __('investor.steps.step3.workers') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="workers_yes"
                                        wire:model="data.workers" value="yes" name="workers" @disabled($disableResources)>
                                    <label class="yn-button" for="workers_yes">
                                        {{ __('investor.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="workers_no"
                                        wire:model="data.workers" value="no" name="workers" @disabled($disableResources)>
                                    <label class="yn-button" for="workers_no">
                                        {{ __('investor.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="number-input-wrapper">
                                <label for="workers_number" class="number-input-label">
                                    {{ __('investor.common.number') }}
                                </label>
                                <input type="number" class="number-input" id="workers_number"
                                    wire:model="data.workers_number"
                                    placeholder="{{ __('investor.common.enter_number') }}" @disabled($disableResources)/>
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
                                    {{ __('investor.steps.step3.executive_spaces') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="spaces_yes"
                                        wire:model="data.executive_spaces" value="yes" name="executive_spaces" @disabled($disableResources)>
                                    <label class="yn-button" for="spaces_yes">
                                        {{ __('investor.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="spaces_no"
                                        wire:model="data.executive_spaces" value="no" name="executive_spaces" @disabled($disableResources)>
                                    <label class="yn-button" for="spaces_no">
                                        {{ __('investor.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="factory_open" wire:model="data.executive_spaces_type" value="open_spaces" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="factory_open" style="cursor: pointer;">
                                        {{ __('investor.common.open_spaces') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="factory_type" wire:model="data.executive_spaces_type" value="factory" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="factory_type" style="cursor: pointer;">
                                        {{ __('investor.common.factory') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input class="form-check-input m-0" type="radio" name="executive_spaces_type"
                                        id="land_type" wire:model="data.executive_spaces_type" value="land_space" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="land_type" style="cursor: pointer;">
                                        {{ __('investor.common.land_space') }}
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
                                    {{ __('investor.steps.step3.equipment') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="equipment_yes"
                                        wire:model="data.equipment" value="yes" name="equipment" @disabled($disableResources)>
                                    <label class="yn-button" for="equipment_yes">
                                        {{ __('investor.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="equipment_no"
                                        wire:model="data.equipment" value="no" name="equipment" @disabled($disableResources)>
                                    <label class="yn-button" for="equipment_no">
                                        {{ __('investor.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="Industrial"
                                        wire:model="data.equipment_type" value="industrial" name="equipment_type" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="Industrial" style="cursor: pointer;">
                                        {{ __('investor.common.industrial') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="Electronic"
                                        wire:model="data.equipment_type" value="electronic" name="equipment_type" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="Electronic" style="cursor: pointer;">
                                        {{ __('investor.common.electronic') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="other_equipment"
                                        wire:model="data.equipment_type" value="other" name="equipment_type" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="other_equipment" style="cursor: pointer;">
                                        {{ __('investor.common.other') }}
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
                                    {{ __('investor.steps.step3.software') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="software_yes"
                                        wire:model="data.software" value="yes" name="software" @disabled($disableResources)>
                                    <label class="yn-button" for="software_yes">
                                        {{ __('investor.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="software_no"
                                        wire:model="data.software" value="no" name="software" @disabled($disableResources)>
                                    <label class="yn-button" for="software_no">
                                        {{ __('investor.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="options-section">
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="static"
                                        wire:model="data.software_type" value="static" name="software_type" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="static" style="cursor: pointer;">
                                        {{ __('investor.common.static') }}
                                    </label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" class="form-check-input m-0" id="dynamic"
                                        wire:model="data.software_type" value="dynamic" name="software_type" @disabled($disableResources)>
                                    <label class="form-check-label w-100" for="dynamic" style="cursor: pointer;">
                                        {{ __('investor.common.dynamic') }}
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
                                    {{ __('investor.steps.step3.website') }}
                                </div>
                                <div class="yn-buttons-wrapper">
                                    <input type="radio" class="btn-check" id="website_yes"
                                        wire:model="data.website" value="yes" name="website" @disabled($disableResources)>
                                    <label class="yn-button" for="website_yes">
                                        {{ __('investor.common.yes') }}
                                    </label>

                                    <input type="radio" class="btn-check" id="website_no"
                                        wire:model="data.website" value="no" name="website" @disabled($disableResources)>
                                    <label class="yn-button" for="website_no">
                                        {{ __('investor.common.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="d-flex justify-content-center">
            <span class="text-white bg-danger rounded py-2 px-4 text-center fw-bold mt-3">
                {{ $errors->first() }}</span>
        </div>
    @endif
</div>
