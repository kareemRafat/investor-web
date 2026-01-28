# Roadmap: Pricing, Payments & Subscription Lifecycle

This document outlines the next steps to fully realize the "User Plan Selection & Upgrade Flow" by implementing the remaining UI interactions, mock payment processes, and subscription expiration logic.

## Phase 5: Pricing & Subscription UI
- [ ] **Pricing Page:**
    - Create a dedicated `/pricing` page (or section in profile) showing Free, Monthly ($X), and Yearly ($Y) plans.
    - Implement a "Choose Plan" action that triggers the mock payment flow.
- [ ] **Pay-Per-Use Modal:**
    - Enhance the `UnlockContact` component to offer a "Pay $9 to Unlock Once" option if the user has 0 credits.
    - Create a simple modal to simulate the $9 credit card transaction.
- [ ] **Mock Payment Service:**
    - Add a `PaymentService` to handle "Mock" transactions (always returns success after a delay).
    - Link `PaymentService` to `SubscriptionService` and `UnlockService`.

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
*Status: Planned (Next for Execution)*
