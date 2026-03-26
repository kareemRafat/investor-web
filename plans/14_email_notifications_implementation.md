# Email Notifications Implementation Plan

This document outlines the milestones and tasks for implementing the five key email notifications using Laravel Notifications and Blade templates.

## Milestone 1: Base Notifications & Templates
*Goal: Create all notification classes and their corresponding localized Blade templates.*

- [x] **Task 1.1: Create Welcome Notification**
    - Create `App\Notifications\WelcomeNotification`.
    - Create `resources/views/emails/welcome.blade.php`.
    - Add translations for `notifications.welcome_title`, `notifications.welcome_body`.
- [x] **Task 1.2: Create Submission Confirmation Notification**
    - Create `App\Notifications\SubmissionConfirmationNotification`.
    - Create `resources/views/emails/submission-confirmation.blade.php`.
    - Add translations for `notifications.submission_received_title`.
- [x] **Task 1.3: Create Contact Unlocked Notification**
    - Create `App\Notifications\ContactUnlockedNotification`.
    - Create `resources/views/emails/contact-unlocked.blade.php`.
    - Add translations for `notifications.contact_unlocked_title`.
- [x] **Task 1.4: Create Subscription Expiry Reminder Notification**
    - Create `App\Notifications\SubscriptionExpiryReminderNotification`.
    - Create `resources/views/emails/subscription-expiry-reminder.blade.php`.
    - Add translations for `notifications.expiry_reminder_title`.
- [x] **Task 1.5: Create Idea Status Changed Notification**
    - Create `App\Notifications\IdeaStatusChangedNotification`.
    - Create `resources/views/emails/idea-status-changed.blade.php`.
    - Add translations for `notifications.status_updated_title`.

## Milestone 2: Trigger Logic Integration
*Goal: Hook the notifications into the application flow.*

- [x] **Task 2.1: Implement Welcome Email on Verification**
    - Register a listener for `Illuminate\Auth\Events\Verified` in `AppServiceProvider`.
    - Send `WelcomeNotification` to the user.
- [x] **Task 2.2: Implement Submission Confirmation**
    - Update `App\Livewire\Pages\Idea\IdeaForm` to notify the user after successful save.
    - Update `App\Livewire\Pages\Investment\InvestmentForm` to notify the user after successful save.
- [x] **Task 2.3: Implement Unlock Notification**
    - Update `App\Services\UnlockService::unlock()` to notify the **owner** of the idea/investor profile when their contact is unlocked.
- [x] **Task 2.4: Implement Idea Status Changed Notification**
    - Update `App\Filament\Actions\IdeaAction\ChangeIdeaStatusAction` to notify the idea owner when the status is updated by an admin.

## Milestone 3: Automation & Scheduling
*Goal: Set up the automated 3-day expiry reminder.*

- [x] **Task 3.1: Create Expiry Reminder Command**
    - Create `App\Console\Commands\SendSubscriptionExpiryReminders`.
    - Implement logic to find active subscriptions ending in exactly 3 days.
- [x] **Task 3.2: Schedule the Command**
    - Add the command to `routes/console.php` to run daily (e.g., `at('09:00')`).

## Milestone 4: Verification & Localization
*Goal: Ensure all emails look good and are sent in the correct language.*

- [ ] **Task 4.1: Multi-language Support**
    - Verify that all notification subjects and bodies use `__()` helpers.
    - Test templates in both Arabic (RTL) and English.
- [ ] **Task 4.2: End-to-End Testing**
    - Manually trigger each notification (Register/Verify, Submit Idea, Unlock Contact, Admin Review).
    - Run the expiry reminder command manually to verify logic.
