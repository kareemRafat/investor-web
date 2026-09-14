# Plan 13: Instant Wizard Navigation Rewrite (Idea + Investor)

## Goal
Make Next/Prev in Idea (10 steps) and Investor (7 steps) wizards feel instant (<50ms for Prev/back, instant JS error for Next) while keeping PHP as secure source of truth. No code in this file — execution checklist only.

## Constraints (agreed)
- Structural rewrite (shell + per-step validation objects), not just tweaks.
- JS-first validation for UX, PHP re-validates on Next/Finish.
- Session-only draft persistence (`current_idea_id` / `current_investor_id`). No localStorage resume.

## Current state (why slow)
- Monoliths: `app/Livewire/Pages/Idea/IdeaForm.php` + 9 `Traits/StepN.php`, `app/Livewire/Pages/Investment/InvestmentForm.php` + 7 `Traits/StepN.php`, one giant `$state`.
- Next = Alpine `validate()` then blocking `$wire.handleNextAction()` → `validateStepN()` → `currentStep++` → full re-render.
- Prev/dots = full server roundtrip, no validation needed.
- `state: @entangle('state')` syncs all steps every request; ~90 `wire:model` / `wire:model.live` inputs; `WithFileUploads` on shell; `render()` rebuilds mock model + DB (`Idea::find`, attachments) + `CostProfitRange::filterByType()` + `@js(getValidationMessages())` on every nav.

## Target state
- Slim shell per wizard (holds `currentStep`, `maxAllowedStep`, `$state`, `save()` only).
- Per-step PHP Form objects own `rules()` + `messages()`.
- Alpine owns navigation: Prev/back = pure client; Next = instant JS validate → optimistic step++ → background `$wire` validate/persist with rollback on failure.
- Small payloads: entangle only `currentStep`; step fields via `x-model` / `wire:model.blur`; upload isolated to last-step component; summary computed lazily.

---

## Milestone 0 — Baseline & Guardrails

[] M0-T1 Measure baseline: record Next/Prev Livewire request ms + payload KB (network tab) for Idea step 5→6 and Investor step 3→4, save numbers in PR description.
[] M0-T2 Freeze behavior contract: list per-step required/conditional rules from `lang/{ar,en}/idea.php`, `investor.php` + `Traits/StepN.php` into a parity table (PHP rule ↔ JS check) to reference in M1–M4.
[] M0-T3 Add/refresh Feature tests for `IdeaForm::nextStep/previousStep/goToStep/save` and `InvestmentForm` equivalents so rewrite has fail-safe (backend must still reject invalid Next even if JS bypassed).

Acceptance: baseline numbers + parity table + green tests before M1.

## Milestone 1 — Shared Shell + PHP Validation Extraction (no UX change yet)

[] M1-T1 Create shared Blade: `resources/views/components/wizard/shell.blade.php` (progress + step slot + loading container), `nav-buttons.blade.php` (Prev/Next with `wire:loading.delay`), `error-alert.blade.php` (single server+client error UI).
[] M1-T2 Create `app/Livewire/Forms/Idea/Step1Form.php` … `Step9Form.php`, each with `rules()` + `messages()` moved verbatim from `App\Livewire\Pages\Idea\Traits\StepN::validateStepN()`; shell delegates to them.
[] M1-T3 Create `app/Livewire/Forms/Investment/Step1Form.php` … `Step6Form.php` same way from `App\Livewire\Pages\Investment\Traits\StepN`.
[] M1-T4 Point `resources/views/livewire/pages/idea/idea-form.blade.php` and `investment-form.blade.php` at shared shell/error components; remove duplicated `@error` + `x-show errors` blocks per `steps/step*.blade.php`, keep visuals identical.
[] M1-T5 Verify: existing tests + manual walk (AR/EN) pass with zero behavior change.

Acceptance: file count up, UX identical, no `Traits/StepN` logic left inline in shell.

## Milestone 2 — Alpine Navigation Core (the speed engine)

[] M2-T1 Create `resources/js/alpine/wizard-core.js`: `store = { step, maxAllowed, errors, goPrev(), goBackTo(i), optimisticNext(validateFn, serverCall) }`, `scrollToTop()`, `isPresent()`, `clearErrorsOnChange` via `$watch`; register in `resources/js/app.js`.
[] M2-T2 Define nav contract: Prev/back-dots never call validating methods — Alpine decrements `step` instantly then `$wire.set('currentStep', step)` deferred; Next calls JS `validateStepN()` first, on pass does optimistic `step++` then `$wire.nextStepValidated(step, payload)`; on server `ValidationException` rollback + map errors to Alpine `errors`.
[] M2-T3 Replace shell buttons: Prev `@click="wizard.goPrev()"`, dots `@click="wizard.goBackTo(i)"`, Next `@click.prevent="wizard.optimisticNext(...)"`; add `wire:loading.delay` only on Next/Finish, never block Prev.
[] M2-T4 Change entanglement: shell `x-data` keeps `step: @entangle('currentStep').live` only; remove `state: @entangle('state')` full-object sync; step data flows via explicit small payload on Next + `wire:model.blur` / `x-model` inside steps (decided per-field in M3/M4).
[] M2-T5 Verify: Prev/back feels instant with devtools throttled to Fast 4G; Next with empty required field shows JS error with zero Livewire request.

Acceptance: zero-request Prev, single small-request Next.

## Milestone 3 — Idea Wizard Migration (10 steps)

[] M3-T1 Split `resources/js/alpine/idea-form.js` into `idea-wizard.js` with `validateStep1()` … `validateStep9()` map (logic preserved: step1 field, step2 1–3 countries, step3 cost+range, step4 profit+range, step5 yes/no + `required_if` subfields, step6 total==100, step7 contribute_type branches, step8 return_type branches, step9 title/summary + conditional profile fields); import helpers from `wizard-core.js`.
[] M3-T2 Rebind Idea steps: yes/no toggles + conditional show/hide (`steps/step5.blade.php`, `step3/4/7/8`) from `wire:model.live` → `x-model`; text/number/textarea/date/select (`step6`, `step8` numbers, `step9` title/summary/profile) → `x-model` or `wire:model.blur`/`debounce.500ms`; keep `wire:model.live` only where server must react same-tick (justify each leftover in PR).
[] M3-T3 Replicate `Traits/Step5::updated()` clearing (company/staff/workers/spaces/equipment/software `no` → null subfield) in Alpine `resetFields()` so hidden stale values never reach server.
[] M3-T4 Wire shell `nextStepValidated()`: `validateOnly` via `Forms/Idea/StepNForm` for that step only, update `maxAllowedStep`, persist that step's slice to `$state`/session; `save()` unchanged apart from using Form objects.
[] M3-T5 Verify parity: each Idea step manually fails (JS error, no request) then passes (one small request); run M0 tests; check mobile expanded views + AR/EN messages from `HasFrontendValidation.php` / `lang` files.

Acceptance: Idea Next invalid = instant JS error; valid = instant step++ with background validate; Prev = instant.

## Milestone 4 — Investor Wizard Migration (7 steps)

[] M4-T1 Split `resources/js/alpine/investment-form.js` into `investment-wizard.js` with `validateStep1()` … `validateStep6()` map (step1 field, step2 countries, step3 resources + `disableResources` bypass, step4 contribute branches, step5 `money_contributions` + bypass, step6 title/summary + profile).
[] M4-T2 Rebind Investor steps same rule as M3-T2: `steps/step3.blade.php` + `step5.blade.php` toggles/`disableResources` → `x-model`; `step6.blade.php` title/summary/profile/contact_visibility → `x-model`/`blur`; document any remaining `.live`.
[] M4-T3 Handle `disableResources` bypass identically in JS + PHP (`step3`/`step5` skip subfield checks when true).
[] M4-T4 Wire shell `nextStepValidated()` via `Forms/Investment/StepNForm`, same persist-slice pattern as Idea.
[] M4-T5 Verify parity + tests + AR/EN + mobile, same as M3-T5.

Acceptance: Investor wizard matches Idea speed contract.

## Milestone 5 — Upload Isolation + Render Diet

[] M5-T1 Remove `WithFileUploads` from `IdeaForm.php`, `InvestmentForm.php`, `Traits/Step9.php`, `Traits/Step6.php`; create `app/Livewire/Components/AttachmentField.php` (sole `WithFileUploads` owner) mounted lazily only on Idea step9 / Investor step6.
[] M5-T2 Memoize `render()` data: move `ideaOptions`, `step2Options`, `CostProfitRange::filterByType()` (one-time/annual/money_contribution) to `mount()` properties; stop calling `@js($this->getValidationMessages())` every render (pass once or bundle messages in JS).
[] M5-T3 Make `getIdeaProperty()` / `getInvestorProperty()` lazy `#[Computed]`: only build mock + query `Idea::find`/`Investor::find` + `attachments` when `currentStep == totalSteps` (summary); all other steps skip DB.
[] M5-T4 Keep `@if($currentStep===N) @include(steps.stepN)` (one step HTML), ensure stepper/progress morph is tiny; confirm `wire:target` lists only `nextStepValidated,save` (+ upload component), never `previousStep/goToStep`.
[] M5-T5 Verify: Livewire payload KB drops vs M0 baseline; no multipart on non-upload steps; summary step still shows title/summary/countries/resources/contributions/attachments correctly.

Acceptance: measurable KB + DB-query reduction; upload works only on final step.

## Milestone 6 — QA, Cleanup & Docs

[] M6-T1 Full pass AR + EN: all Idea 10 + Investor 7 steps forward/back/dots/refresh; file types `pdf,doc,docx,xls,xlsx,jpg,jpeg,png` + 10MB limit; free-plan `contact_visibility=open` block; `contact_credits` edge; profile-incomplete branch (`showProfileFields`).
[] M6-T2 Delete dead code: old `Traits/StepN::validateStepN` bodies (keep thin `init` if still used or fold into Form objects), old `idea-form.js`/`investment-form.js` after split, duplicated error blocks, unused `@entangle('state')`.
[] M6-T3 Update `plans/11_frontend_validation_strategy.md` + `plans/12_forms_performance_optimization.md` status or append note pointing to this file; add short `Wizard README` section (nav contract + where to add a new step + JS/PHP parity rule).
[] M6-T4 Rollback plan: keep this rewrite behind separate commits per milestone (M1→M5) so any milestone can be reverted without losing prior green state; do not batch into one commit.

Acceptance: checklist in M6-T1 all green, docs updated, per-milestone commits.

---

## Out of scope
- localStorage/offline resume, multi-device draft sync.
- Filament admin wizards, payment/pricing flows.
- Visual redesign of steps beyond shared shell/error dedupe.
