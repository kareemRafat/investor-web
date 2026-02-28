# Just-in-Time Profile Completion Plan

## Objective
Ensure users who register via Google complete their profile (`job`, `phone`, `residence_country`) seamlessly when they attempt to submit an Idea or Investment Offer, without interrupting their workflow with a separate redirection.

---

## Milestone 1: Foundation & Detection (Done)
*   [x] **Enhance User Model:** Add a helper method `hasCompleteProfile()` to the `User` model that checks if `job`, `phone`, and `residence_country` are non-null.
*   [x] **Identify Data Requirements:** Confirm validation rules for the three missing fields (e.g., phone format, job length).

## Milestone 2: Idea Submission Workflow Integration (Done)
*   [x] **Modify `IdeaForm` State:** Add logic to the `mount` method of `IdeaForm.php` to detect profile completeness.
*   [x] **Insert "Step 0" UI:** Create a new step view (or modify Step 1) specifically for profile completion that only appears if `hasCompleteProfile()` is false.
*   [x] **Atomic Data Persistence:** Ensure that when the user clicks "Next" from the profile step, their `User` record is updated immediately in the database.
*   [x] **Smooth Transition:** Auto-advance to the actual Step 1 of the Idea form once the profile is saved.

## Milestone 3: Investment Offer Workflow Integration (Done)
*   [x] **Modify `InvestmentForm` State:** Similar to the Idea form, check for profile completion in the `mount` or initial step logic.
*   [x] **Shared Component (Optional):** Explore creating a reusable Livewire component or blade partial for the profile form to keep UI consistent between both submission flows. (Done: Created `ProfileCompletion` component)
*   [x] **Data Persistence:** Update the user record upon step completion.

## Milestone 4: UX & Error Handling (Done)
*   [x] **Pre-filling:** Ensure existing data (like name/email) is displayed as read-only to give context. (Done: Component `mount` loads existing user data)
*   [x] **Skip Logic:** Ensure that once a user completes this step once, they never see it again for future submissions. (Done: `hasCompleteProfile` check in `mount`)
*   [x] **Direct Profile Access:** Add a notification or CTA on the main Profile page if these fields are missing, allowing users to complete them even if they aren't submitting an idea. (Done: Warning alert added to Profile page)

## Milestone 5: Verification & Testing
*   [ ] **Manual Test (Google User):** Register a new user via Google and verify the Profile Step appears during Idea submission.
*   [ ] **Manual Test (Normal User):** Verify that users who registered via the standard form (who already provided this data) skip the Profile Step entirely.
*   [ ] **Validation Test:** Ensure form cannot advance if the profile fields are empty or invalid.
