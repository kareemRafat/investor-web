document.addEventListener('alpine:init', () => {
    Alpine.data('ideaForm', (config) => ({
        step: config.step,
        totalSteps: 10,
        // Last fully server-validated step. Dots at or below it jump instantly
        // with zero requests; Next re-validates + syncs the server in background.
        maxStep: config.maxAllowed ?? 1,
        state: config.state,
        busy: false,

        // Flattened variables for steps to avoid ReferenceErrors
        expandedType: null,
        expanded: null,
        isMobile: window.innerWidth < 992,
        limit: 3,

        toggle(column) {
            if (this.isMobile) {
                this.expanded = this.expanded === column ? null : column;
            }
        },

        // Step 8: switching return type clears the other branches locally
        // (no $wire roundtrips — server re-validates on Next/Finish).
        clearStep8(type) {
            const data = this.state.step8.data;
            if (type !== 'profit') data.profit_only_percentage = null;
            if (type !== 'one_time') { data.one_time_dollar = null; data.one_time_sar = null; }
            if (type !== 'combo') { data.combo_dollar = null; data.combo_sar = null; data.combo_percentage = null; }
        },

        get step6Total() {
            const data = this.state.step6.data;
            return Number(data.company || 0) + Number(data.assets || 0) + Number(data.salaries || 0)
                + Number(data.operating || 0) + Number(data.other || 0);
        },

        // Step 7 Idea variables
        get contribute_type() { return this.state.step7.data.contribute_type },
        set contribute_type(val) { this.state.step7.data.contribute_type = val },

        get staff() { return this.state.step7.data.staff },
        set staff(val) { this.state.step7.data.staff = val },

        get staff_person_money() { return this.state.step7.data.staff_person_money },
        set staff_person_money(val) { this.state.step7.data.staff_person_money = val },

        get money_amount() { return this.state.step7.data.money_amount },
        set money_amount(val) { this.state.step7.data.money_amount = val },

        get money_percent() { return this.state.step7.data.money_percent },
        set money_percent(val) { this.state.step7.data.money_percent = val },

        get person_money_amount() { return this.state.step7.data.person_money_amount },
        set person_money_amount(val) { this.state.step7.data.person_money_amount = val },

        get person_money_percent() { return this.state.step7.data.person_money_percent },
        set person_money_percent(val) { this.state.step7.data.person_money_percent = val },

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

        // ---- Instant navigation (no server for Prev/back, background for Next) ----
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
                if (!this.state.step1.ideaField) {
                    this.errors['state.step1.ideaField'] = this.validationMessages['state.step1.ideaField'];
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
                if (!this.state.step3.cost_type) {
                    this.errors['state.step3.cost_type'] = this.validationMessages['state.step3.cost_type'];
                    isValid = false;
                } else if (!this.state.step3.range_id) {
                    this.errors['state.step3.range_id'] = this.validationMessages['state.step3.range_id'];
                    isValid = false;
                }
            } else if (n === 4) {
                if (!this.state.step4.profit_type) {
                    this.errors['state.step4.profit_type'] = this.validationMessages['state.step4.profit_type'];
                    isValid = false;
                } else if (!this.state.step4.profit_range_id) {
                    this.errors['state.step4.profit_range_id'] = this.validationMessages['state.step4.profit_range_id'];
                    isValid = false;
                }
            } else if (n === 5) {
                const data = this.state.step5.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';
                const badCount = (val) => isPresent(val) && (!Number.isInteger(Number(val)) || Number(val) < 1);

                if (!isPresent(data.company)) { this.errors['state.step5.data.company'] = this.validationMessages['resources.company']; isValid = false; }
                if (data.company === 'yes' && !isPresent(data.space_type)) { this.errors['state.step5.data.space_type'] = this.validationMessages['resources.space_type']; isValid = false; }
                if (!isPresent(data.staff)) { this.errors['state.step5.data.staff'] = this.validationMessages['resources.staff']; isValid = false; }
                if (data.staff === 'yes' && !isPresent(data.staff_number)) { this.errors['state.step5.data.staff_number'] = this.validationMessages['resources.staff_number']; isValid = false; }
                else if (data.staff === 'yes' && badCount(data.staff_number)) { this.errors['state.step5.data.staff_number'] = this.validationMessages['resources.staff_number']; isValid = false; }
                if (!isPresent(data.workers)) { this.errors['state.step5.data.workers'] = this.validationMessages['resources.workers']; isValid = false; }
                if (data.workers === 'yes' && !isPresent(data.workers_number)) { this.errors['state.step5.data.workers_number'] = this.validationMessages['resources.workers_number']; isValid = false; }
                else if (data.workers === 'yes' && badCount(data.workers_number)) { this.errors['state.step5.data.workers_number'] = this.validationMessages['resources.workers_number']; isValid = false; }
                if (!isPresent(data.executive_spaces)) { this.errors['state.step5.data.executive_spaces'] = this.validationMessages['resources.executive_spaces']; isValid = false; }
                if (data.executive_spaces === 'yes' && !isPresent(data.executive_spaces_type)) { this.errors['state.step5.data.executive_spaces_type'] = this.validationMessages['resources.executive_spaces_type']; isValid = false; }
                if (!isPresent(data.equipment)) { this.errors['state.step5.data.equipment'] = this.validationMessages['resources.equipment']; isValid = false; }
                if (data.equipment === 'yes' && !isPresent(data.equipment_type)) { this.errors['state.step5.data.equipment_type'] = this.validationMessages['resources.equipment_type']; isValid = false; }
                if (!isPresent(data.software)) { this.errors['state.step5.data.software'] = this.validationMessages['resources.software']; isValid = false; }
                if (data.software === 'yes' && !isPresent(data.software_type)) { this.errors['state.step5.data.software_type'] = this.validationMessages['resources.software_type']; isValid = false; }
                if (!isPresent(data.website)) { this.errors['state.step5.data.website'] = this.validationMessages['resources.website']; isValid = false; }
            } else if (n === 6) {
                const total = this.step6Total;
                if (total !== 100) {
                    this.errors['state.step6.total'] = this.validationMessages['state.step6.total'];
                    isValid = false;
                }
            } else if (n === 7) {
                const data = this.state.step7.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';
                const badNum = (val, max) => {
                    if (!isPresent(val)) return false;
                    const num = Number(val);
                    return Number.isNaN(num) || num < 1 || (max !== undefined && num > max);
                };
                if (!data.contribute_type) {
                    this.errors['state.step7.data.contribute_type'] = this.validationMessages['contribution.type'];
                    isValid = false;
                } else if (data.contribute_type === 'personal') {
                    if (!data.staff) {
                        this.errors['state.step7.data.staff'] = this.validationMessages['contribution.staff'];
                        isValid = false;
                    }
                } else if (data.contribute_type === 'capital') {
                    if (isPresent(data.money_amount) && isPresent(data.money_percent)) {
                        this.errors['state.step7.data.money_amount'] = this.validationMessages['contribution.money_both_prohibited'];
                        isValid = false;
                    } else if (!isPresent(data.money_amount) && !isPresent(data.money_percent)) {
                        this.errors['state.step7.data.money_amount'] = this.validationMessages['contribution.money_required_one'];
                        isValid = false;
                    } else if (badNum(data.money_amount)) {
                        this.errors['state.step7.data.money_amount'] = this.validationMessages['contribution.money_amount'];
                        isValid = false;
                    } else if (badNum(data.money_percent, 100)) {
                        this.errors['state.step7.data.money_percent'] = this.validationMessages['contribution.money_percent'];
                        isValid = false;
                    }
                } else if (data.contribute_type === 'both') {
                    if (isPresent(data.person_money_amount) && isPresent(data.person_money_percent)) {
                        this.errors['state.step7.data.person_money_amount'] = this.validationMessages['contribution.person_money_both_prohibited'];
                        isValid = false;
                    } else if (!isPresent(data.person_money_amount) && !isPresent(data.person_money_percent)) {
                        this.errors['state.step7.data.person_money_amount'] = this.validationMessages['contribution.person_money_required_one'];
                        isValid = false;
                    } else if (badNum(data.person_money_amount)) {
                        this.errors['state.step7.data.person_money_amount'] = this.validationMessages['contribution.person_money_amount'];
                        isValid = false;
                    } else if (badNum(data.person_money_percent, 100)) {
                        this.errors['state.step7.data.person_money_percent'] = this.validationMessages['contribution.person_money_percent'];
                        isValid = false;
                    }
                    if (!data.staff_person_money) {
                        this.errors['state.step7.data.staff_person_money'] = this.validationMessages['contribution.staff_person_money'];
                        isValid = false;
                    }
                }
            } else if (n === 8) {
                const data = this.state.step8.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';
                const badNum = (val) => isPresent(val) && (Number.isNaN(Number(val)) || Number(val) < 1);

                if (!isPresent(data.return_type)) {
                    this.errors['state.step8.data'] = this.validationMessages['returns.choose_one'];
                    isValid = false;
                } else if (data.return_type === 'profit') {
                    if (!isPresent(data.profit_only_percentage)) {
                        this.errors['state.step8.data.profit_only_percentage'] = this.validationMessages['returns.profit_only_percentage'];
                        isValid = false;
                    }
                } else if (data.return_type === 'one_time') {
                    if (badNum(data.one_time_dollar)) {
                        this.errors['state.step8.one_time_dollar'] = this.validationMessages['returns.one_time_dollar_numeric'];
                        isValid = false;
                    } else if (badNum(data.one_time_sar)) {
                        this.errors['state.step8.one_time_sar'] = this.validationMessages['returns.one_time_sar_numeric'];
                        isValid = false;
                    } else if (!isPresent(data.one_time_dollar) && !isPresent(data.one_time_sar)) {
                        this.errors['state.step8.one_time'] = this.validationMessages['returns.only_one_currency'];
                        isValid = false;
                    } else if (isPresent(data.one_time_dollar) && isPresent(data.one_time_sar)) {
                        this.errors['state.step8.one_time'] = this.validationMessages['returns.only_one_currency'];
                        isValid = false;
                    }
                } else if (data.return_type === 'combo') {
                    if (badNum(data.combo_dollar)) {
                        this.errors['state.step8.combo_dollar'] = this.validationMessages['returns.combo_dollar_numeric'];
                        isValid = false;
                    } else if (badNum(data.combo_sar)) {
                        this.errors['state.step8.combo_sar'] = this.validationMessages['returns.combo_sar_numeric'];
                        isValid = false;
                    } else if (isPresent(data.combo_dollar) && isPresent(data.combo_sar)) {
                        this.errors['state.step8.combo'] = this.validationMessages['returns.only_one_currency'];
                        isValid = false;
                    } else {
                        if (!isPresent(data.combo_percentage)) {
                            this.errors['state.step8.combo_percentage'] = this.validationMessages['returns.combo_percentage_required'];
                            isValid = false;
                        }
                        if (!isPresent(data.combo_dollar) && !isPresent(data.combo_sar)) {
                            this.errors['state.step8.combo_currency'] = this.validationMessages['returns.combo_currency_required'];
                            isValid = false;
                        }
                    }
                }
            } else if (n === 9) {
                const data = this.state.step9.data;
                const isPresent = (val) => val !== null && val !== undefined && String(val).trim() !== '';

                if (!isPresent(data.idea_title)) { this.errors['state.step9.data.idea_title'] = this.validationMessages['profile.title']; isValid = false; }
                if (!isPresent(data.summary)) { this.errors['state.step9.data.summary'] = this.validationMessages['profile.summary']; isValid = false; }

                if (this.state.step9.showProfileFields) {
                    if (!isPresent(this.state.step9.job_title)) { this.errors['state.step9.job_title'] = this.validationMessages['profile.job_title']; isValid = false; }
                    if (!isPresent(this.state.step9.phone)) { this.errors['state.step9.phone'] = this.validationMessages['profile.phone']; isValid = false; }
                    if (!isPresent(this.state.step9.residence_country)) { this.errors['state.step9.residence_country'] = this.validationMessages['profile.residence_country']; isValid = false; }
                    if (!isPresent(this.state.step9.birth_date)) { this.errors['state.step9.birth_date'] = this.validationMessages['profile.birth_date']; isValid = false; }
                }
            }

            return isValid;
        },

        init() {
            this.$watch('state', () => { this.errors = {}; });
            this.$watch('step', () => { this.errors = {}; });
            window.addEventListener('resize', () => { this.isMobile = window.innerWidth < 992; });
            // Mirror server toggle-off clearing so hidden stale values never persist.
            this.$watch('state.step5.data.company', (v) => { if (v === 'no') this.state.step5.data.space_type = null; });
            this.$watch('state.step5.data.staff', (v) => { if (v === 'no') this.state.step5.data.staff_number = null; });
            this.$watch('state.step5.data.workers', (v) => { if (v === 'no') this.state.step5.data.workers_number = null; });
            this.$watch('state.step5.data.executive_spaces', (v) => { if (v === 'no') this.state.step5.data.executive_spaces_type = null; });
            this.$watch('state.step5.data.equipment', (v) => { if (v === 'no') this.state.step5.data.equipment_type = null; });
            this.$watch('state.step5.data.software', (v) => { if (v === 'no') this.state.step5.data.software_type = null; });
        }
    }));
});
