# Implementation Roadmap: Paid Contact & Subscription System

This document outlines the technical steps to implement the paid contact and subscription logic in the Investor Web platform.

## Phase 1: Models & Enums (The Foundation)
- [x] **Create Enums:**
    - `PlanType`: `free`, `monthly`, `yearly`.
    - `SubscriptionStatus`: `active`, `expired`, `cancelled`.
    - `UnlockMethod`: `credit`, `pay_per_use`.
    - `ContactVisibility`: `open`, `closed`.
- [x] **Create Models:**
    - `Subscription`: Relationships to `User`, fillable fields (`plan_type`, `starts_at`, `ends_at`, `status`).
    - `ContactUnlock`: Polymorphic relationship (`unlockable`), relationship to `User`.
- [x] **Update Existing Models:**
    - `User`: Add `subscriptions()` and `contactUnlocks()` relations. Add helpers like `isPremium()`, `hasCredits()`.
    - `Idea` & `Investor`: Add `contactUnlocks()` morphMany relation and `ContactVisibility` cast.

## Phase 2: Core Logic (Service Layer)
- [x] **SubscriptionService:**
    - `subscribe(User $user, $plan)`: Handle mock subscription creation.
    - `resetCredits(User $user)`: Reset credits to 10 for active subscribers.
- [x] **UnlockService:**
    - `canViewContact(User $user, $model)`: Logic to check if already unlocked or if visibility is open.
    - `unlock(User $user, $model, $method)`: Deduct credits or simulate payment and record the unlock.

## Phase 3: UI Integration (Livewire & Views)
- [ ] **Contact Visibility Guard:**
    - Update Idea and Investor detail views to mask name/email/phone if not unlocked.
- [ ] **Unlock Component:**
    - Create a Livewire component for the "View Contact" button.
    - Implement the "Upgrade/Payment" Modal (Mock).
- [ ] **User Dashboard:**
    - Show current plan, remaining credits, and next reset date.

## Phase 4: Admin & Automation (Filament & Cron)
- [ ] **Filament Resources:**
    - Update `IdeaResource` and `InvestorResource` to show `contact_visibility` and `unlock_count`.
    - Add Admin action to manually reset user credits.
- [ ] **Automation:**
    - Create `ResetMonthlyCredits` command.
    - Schedule the command in `routes/console.php`.

---
*Status: Initialized*
