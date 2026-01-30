# Payment Page Implementation Plan

## Objective
Implement a payment page where users can pay for a selected subscription plan (Monthly or Yearly). This page will simulate a payment process and update the user's subscription status upon success.

## 1. Components & Views

### 1.1 Create `App\Livewire\Pages\Payment`
- **Properties**:
  - `plan`: string (accepted from route, e.g., 'monthly', 'yearly')
  - `cardNumber`: string
  - `expiryDate`: string
  - `cvv`: string
  - `nameOnCard`: string
- **Methods**:
  - `mount($plan)`: Validate the plan type. Redirect if invalid or if the user is already on that plan.
  - `processPayment(PaymentService $paymentService, SubscriptionService $subscriptionService)`:
    - Validate input fields.
    - Call `PaymentService::process()`.
    - If successful:
      - Call `$subscriptionService->subscribe()`.
      - Flash success message.
      - Redirect to profile or dashboard.
    - If failed:
      - Add error to the component.
- **View**: `resources/views/livewire/pages/payment.blade.php`
  - Display selected plan details (Name, Price).
  - Credit card form (mock fields).
  - "Pay Now" button with loading state.
  - "Cancel" button returning to pricing page.

### 1.2 Update `App\Livewire\Pages\Pricing`
- Modify `selectPlan($plan)` method.
- If `$plan` is 'free', keep existing logic (direct downgrade/switch).
- If `$plan` is 'monthly' or 'yearly', redirect to `route('payment.page', ['plan' => $plan])`.

## 2. Routes

- Add a new route in `routes/web.php` under the `auth` middleware group:
  ```php
  Route::get('/payment/{plan}', \App\Livewire\Pages\Payment::class)->name('payment.page');
  ```

## 3. Services

- **PaymentService**:
  - Ensure `process(float $amount)` exists and simulates a transaction (already exists as mock).
- **SubscriptionService**:
  - Ensure `subscribe(User $user, PlanType $plan)` handles the subscription creation/update (already used in `Pricing`).

## 4. Translations

- Update `lang/en/pages.php` (and `ar`) to include payment-related strings:
  - `pages.payment.title`: "Complete Your Subscription"
  - `pages.payment.plan_details`: "Plan Details"
  - `pages.payment.card_info`: "Credit Card Information"
  - `pages.payment.pay_button`: "Pay :amount"
  - `pages.payment.success`: "Payment successful! You are now subscribed to the :plan plan."
  - `pages.payment.error`: "Payment failed. Please try again."

## 5. Execution Steps

1.  **Create Translations**: Add necessary keys to language files.
2.  **Create Component**: Run `php artisan make:livewire Pages/Payment`.
3.  **Implement View**: Build the UI for `payment.blade.php` using my css and bootstrap5.
4.  **Implement Logic**: Write the `mount` and `processPayment` methods in `Payment.php`.
5.  **Register Route**: Add the route to `web.php`.
6.  **Link Pricing Page**: Update `Pricing.php` to redirect to the new route.
7.  **Verify**: Test the flow from Pricing -> Payment -> Success -> Profile.
