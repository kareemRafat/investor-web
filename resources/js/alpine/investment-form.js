document.addEventListener('alpine:init', () => {
    Alpine.data('investmentForm', (config) => ({
        step: config.step,
        totalSteps: 7,
        // Last fully server-validated step. Dots at or below it jump instantly
        // with zero requests; Next re-validates + syncs the server in background.
        maxStep: config.maxAllowed ?? 1,
        state: config.state,
        busy: false,

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
        scrollToTop() { window.scrollTo({ top: 0, behavior: this.scrollBehavior() }) },
        scrollBehavior() { return window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'; },
        // On failure, bring the first VISIBLE inline field error to the viewport
        // center instead of scrolling away from it. Falls back to top when no
        // error is rendered yet (e.g. waiting on a server morph).
        scrollToFirstError(afterMorph = false) {
            const show = () => {
                const alerts = this.$el.querySelectorAll('.field-error');
                for (const el of alerts) {
                    if (el.offsetParent !== null) {
                        el.scrollIntoView({ behavior: this.scrollBehavior(), block: 'center' });
                        if (!el.hasAttribute('tabindex')) el.setAttribute('tabindex', '-1');
                        el.focus({ preventScroll: true });
                        return;
                    }
                }
                this.scrollToTop();
            };
            if (afterMorph) {
                this.$nextTick(() => setTimeout(show, 120));
            } else {
                this.$nextTick(show);
            }
        },
        get progress() { return (this.step / this.totalSteps) * 100 },

        // ---- Instant navigation (no server for Prev back, background for Next) ----
        async goNext() {
            if (this.busy || this.step >= this.totalSteps) return;
            if (!this.validateStep(this.step)) { this.scrollToFirstError(); return; }
            const from = this.step;
            this.step++;
            this.errors = {};
            this.busy = true;
            try {
                await this.$wire.nextStepValidated(from);
                this.maxStep = Math.max(this.maxStep, this.step);
                this.scrollToTop();
            } catch (e) {
                // Server rejected (JS bypassed or credit/plan rule): roll back,
                // server @error blocks render the message after morph.
                this.step = from;
                this.errors = {};
                this.scrollToFirstError(true);
            } finally {
                this.busy = false;
            }
        },

        goPrev() {
            if (this.busy || this.step <= 1) return;
            this.step--;
            this.errors = {};
            this.scrollToTop();
        },

        goToStep(i) {
            if (this.busy || i === this.step || i < 1 || i > this.maxStep) return;
            if (i > this.step) {
                for (let s = this.step; s < i; s++) {
                    if (!this.validateStep(s)) { this.scrollToFirstError(); return; }
                }
            }
            this.errors = {};
            this.step = i;
            this.scrollToTop();
        },

        async finish() {
            if (this.busy) return;
            if (!this.validateStep(this.step)) { this.scrollToFirstError(); return; }
            this.busy = true;
            try {
                await this.$wire.finishWizard();
            } catch (e) {
                // Server jumps currentStep to the failed step via entanglement.
                this.errors = {};
                this.scrollToFirstError(true);
            } finally {
                this.busy = false;
            }
        },

        // Legacy entry used only if a template still calls validate()
        validate() {
            return this.validateStep(this.step);
        },

        validateStep(n) {
            this.errors = {};
            let isValid = true;

            if (n === 1) {
                if (!this.state.step1.investorField) {
                    this.errors['state.step1.investorField'] = this.validationMessages['state.step1.investorField'];
                    isValid = false;
                }
            } else if (n === 2) {
                if (!this.state.step2.countries || this.state.step2.countries.length === 0) {
                    this.errors['state.step2.countries'] = this.validationMessages['state.step2.countries'];
                    isValid = false;
                } else if (this.state.step2.countries.length > 3) {
                    this.errors['state.step2.countries'] = this.validationMessages['state.step2.countries'];
                    isValid = false;
                }
            } else if (n === 3) {
                if (!this.state.step3.disableResources) {
                    const data = this.state.step3.data;
                    const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';
                    const badCount = (val) => isPresent(val) && (!Number.isInteger(Number(val)) || Number(val) < 1);

                    if (!isPresent(data.company)) { this.errors['state.step3.data.company'] = this.validationMessages['resources.company']; isValid = false; }
                    if (data.company === 'yes' && !isPresent(data.space_type)) { this.errors['state.step3.data.space_type'] = this.validationMessages['resources.space_type']; isValid = false; }
                    if (!isPresent(data.staff)) { this.errors['state.step3.data.staff'] = this.validationMessages['resources.staff']; isValid = false; }
                    if (data.staff === 'yes' && !isPresent(data.staff_number)) { this.errors['state.step3.data.staff_number'] = this.validationMessages['resources.staff_number']; isValid = false; }
                    else if (data.staff === 'yes' && badCount(data.staff_number)) { this.errors['state.step3.data.staff_number'] = this.validationMessages['resources.staff_number']; isValid = false; }
                    if (!isPresent(data.workers)) { this.errors['state.step3.data.workers'] = this.validationMessages['resources.workers']; isValid = false; }
                    if (data.workers === 'yes' && !isPresent(data.workers_number)) { this.errors['state.step3.data.workers_number'] = this.validationMessages['resources.workers_number']; isValid = false; }
                    else if (data.workers === 'yes' && badCount(data.workers_number)) { this.errors['state.step3.data.workers_number'] = this.validationMessages['resources.workers_number']; isValid = false; }
                    if (!isPresent(data.executive_spaces)) { this.errors['state.step3.data.executive_spaces'] = this.validationMessages['resources.executive_spaces']; isValid = false; }
                    if (data.executive_spaces === 'yes' && !isPresent(data.executive_spaces_type)) { this.errors['state.step3.data.executive_spaces_type'] = this.validationMessages['resources.executive_spaces_type']; isValid = false; }
                    if (!isPresent(data.equipment)) { this.errors['state.step3.data.equipment'] = this.validationMessages['resources.equipment']; isValid = false; }
                    if (data.equipment === 'yes' && !isPresent(data.equipment_type)) { this.errors['state.step3.data.equipment_type'] = this.validationMessages['resources.equipment_type']; isValid = false; }
                    if (!isPresent(data.software)) { this.errors['state.step3.data.software'] = this.validationMessages['resources.software']; isValid = false; }
                    if (data.software === 'yes' && !isPresent(data.software_type)) { this.errors['state.step3.data.software_type'] = this.validationMessages['resources.software_type']; isValid = false; }
                    if (!isPresent(data.website)) { this.errors['state.step3.data.website'] = this.validationMessages['resources.website']; isValid = false; }
                }
            } else if (n === 4) {
                const data = this.state.step4.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';
                const badNum = (val, max) => {
                    if (!isPresent(val)) return false;
                    const num = Number(val);
                    return Number.isNaN(num) || num < 1 || (max !== undefined && num > max);
                };
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
                    } else if (badNum(data.money_amount)) {
                        this.errors['state.step4.data.money_amount'] = this.validationMessages['contribution.money_amount'];
                        isValid = false;
                    } else if (badNum(data.money_percent, 100)) {
                        this.errors['state.step4.data.money_percent'] = this.validationMessages['contribution.money_percent'];
                        isValid = false;
                    }
                } else if (data.contribute_type === 'both') {
                    if (isPresent(data.person_money_amount) && isPresent(data.person_money_percent)) {
                        this.errors['state.step4.data.person_money_amount'] = this.validationMessages['contribution.person_money_both_prohibited'];
                        isValid = false;
                    } else if (!isPresent(data.person_money_amount) && !isPresent(data.person_money_percent)) {
                        this.errors['state.step4.data.person_money_amount'] = this.validationMessages['contribution.person_money_required_one'];
                        isValid = false;
                    } else if (badNum(data.person_money_amount)) {
                        this.errors['state.step4.data.person_money_amount'] = this.validationMessages['contribution.person_money_amount'];
                        isValid = false;
                    } else if (badNum(data.person_money_percent, 100)) {
                        this.errors['state.step4.data.person_money_percent'] = this.validationMessages['contribution.person_money_percent'];
                        isValid = false;
                    }
                    if (!data.staff_person_money) {
                        this.errors['state.step4.data.staff_person_money'] = this.validationMessages['contribution.staff_person_money'];
                        isValid = false;
                    }
                }
            } else if (n === 5) {
                if (!this.state.step5.disableResources) {
                    const data = this.state.step5.data;
                    if (!data.money_contributions) {
                        this.errors['state.step5.data.money_contributions'] = this.validationMessages['state.step5.data.money_contributions'];
                        isValid = false;
                    }
                }
            } else if (n === 6) {
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
            this.$watch('state', () => { this.errors = {}; });
            this.$watch('step', () => { this.errors = {}; });
            window.addEventListener('resize', () => { this.isMobile = window.innerWidth < 992; });
            // Mirror server bypass clearing so hidden stale values never persist.
            this.$watch('state.step3.disableResources', (v) => {
                if (v) {
                    Object.keys(this.state.step3.data).forEach((k) => { this.state.step3.data[k] = null; });
                }
            });
            this.$watch('state.step5.disableResources', (v) => {
                if (v) this.state.step5.data.money_contributions = null;
            });
        }
    }));
});
