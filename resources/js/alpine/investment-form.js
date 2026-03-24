document.addEventListener('alpine:init', () => {
    Alpine.data('investmentForm', (config) => ({
        step: config.step,
        totalSteps: 7,
        state: config.state,

        // Flattened variables
        expandedType: null,
        isMobile: window.innerWidth < 992,
        limit: 3,

        // Step 4 Investment variables
        get contribute_type() { return this.state.step4.data.contribute_type },
        set contribute_type(val) { this.state.step4.data.contribute_type = val },

        get staff() { return this.state.step4.data.staff },
        set staff(val) { this.state.step4.data.staff = val },

        get staff_person_money() { return this.state.step4.data.staff_person_money },
        set staff_person_money(val) { this.state.step4.data.staff_person_money = val },

        get money_amount() { return this.state.step4.data.money_amount },
        set money_amount(val) { this.state.step4.data.money_amount = val },

        get money_percent() { return this.state.step4.data.money_percent },
        set money_percent(val) { this.state.step4.data.money_percent = val },

        get person_money_amount() { return this.state.step4.data.person_money_amount },
        set person_money_amount(val) { this.state.step4.data.person_money_amount = val },

        get person_money_percent() { return this.state.step4.data.person_money_percent },
        set person_money_percent(val) { this.state.step4.data.person_money_percent = val },

        resetFields(type) {
            this.money_amount = null;
            this.money_percent = null;
            this.person_money_amount = null;
            this.person_money_percent = null;
            this.staff = null;
            this.staff_person_money = null;
            this.contribute_type = type;
        },

        errors: {},
        validationMessages: config.validationMessages,
        scrollToTop() { window.scrollTo({ top: 0, behavior: 'smooth' }) },
        get progress() { return (this.step / this.totalSteps) * 100 },

        clearError(path) {
            if (path && this.errors[path]) {
                delete this.errors[path];
            }
        },

        validate() {
            this.errors = {};
            let isValid = true;

            if (this.step === 1) {
                if (!this.state.step1.investorField) {
                    this.errors['state.step1.investorField'] = this.validationMessages['state.step1.investorField'];
                    isValid = false;
                }
            } else if (this.step === 2) {
                if (!this.state.step2.countries || this.state.step2.countries.length === 0) {
                    this.errors['state.step2.countries'] = this.validationMessages['state.step2.countries'];
                    isValid = false;
                } else if (this.state.step2.countries.length > 3) {
                    this.errors['state.step2.countries'] = this.validationMessages['state.step2.countries'];
                    isValid = false;
                }
            } else if (this.step === 3) {
                if (!this.state.step3.disableResources) {
                    const data = this.state.step3.data;
                    const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';

                    if (!isPresent(data.company)) { this.errors['state.step3.data.company'] = this.validationMessages['resources.company']; isValid = false; }
                    if (data.company === 'yes' && !isPresent(data.space_type)) { this.errors['state.step3.data.space_type'] = this.validationMessages['resources.space_type']; isValid = false; }
                    if (!isPresent(data.staff)) { this.errors['state.step3.data.staff'] = this.validationMessages['resources.staff']; isValid = false; }
                    if (data.staff === 'yes' && !isPresent(data.staff_number)) { this.errors['state.step3.data.staff_number'] = this.validationMessages['resources.staff_number']; isValid = false; }
                    if (!isPresent(data.workers)) { this.errors['state.step3.data.workers'] = this.validationMessages['resources.workers']; isValid = false; }
                    if (data.workers === 'yes' && !isPresent(data.workers_number)) { this.errors['state.step3.data.workers_number'] = this.validationMessages['resources.workers_number']; isValid = false; }
                    if (!isPresent(data.executive_spaces)) { this.errors['state.step3.data.executive_spaces'] = this.validationMessages['resources.executive_spaces']; isValid = false; }
                    if (data.executive_spaces === 'yes' && !isPresent(data.executive_spaces_type)) { this.errors['state.step3.data.executive_spaces_type'] = this.validationMessages['resources.executive_spaces_type']; isValid = false; }
                    if (!isPresent(data.equipment)) { this.errors['state.step3.data.equipment'] = this.validationMessages['resources.equipment']; isValid = false; }
                    if (data.equipment === 'yes' && !isPresent(data.equipment_type)) { this.errors['state.step3.data.equipment_type'] = this.validationMessages['resources.equipment_type']; isValid = false; }
                    if (!isPresent(data.software)) { this.errors['state.step3.data.software'] = this.validationMessages['resources.software']; isValid = false; }
                    if (data.software === 'yes' && !isPresent(data.software_type)) { this.errors['state.step3.data.software_type'] = this.validationMessages['resources.software_type']; isValid = false; }
                    if (!isPresent(data.website)) { this.errors['state.step3.data.website'] = this.validationMessages['resources.website']; isValid = false; }
                }
            } else if (this.step === 4) {
                const data = this.state.step4.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';

                if (!data.contribute_type) {
                    this.errors['state.step4.data.contribute_type'] = this.validationMessages['contribution.type'];
                    isValid = false;
                } else if (data.contribute_type === 'personal') {
                    if (!data.staff) {
                        this.errors['state.step4.data.staff'] = this.validationMessages['contribution.staff'];
                        isValid = false;
                    }
                } else if (data.contribute_type === 'capital') {
                    if (isPresent(data.money_amount) && isPresent(data.money_percent)) {
                        this.errors['state.step4.data.money_amount'] = this.validationMessages['contribution.money_both_prohibited'];
                        isValid = false;
                    } else if (!isPresent(data.money_amount) && !isPresent(data.money_percent)) {
                        this.errors['state.step4.data.money_amount'] = this.validationMessages['contribution.money_required_one'];
                        isValid = false;
                    }
                } else if (data.contribute_type === 'both') {
                    if (isPresent(data.person_money_amount) && isPresent(data.person_money_percent)) {
                        this.errors['state.step4.data.person_money_amount'] = this.validationMessages['contribution.person_money_both_prohibited'];
                        isValid = false;
                    } else if (!isPresent(data.person_money_amount) && !isPresent(data.person_money_percent)) {
                        this.errors['state.step4.data.person_money_amount'] = this.validationMessages['contribution.person_money_required_one'];
                        isValid = false;
                    }

                    if (!data.staff_person_money) {
                        this.errors['state.step4.data.staff_person_money'] = this.validationMessages['contribution.staff_person_money'];
                        isValid = false;
                    }
                }
            } else if (this.step === 5) {
                if (!this.state.step5.disableResources) {
                    const data = this.state.step5.data;
                    if (!data.money_contributions) {
                        this.errors['state.step5.data.money_contributions'] = this.validationMessages['state.step5.data.money_contributions'];
                        isValid = false;
                    }
                }
            } else if (this.step === 6) {
                const data = this.state.step6.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';

                if (!isPresent(data.investor_title)) { this.errors['state.step6.data.investor_title'] = this.validationMessages['profile.title']; isValid = false; }
                if (!isPresent(data.summary)) { this.errors['state.step6.data.summary'] = this.validationMessages['profile.summary']; isValid = false; }

                if (this.state.step6.showProfileFields) {
                    if (!isPresent(this.state.step6.job_title)) { this.errors['state.step6.job_title'] = this.validationMessages['profile.job_title']; isValid = false; }
                    if (!isPresent(this.state.step6.phone)) { this.errors['state.step6.phone'] = this.validationMessages['profile.phone']; isValid = false; }
                    if (!isPresent(this.state.step6.residence_country)) { this.errors['state.step6.residence_country'] = this.validationMessages['profile.residence_country']; isValid = false; }
                    if (!isPresent(this.state.step6.birth_date)) { this.errors['state.step6.birth_date'] = this.validationMessages['profile.birth_date']; isValid = false; }
                }
            }

            return isValid;
        },

        init() {
            this.$watch('step', () => { this.errors = {}; });
        }
    }));
});
