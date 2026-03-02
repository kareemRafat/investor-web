# Refactoring Plan: Multi-Step Form Performance Optimization

This plan refactors the `InvestmentForm` and `IdeaForm` into a consolidated, single-component architecture to eliminate network lag and provide a snappy user experience.

## Milestone 1: InvestmentForm Consolidation (7 Steps)
*Goal: Move all 7 investment steps into a single Livewire component with deferred database writes.*

- [ ] **1.1 Structure & Organization**
    - [ ] Initialize a `$state` array property in `InvestmentForm.php` to hold all data.
    - [ ] Create folder: `app/Livewire/Pages/Investment/Traits/`.
    - [ ] Create Traits: `Step1.php` through `Step7.php` inside the new folder.
    - [ ] Create folder: `resources/views/livewire/pages/investment/steps/`.
- [ ] **1.2 Logic & View Migration**
    - [ ] Move validation and logic into the short-named Traits (`Step1`, etc.) **without changing any existing validation rules or translation strings**.
    - [ ] Move HTML into short-named Blade files (`step1.blade.php`, `step2.blade.php`, etc.) inside the `steps/` folder, ensuring all translations and **Alpine.js logic** remain identical.
    - [ ] Update `InvestmentForm.php` to use these traits and `@include` the views.
- [ ] **1.3 UX & Loading States**
    - [ ] Implement `wire:loading` on the "Next" button with a polished spinner.
    - [ ] Use `wire:loading.class="opacity-50"` on the form container during transitions.
    - [ ] Use Alpine.js `x-show` to handle the transition between steps instantly while the server validates in the background.
- [ ] **1.4 Persistence & Final Save**
    - [ ] Implement a final `save()` method that writes the `$state` array to the database in one transaction.

## Milestone 2: IdeaForm Consolidation (10 Steps)
*Goal: Apply the same high-performance pattern to the 10-step Idea form.*

- [ ] **2.1 Structure & Organization**
    - [ ] Initialize a `$state` array property in `IdeaForm.php`.
    - [ ] Create folder: `app/Livewire/Pages/Idea/Traits/`.
    - [ ] Create Traits: `Step1.php` through `Step10.php` inside the new folder.
    - [ ] Create folder: `resources/views/livewire/pages/idea/steps/`.
- [ ] **2.2 Logic & View Migration**
    - [ ] Migrate logic to Traits (`Step1` to `Step10`) **maintaining identical validation rules and translation keys as the original components**.
    - [ ] Migrate HTML to Blade files (`step1.blade.php` to `step10.blade.php`) in the `steps/` subfolder, ensuring all translations and **Alpine.js logic** remain unchanged.
- [ ] **2.3 UX & Feedback**
    - [ ] Ensure "Next" button shows a loading state immediately on click.
    - [ ] Add a progress bar that updates instantly via Alpine.js when the user clicks "Next," even before the server request finishes.
- [ ] **2.4 Mass Data Handling**
    - [ ] Map the `$state` array to multiple models (Idea, Costs, Profits, Countries) in the final `finish()` method.

## Milestone 3: Validation & Cleanup
- [ ] **3.1 Performance Check**
    - [ ] Confirm that each step transition now requires exactly **one** server request.
    - [ ] Verify the "Next" button is disabled during processing to prevent double-clicks.
- [ ] **3.2 Functional Testing**
    - [ ] Test validation error handling (ensure errors show up instantly under the correct fields).
    - [ ] Verify that navigating "Back" does not lose any input data.
- [ ] **3.3 Cleanup**
    - [ ] Delete the old `Steps/` directories in both the `app/` and `resources/` folders.
