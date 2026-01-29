# Roadmap: Pricing, Payments & Subscription Lifecycle

This document outlines the next steps to fully realize the "User Plan Selection & Upgrade Flow" by implementing the remaining UI interactions, mock payment processes, and subscription expiration logic.

## Phase 5: Pricing & Subscription UI
- [x] **Pricing Page:**
    - Create a dedicated `/pricing` page (or section in profile) showing Free, Monthly ($X), and Yearly ($Y) plans.
    - Implement a "Choose Plan" action that triggers the mock payment flow.
- [x] **Multi-Step Unlock UI (Enhance `UnlockContact` Component):**
    - Refactor the component to support a step-based interface within the same modal:
        - **Step 1: Selection** -> Show credit balance. Offer "Use 1 Credit", "Upgrade Plan", or "Pay $9 for One-time Access".
        - **Step 2: Payment** -> If "Pay $9" is selected, show a mock Credit Card form.
        - **Step 3: Reveal** -> On success (credit or payment), reveal the contact info without page reload.
- [x] **Mock Payment Service:**
    - Add a `PaymentService` to handle "Mock" transactions (always returns success after a 1-2 second delay).
    - Link `PaymentService` to `SubscriptionService` (for plans) and `UnlockService` (for one-time $9 payments).

## Phase 6: Subscription Lifecycle & Expiration
- [ ] **Expiration Command:**
    - Create `CheckExpiredSubscriptions` artisan command.
    - Logic: Find active subscriptions where `ends_at <= now()`.
    - Action: Set status to `expired`, revert user `plan_type` to `free`, and set `contact_credits` to `0`.
- [ ] **Lifecycle Scheduling:**
    - Schedule the expiration check to run hourly in `routes/console.php`.
- [ ] **Proactive Notifications:**
    - (Optional) Dispatch a Laravel Notification to the user when their plan expires or when credits are reset.

## Phase 7: UX & Visibility Enhancements
- [ ] **List View Badges:**
    - Add 🔓 (Open) or 🔒 (Closed) badges to Idea and Investor cards in the Index pages so users know the status before clicking.
- [ ] **Credit Balance Widget:**
    - Add a small credit counter in the main navigation header (visible only to logged-in users).
- [ ] **Auto-Unlock for Owners/Admins:**
    - Ensure the "Unlock" button is completely replaced by the contact card automatically if the `UnlockService` returns true (Owner/Admin check).

## Phase 8: Refinement & Testing
- [ ] **Edge Case Testing:**
    - Test behavior when a user's subscription expires exactly while they are browsing.
    - Test behavior when a user tries to unlock with exactly 1 credit vs 0 credits.
- [ ] **Translation Audit:**
    - Ensure all new pricing and payment labels are added to `lang/ar/pages.php` and `lang/en/pages.php`.

---

*Status: Phase 5 Complete. Phase 6 Next.*
