# Performance Optimization Plan: Idea & Investor Forms

This plan aims to eliminate the lag during step transitions in the `IdeaForm` and `InvestmentForm` by implementing Alpine-driven navigation and lazy server-side rendering.

## Current Bottlenecks
1. **Full Round-Trips:** Every "Next" click calls a Livewire method, causing a network delay.
2. **Heavy Payload:** The entire form state (including static translations) is sent to the server on every click.
3. **Eager Rendering:** All 10 steps (Idea) or 7 steps (Investor) are rendered by the server every time, even if they are hidden by `x-show`.
4. **Redundant Queries:** Database queries for dropdown options (like cost ranges) run on every request regardless of the current step.

---

## Milestone 1: IdeaForm Snappy Navigation
**Goal:** Make step transitions near-instant using Alpine.js.

- [x] **Task 1.1: State Cleanup**
    - Remove `ideaOptions` and other static translations from the `public array $state` in `IdeaForm.php` and step traits.
    - Pass these options to the view via the `render()` method or dedicated methods.
- [x] **Task 1.2: Alpine-Driven Transitions**
    - Modify the "Next" and "Previous" buttons in `idea-form.blade.php` to update the Alpine `step` variable first.
    - Only call `$wire.nextStep()` or `$wire.save()` when a server-side action (like validation or final submission) is actually required.
- [x] **Task 1.3: Lazy Server Rendering**
    - Replace `x-show="step === X"` with Blade `@if($currentStep === X)` logic.
    - This ensures the server only generates HTML for the active step, drastically reducing response size.
- [x] **Task 1.4: Cached Data Fetching**
    - Update `Step3` and `Step4` traits to fetch `CostProfitRange` only when `$currentStep` is 3 or 4.
    - Implement Laravel Caching (`Cache::remember` for 24 hours / 86400s) for these ranges to eliminate database hits for static data. (Refined: Migrated to PHP Enums for zero DB hits).

## Milestone 2: InvestmentForm Snappy Navigation
**Goal:** Apply the same high-performance pattern to the Investor form.

- [x] **Task 2.1: State Cleanup**
    - Remove static option arrays from `InvestmentForm.php` `$state`.
- [x] **Task 2.2: Alpine-Driven Transitions**
    - Update `investment-form.blade.php` to handle navigation in the browser.
- [x] **Task 2.3: Lazy Server Rendering**
    - Implement Blade `@if` conditions for steps 1 through 7.
- [x] **Task 2.4: Resource Optimization**
    - Ensure `InvestorResource` fetching only happens when needed.

## Milestone 3: Dual-Layer Validation & UI Polish
**Goal:** Maintain security while providing instant user feedback.

- [x] **Task 3.1: Hybrid Validation Flow**
    - **Step 1 (Instant):** "Next" button triggers Alpine's `validate()` function locally.
    - **Step 2 (Secure):** If Alpine passes, call `$wire.nextStep()`.
    - **Step 3 (Server):** Livewire runs server-side rules (e.g., `validateStepX()`).
    - **Step 4 (Render):** On success, Livewire increments `currentStep` and renders ONLY the next step's HTML.
- [x] **Task 3.2: Error Handling Sync**
    - Ensure server-side validation errors are caught and displayed correctly alongside Alpine's local errors.
- [x] **Task 3.3: Loading States**
    - Apply `wire:loading` to the "Next" button and step container to ensure the user knows a secure check is happening, but keep it snappy by minimizing the data transferred.

---

## Milestone 4: Static Data Migration (Max Performance)
**Goal:** Eliminate database overhead for fixed ranges and options.

- [x] **Task 4.1: Identify Static Entities**
    - Confirm all types in `CostProfitRange` (one-time, annual, money_contribution) are fixed.
- [x] **Task 4.2: Create Backed Enums**
    - Implement `App\Enums\CostRange`, `App\Enums\ProfitRange`, etc., to hold the IDs, labels (AR/EN), and min/max values. (Implemented as `App\Enums\CostProfitRange`).
- [x] **Task 4.3: Model Refactoring**
    - Update `IdeaCost`, `IdeaProfit`, and `InvestorContribution` to use Enum Casting for `range_id`.
    - Update all summaries and matching logic to use Enum logic instead of DB joins.
- [x] **Task 4.4: Seed/Migration Cleanup**
    - Update database seeders and tests to use Enum values instead of hardcoded IDs.

---

## Technical Summary of Changes
| Feature | Old Way (Slow) | New Way (Fast) |
| :--- | :--- | :--- |
| **Navigation** | Server Method (`$wire.next()`) | Alpine JS (`step++`) synced with Server |
| **Rendering** | `x-show` (All steps in HTML) | `@if` (One step in HTML) |
| **State** | Included translations in JSON | Static Blade/Method data |
| **Queries** | Run on every request | In-memory PHP Enums |
| **Static Data** | Database Table + Joins | PHP Enums (In-Memory) |
| **Validation** | Server-only | Alpine (Instant) + Server (Secure) |
