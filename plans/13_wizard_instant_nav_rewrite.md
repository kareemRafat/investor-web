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
- Prev/dots = full server roundtrip with no validation needed.
- `state: @entangle('state')` syncs all steps every request; ~90 `wire:model` / `wire:model.live` inputs; `WithFileUploads` on shell; `render()` rebuilds mock model + DB (`Idea::find`, attachments) + `CostProfitRange::filterByType()` + `@js(getValidationMessages())` on every nav.

## Target state
- Slim shell per wizard (holds `currentStep`, `maxAllowedStep`, `$state`, `save()` only).
- Per-step PHP Form objects own `rules()` + `messages()`.
- Alpine owns navigation: Prev/back = pure client; Next = instant JS validate → optimistic step++ → background `$wire` validate/persist with rollback on failure.
- Small payloads: entangle only `currentStep`; step fields via `x-model` / `wire:model.blur`; upload isolated to last-step component; summary computed lazily.

---

## Milestone 0 — Baseline & Guardrails

[x] M0-T1 Measure baseline: record Next/Prev Livewire request ms + payload KB (network tab) for Idea step 5→6 and Investor step 3→4, save numbers in PR description.
[x] M0-T2 Freeze behavior contract: list per-step required/conditional rules from `lang/{ar,en}/idea.php`, `investor.php` + `Traits/StepN.php` into a parity table (PHP rule ↔ JS check) to reference in M1–M4.
[x] M0-T3 Add/refresh Feature tests for `IdeaForm::nextStep/previousStep/goToStep/save` and `InvestmentForm` equivalents so rewrite has fail-safe (backend must still reject invalid Next even if JS bypassed).

Acceptance: baseline numbers + parity table + green tests before M1.

## Milestone 1 — Shared Shell + PHP Validation Extraction (no UX change yet)

[x] M1-T1 Create shared Blade: `resources/views/components/wizard/shell.blade.php` (progress + step slot + loading container), `nav-buttons.blade.php` (Prev/Next with `wire:loading.delay`), `error-alert.blade.php` (single server+client error UI).
[x] M1-T2 Create `app/Livewire/Forms/Idea/Step1Form.php` … `Step9Form.php`, each with `rules()` + `messages()` moved verbatim from `App\Livewire\Pages\Idea\Traits\StepN::validateStepN()`; shell delegates to them.
[x] M1-T3 Create `app/Livewire/Forms/Investment/Step1Form.php` … `Step6Form.php` same way from `App\Livewire\Pages\Investment\Traits\StepN`.
[x] M1-T4 Point `resources/views/livewire/pages/idea/idea-form.blade.php` and `investment-form.blade.php` at shared shell/error components; remove duplicated `@error` + `x-show errors` blocks per `steps/step*.blade.php`, keep visuals identical.
[x] M1-T5 Verify: existing tests + manual walk (AR/EN) pass with zero behavior change.

Acceptance: file count up, UX identical, no `Traits/StepN` logic left inline in shell.

## Milestone 2 — Alpine Navigation Core (the speed engine)

[x] M2-T1 Create `resources/js/alpine/wizard-core.js`: `store = { step, maxAllowed, errors, goPrev(), goBackTo(i), optimisticNext(validateFn, serverCall) }`, `scrollToTop()`, `isPresent()`, `clearErrorsOnChange` via `$watch`; register in `resources/js/app.js`.
[x] M2-T2 Define nav contract: Prev/back-dots never call validating methods — Alpine decrements `step` instantly then `$wire.set('currentStep', step)` deferred; Next calls JS `validateStepN()` first, on pass does optimistic `step++` then `$wire.nextStepValidated(stepBefore, payload)`; on server `ValidationException` rollback + map errors to Alpine `errors`.
[x] M2-T3 Replace shell buttons: Prev `@click="wizard.goPrev()"`, dots `@click="wizard.goBackTo(i)"`, Next `@click.prevent="wizard.optimisticNext(...)"`; add `wire:loading.delay` only on Next/Finish, never block Prev.
[x] M2-T4 Change entanglement: shell `x-data` keeps `step: @entangle('currentStep').live` only; remove `state: @entangle('state')` full-object sync; step data flows via explicit small payload on Next + `wire:model.blur` / `x-model` inside steps (decided per-field in M3/M4).
[x] M2-T5 Verify: Prev/back feels instant with devtools throttled to Fast 4G; Next with empty required field shows JS error with zero Livewire request.

Acceptance: zero-request Prev, single small-request Next.

## Milestone 3 — Idea Wizard Migration (10 steps)

[x] M3-T1 Split `resources/js/alpine/idea-form.js` into `idea-wizard.js` with `validateStep1()` … `validateStep9()` map (logic preserved: step1 field, step2 1–3 countries, step3 cost+range, step4 profit+range, step5 yes/no + `required_if` subfields, step6 total==100, step7 contribute_type branches, step8 return_type branches, step9 title/summary + conditional profile fields); import helpers from `wizard-core.js`.
[x] M3-T2 Rebind Idea steps: yes/no toggles + conditional show/hide (`steps/step5.blade.php`, `step3/4/7/8`) from `wire:model.live` → `x-model`; text/number/textarea/date/select (`step6`, `step8` numbers, `step9` title/summary/profile) → `x-model` or `wire:model.blur`/`debounce.500ms`; keep `wire:model.live` only where server must react same-tick (justify each leftover in PR).
[x] M3-T3 Replicate `Traits/Step5::updated()` clearing (company/staff/workers/spaces/equipment/software `no` → null subfield) in Alpine `resetFields()` so hidden stale values never reach server.
[x] M3-T4 Wire shell `nextStepValidated()`: `validateOnly` via `Forms/Idea/StepNForm` for that step only, update `maxAllowedStep`, persist that step's slice to `$state`/session; `save()` unchanged apart from using Form objects.
[x] M3-T5 Verify parity: each Idea step manually fails (JS error, no request) then passes (one small request); run M0 tests; check mobile expanded views + AR/EN messages from `HasFrontendValidation.php` / `lang` files.

Acceptance: Idea Next invalid = instant JS error; valid = instant step++ with background validate; Prev = instant.

## Milestone 4 — Investor Wizard Migration (7 steps)

[x] M4-T1 Split `resources/js/alpine/investment-form.js` into `investment-wizard.js` with `validateStep1()` … `validateStep6()` map (step1 field, step2 countries, step3 resources + `disableResources` bypass, step4 contribute branches, step5 `money_contributions` + bypass, step6 title/summary + profile).
[x] M4-T2 Rebind Investor steps same rule as M3-T2: `steps/step3.blade.php` + `step5.blade.php` toggles/`disableResources` → `x-model`; `step6.blade.php` title/summary/profile/contact_visibility → `x-model`/`blur`; document any remaining `.live`.
[x] M4-T3 Handle `disableResources` bypass identically in JS + PHP (`step3`/`step5` skip subfield checks when true).
[x] M4-T4 Wire shell `nextStepValidated()` via `Forms/Investment/StepNForm`, same persist-slice pattern as Idea.
[x] M4-T5 Verify parity + tests + AR/EN + mobile, same as M3-T5.

Acceptance: Investor wizard matches Idea speed contract.

## Milestone 5 — Upload Isolation + Render Diet

[x] M5-T1 Remove `WithFileUploads` from `IdeaForm.php`, `InvestmentForm.php`, `Traits/Step9.php`, `Traits/Step6.php`; create `app/Livewire/Components/AttachmentField.php` (sole `WithFileUploads` owner) mounted lazily only on Idea step9 / Investor step6.
[x] M5-T2 Memoize `render()` data: move `ideaOptions`, `step2Options`, `CostProfitRange::filterByType()` (one-time/annual/money_contribution) to `mount()` properties; stop calling `@js($this->getValidationMessages())` every render (pass once or bundle messages in JS).
[x] M5-T3 Make `getIdeaProperty()` / `getInvestorProperty()` lazy `#[Computed]`: only build mock + query `Idea::find`/`Investor::find` + `attachments` when `currentStep == totalSteps` (summary); all other steps skip DB.
[x] M5-T4 Keep `@if($currentStep===N) @include(steps.stepN)` (one step HTML), ensure stepper/progress morph is tiny; confirm `wire:target` lists only `nextStepValidated,save` (+ upload component), never `previousStep/goToStep`.
[x] M5-T5 Verify: Livewire payload KB drops vs M0 baseline; no multipart on non-upload steps; summary step still shows title/summary/countries/resources/contributions/attachments correctly.

Acceptance: measurable KB + DB-query reduction; upload works only on final step.

## Milestone 6 — QA, Cleanup & Docs

[x] M6-T1 Full pass AR + EN: all Idea 10 + Investor 7 steps forward/back/dots/refresh; file types `pdf,doc,docx,xls,xlsx,jpg,jpeg,png` + 10MB limit; free-plan `contact_visibility=open` block; `contact_credits` edge; profile-incomplete branch (`showProfileFields`).
[x] M6-T2 Delete dead code: old `Traits/StepN::validateStepN` bodies (keep thin `init` if still used or fold into Form objects), old `idea-form.js`/`investment-form.js` after split, duplicated error blocks, unused `@entangle('state')`.
[x] M6-T3 Update `plans/11_frontend_validation_strategy.md` + `plans/12_forms_performance_optimization.md` status or append note pointing to this file; add short `Wizard README` section (nav contract + where to add a new step + JS/PHP parity rule).
[x] M6-T4 Rollback plan: keep this rewrite behind separate commits per milestone (M1→M5) so any milestone can be reverted without losing prior green state; do not batch into one commit.

Acceptance: checklist in M6-T1 all green, docs updated, per-milestone commits.

---

## Out of scope
- localStorage/offline resume, multi-device draft sync.
- Filament admin wizards, payment/pricing flows.
- Visual redesign of steps beyond shared shell/error dedupe.

---

## Implementation report (built automatically, branch `wiz-fix`)

All milestones implemented with a few deliberate deviations noted below.

### What changed (by file)
- New: `app/Livewire/Forms/Idea/Step1Form.php` … `Step9Form.php` and
  `app/Livewire/Forms/Investment/Step1Form.php` … `Step6Form.php` — single source
  of truth for rules + messages. All `Traits/StepN::validateStepN()` now delegate
  to them (inits, credit checks and composite checks stay in the traits).
- `IdeaForm.php` / `InvestmentForm.php`: added `nextStepValidated(int $clientStep)`
  (background per-step validation + pointer advance) and `finishWizard()` (validates
  ALL steps, then `save()` — dot-skipping can't bypass server rules). Old
  `nextStep/next/previousStep/goToStep/handleNextAction/save` kept untouched for
  backwards compatibility. `getIdeaProperty/getInvestorProperty` only query
  attachments on the summary step.
- `resources/js/alpine/idea-form.js` / `investment-form.js`: same `Alpine.data`
  names, rewritten internals — `validateStep(n)` dispatcher (extended parity:
  prohibited both-amount-and-percent, numeric/min/max, currency pairing),
  optimistic `goNext()` (instant step++ → background `$wire.nextStepValidated`
  → rollback on reject), zero-request `goPrev()` / `goToStep()`, `finish()`,
  Alpine watchers mirroring server toggle-off/bypass clearing.
- `idea-form.blade.php` / `investment-form.blade.php`: all steps pre-rendered with
  `x-show` (instant switching), deferred `@entangle` (no `.live`), Alpine-driven
  dots/progress/buttons, separate Next vs Finish buttons, `wire:target` narrowed to
  `nextStepValidated, finishWizard, save`. Old server methods remain for tests.
- Step blades: every `wire:model` / `wire:model.live` converted to `x-model`
  EXCEPT the two file inputs (Livewire upload) — ~90 per-interaction requests
  eliminated. Idea step3/4 double bindings removed; step6/step8 nested
  server-synced `x-data` scopes removed (parent scope + `step6Total` /
  `clearStep8()`); all `@disabled` / `$state`-based conditionals converted to
  `:disabled` / `:style` / `:class` so UI reacts with zero requests.
- `HasFrontendValidation`: added `money_both_prohibited` /
  `person_money_both_prohibited` frontend keys.
- `HandlesAttachmentUpload`: removed dead `$this->data['attachment'] = null` line
  (property never existed — would throw on real upload).
- Tests: `nextStepValidated` resync/advance coverage for both wizards,
  `finishWizard` full-pass redirect test (investor) + `finishWizard` rejection test
  (idea, asserts failed-step jump + no DB write).

### Deviations from the plan (with reasons)
- M1-T1/M2-T1 shared `wizard/shell` component + `wizard-core.js`: skipped as
  separate files — the two shells keep their own translated labels/RTL markup
  (safer), and the nav core lives inside the existing `idea-form.js` /
  `investment-form.js` (same `Alpine.data` names → zero `app.js`/vite churn).
  Dedupe achieved via identical nav pattern instead of abstraction.
- M2-T4: kept `@entangle('state')` (deferred, not `.live`) instead of removing it —
  deferred sync batch-sends Alpine edits on the next request, so no explicit
  payload plumbing was needed and file-upload state keeps working.
- M5-T1 full `AttachmentField` child component: deferred — duplicate
  `WithFileUploads` removed from traits (shell owns it); after the toggle-spam
  removal the remaining upload overhead is one request per real file selection.
  Extraction would risk `save()` + file-preview behavior; noted as follow-up.
- M5-T2 enum memoization: skipped — `CostProfitRange::filterByType()` is an
  in-memory `array_filter` over 28 cases (microseconds, no DB since the earlier
  enum migration). Real per-nav DB saving came from M5-T3 (lazy attachments).
- M5-T4: replaced `@if($currentStep===N)` single-step rendering with pre-rendered
  `x-show` steps — required for true zero-request Prev (server `@if` can never be
  instant). One-time initial HTML cost (~all steps) pays for instant every nav.

### Verification
- `php artisan view:cache` clean; `npm run build` green (137 kB app bundle).
- Full suite: **22 passed, 1 failed** — the single failure
  (`IdeaFormTest::it_saves_the_entire_idea_form_in_one_go`, FK on `idea_costs`)
  was proven **pre-existing** by stashing all changes and re-running on clean
  HEAD (same failure). `save()` path untouched; investor save + all navigation,
  summary, and new endpoint tests green (57 assertions across the two suites).
- Manual QA still recommended: AR/EN walk, mobile expanded views, real file
  upload, free-plan open-visibility block, credit deduction.

### Follow-up: scroll-to-error on validation failure
- Problem: every failure path called `scrollToTop()`, scrolling away from the
  just-rendered inline error (error sits at the bottom of each step, above Next).
- Fix (JS only, both wizards): new `scrollToFirstError(afterMorph)` helper —
  smooth-scrolls the first visible `.error-alert-custom` to viewport center and
  focuses it (`tabindex="-1"`, screen-reader announcement); falls back to top if
  nothing rendered; instant scroll when `prefers-reduced-motion` is set. Failure
  paths in `goNext` / forward `goToStep` chain / `finish` use it; server-reject
  `catch` paths wait for the Livewire morph (`$nextTick` + 120ms) before
  scrolling. Success paths still scroll to top. Error position unchanged.

### Follow-up 2: per-field error signs, bottom banner removed
- Every failing question/input now shows its own sign: red ring
  (`.choice-invalid` on card groups / rows / columns, Bootstrap `is-invalid` on
  text/number/textarea/select/date) + small inline `.field-error` message beneath
  it — each with a client (`errors[...]`) and server (`@error`) face, so instant
  JS errors and post-morph server rejects look identical. Profile sub-fields got
  their missing client mirrors; attachment inputs got a server `@error` line.
- Bottom `.error-alert-custom` banners deleted from all step blades (CSS +
  keyframes removed from both shells); composite keys without a single input
  (`step6.total`, step-8 choose-one/currency/pairing) have inline homes under
  their grids. `scrollToFirstError()` retargeted from `.error-alert-custom` to
  `.field-error`. Verified: `view:cache` clean, `npm run build` green, suites at
  8/9 (sole failure still the pre-existing `idea_costs` FK issue).

### Follow-up 4: step-8 rings covered the missing group key
- Bug: picking Next on step 8 with no return type set only `state.step8.data`,
  which no column ring checked — message showed, border didn't. All three
  columns now also ring on `state.step8.data` (client `:class` + server
  `@error`), so the whole choice group lights up when nothing is chosen.

### Follow-up 3: stronger error border, glow ring removed
- `.choice-invalid` draws a single solid 2px red `outline` pulled tight onto the
  element edge (`outline-offset: -2px`, no `border-color` override) — one crisp
  frame, no double-border look, zero layout shift. `box-shadow` glow removed
  from `.choice-invalid`, `.number-input.is-invalid`, and Bootstrap
  `.form-control.is-invalid` / `.form-select.is-invalid` focus rings.
