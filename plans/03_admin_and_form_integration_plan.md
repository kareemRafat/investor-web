# Plan 03: Admin & Form Integration

This plan focuses on integrating the subscription and contact visibility logic into the Filament Admin panel and the user-facing Idea/Investor creation forms.

## 1. Filament Admin Enhancements
Target: `app/Filament/Resources/IdeaResource.php` and `app/Filament/Resources/InvestorResource.php`

- [x] **Contact Visibility Badges:**
    - Add a `TextColumn` or `BadgeColumn` for `contact_visibility`.
    - Use colors: `success` for Open, `danger` for Closed.
- [x] **Unlock Statistics:**
    - Add a column to display the count of `contactUnlocks`.
- [x] **Admin Actions:**
    - Add a header or row action to manually toggle `contact_visibility`.
    - Add a row action in `UserResource` to manually reset a user's `contact_credits`.

## 2. User-Facing Form Integration
Target: `app/Livewire/Pages/Idea/IdeaForm.php` and `app/Livewire/Pages/Investment/InvestmentForm.php`

- [ ] **Add Visibility Field:**
    - Include a Radio or Select field for `contact_visibility` (Open vs. Closed).
- [ ] **Authorization Logic:**
    - Ensure the "Open" option is only selectable if:
        - The user has a paid plan (`monthly` or `yearly`).
        - OR (Optional) Deduct a credit upon choosing "Open" if that's the desired policy.
    - Default the value to `closed` for free users.
- [ ] **Validation:**
    - Add server-side validation to prevent spoofing the `contact_visibility` field.

## 3. UI/UX Visibility (Index Pages)
Target: `resources/views/livewire/pages/idea/index.blade.php` and `resources/views/livewire/pages/investment/index.blade.php`

- [ ] **Index Badges:**
    - Add 🔓 (Open) or 🔒 (Closed) icons/labels to the cards in the list view so users know the status before clicking.

## 4. User Dashboard/Profile
Target: `app/Livewire/Pages/Profile/Profile.php` (and its view)

- [ ] **Plan Info Widget:**
    - Display the user's current `plan_type`.
    - Show `contact_credits` balance.
    - Show `credits_reset_at` date.

## Success Criteria
- Admins can see and manage visibility from the dashboard.
- Users can choose visibility when creating/editing, subject to their plan.
- The list view clearly indicates which contacts are open/closed.
- Users can track their credits from their profile.
