# Implementation Plan: Admin Social Media Settings

This plan outlines the technical steps to create a dynamic settings page in the Filament Admin dashboard to manage social media accounts and other global configurations.

---

## Milestone 1: Database & Model Foundation
*Goal: Establish the storage layer for global settings.*

- [ ] **Task 1.1: Create Migration**
    - Generate migration for `settings` table.
    - Fields: `key` (unique string), `value` (text), `type` (string), `group` (string).
- [ ] **Task 1.2: Create Setting Model**
    - Define fillable properties.
    - (Optional) Add a static method `getValue($key)` for quick access.
- [ ] **Task 1.3: Initial Data Seeding**
    - Create a seeder to populate default keys: `facebook_url`, `twitter_url`, `instagram_url`, `linkedin_url`, `whatsapp_number`.

## Milestone 2: Global Access Logic
*Goal: Make settings easily accessible across the entire application.*

- [ ] **Task 2.1: Implement Helper Function**
    - Create or update `app/Helpers/helpers.php` (or use a ServiceProvider).
    - Implement `settings($key, $default = null)` function.
- [ ] **Task 2.2: Optimization (Caching)**
    - Implement basic Laravel caching for the settings to prevent redundant DB queries on every page load.

## Milestone 3: Admin Dashboard Integration (Filament)
*Goal: Provide a user-friendly interface for admins to manage social links.*

- [ ] **Task 3.1: Scaffold Filament Page**
    - Run `php artisan make:filament-page ManageSettings`.
- [ ] **Task 3.2: Design Settings Form**
    - Use Filament `Section` and `Grid` layouts.
    - Add `TextInput` fields with URL validation for social platforms.
    - Add a `TextInput` for WhatsApp number.
- [ ] **Task 3.3: Data Binding**
    - Implement `fill()` logic in `mount()` to load settings into the form.
    - Implement `save()` logic to loop through form data and update the `settings` table.

## Milestone 4: Frontend Integration
*Goal: Replace hardcoded links with dynamic data.*

- [ ] **Task 4.1: Update Contact Page**
    - Modify `resources/views/livewire/pages/contact.blade.php`.
    - Use `@if(settings('key'))` to only show icons for configured accounts.
- [ ] **Task 4.2: Update Footer**
    - Ensure footer social icons (if any) are also linked to the dynamic settings.
- [ ] **Task 4.3: Final Validation**
    - Test saving values in Admin and verifying changes immediately on the frontend.
