# Plan 11: Hybrid Frontend/Backend Validation Strategy

## Goal
Implement instant, zero-latency frontend validation using Alpine.js to intercept navigation before server-side Livewire validation. This ensures a "snappy" UI while keeping the backend as the single source of truth for security and data integrity.

---

## 🏗️ Architectural Approach

1.  **Alpine.js Interception**:
    *   Replace `wire:click="handleNextAction"` with a JavaScript call: `@click.prevent="validate() ? $wire.handleNextAction() : null"`.
    *   Manage a local `errors` object in Alpine's `x-data`.
    
2.  **Rule Mapping**:
    *   Translate PHP `validate()` rules into Alpine.js logic (e.g., `required` becomes `!state.field`, `min:1` becomes `state.field < 1`).
    *   Pass translated error messages from PHP to Alpine once on mount to avoid hardcoding strings in JavaScript.

3.  **User Experience (UX)**:
    *   Instant red-border/shake feedback when clicking "Next" with invalid data.
    *   Real-time clearing of frontend errors as the user types (using Alpine `$watch`).

---

## 🚩 Milestones

### Milestone 1: Core Infrastructure
*   [x] **Validation Bridge**: Create a method to export Step-specific validation messages to the frontend.
*   [x] **Alpine Component**: Define the `validate()` logic in the main `x-data` of `IdeaForm` and `InvestmentForm`.
*   [x] **Global Error Handler**: Ensure frontend and backend errors share the same UI space to avoid visual confusion.

### Milestone 2: Investment Form Implementation (Steps 1-7)
*   [x] **Step 1-2**: Validate Field selection and Country count (1-3).
*   [x] **Step 3 (Resources)**: Map `required_if` logic (e.g., if Company is 'yes', Space Type is required).
*   [x] **Step 4-5**: Validate contribution amounts and percentage totals.
*   [x] **Step 6**: Validate profile fields (Job, Phone, etc.) and Title/Summary length.

### Milestone 3: Idea Form Implementation (Steps 1-10)
*   [x] **Step 1-4**: Basic selection and Range selection checks.
*   [x] **Step 5 (Resource Logic)**: Implement the complex "Toggle + Subfield" logic in Alpine.
*   [x] **Step 6 (Capital Distribution)**: Instant 100% total check with visual warning.
*   [x] **Step 7-8**: Financial contribution and return percentage checks.
*   [x] **Step 9**: Title, Summary, and Profile field validation.

### Milestone 4: Refinement & Edge Cases
*   [x] **Mobile UX**: Ensure instant validation works smoothly with the "Expanded" mobile views.
*   [x] **Sync Check**: Verify that every frontend rule has a corresponding backend rule (and vice-versa).
*   [x] **Load State Cleanup**: Ensure `wire:loading` only triggers if the frontend validation passes.

---

## 🧪 Validation Strategy
*   **Unit Tests**: Update existing `Livewire::test()` cases to ensure backend validation still acts as a fail-safe.
*   **Manual QA**: Walk through each form step, intentionally skipping fields to confirm the frontend blocks the request before any "loading" state appears.
