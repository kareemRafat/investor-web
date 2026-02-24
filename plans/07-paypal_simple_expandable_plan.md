# PayPal Integration — Simple & Expandable Plan (Phase 1)

## 📌 Progress
- [x] **Step 1:** Install PayPal Package
- [x] **Step 2:** Create PayPalGateway Driver
- [x] **Step 3:** Transactions Table (Minimal)
- [x] **Step 4:** Livewire Component & Backend Flow (Partially: Frontend Navigation Added)
- [x] **Step 5:** Minimal Webhook Listener
- [ ] **Step 6:** Validation
- [ ] **Step 7:** Post-Payment UX & Redirects

---

## 🎯 Goal

Launch PayPal payments quickly while keeping the system ready for future expansion into a multi-gateway architecture.

---

## ✅ Architecture Principles

-   Keep implementation **simple**
-   Avoid premature abstraction
-   Ensure future refactor is easy
-   **Leverage Existing PaymentManager:** Integrate PayPal as a driver within the existing polymorphic payment architecture.
-   No controller talks directly to PayPal SDK

---

## 📁 File Structure

```
app/
└── Services/
    └── Payments/
        └── Drivers/
            └── PayPalGateway.php
```

---

## ⚙️ Step 1 — Install PayPal Package [Completed]

- [x] Run `composer require srmklive/paypal`
- [x] Publish config: `php artisan vendor:publish --provider="Srmklive\PayPal\Providers\PayPalServiceProvider"`
- [x] Update `.env` and `.env.example` with PayPal credentials.

---

## 🧠 Step 2 — Create PayPalGateway Driver [Completed]

Responsibilities (implementing `PaymentGatewayInterface`):
- [x] createOrder()
- [x] capturePayment()
- [x] verifyAmount() (internal to driver, or part of capture)
- [x] handle errors + logging

Example usage: `app(\App\Services\Payments\PaymentManager::class)->driver('paypal')->createOrder($amount, $currency);`

---

## 🗄️ Step 3 — Transactions Table (Minimal) [Completed]

Create table:

`transactions`
- [x] `id`
- [x] `user_id` (foreign key to users table)
- [x] `payable_id` (polymorphic)
- [x] `payable_type` (polymorphic)
- [x] `gateway` (paypal)
- [x] `gateway_order_id` (from createOrder)
- [x] `gateway_transaction_id` (from capturePayment)
- [x] `amount`
- [x] `currency`
- [x] `status` (pending, processing, completed, failed, refunded)
- [x] `error_message` (for failed transactions)
- [x] `payload` (json, for full response/request data)
- [x] `processed_at` (nullable timestamp)
- [x] `created_at`
- [x] `updated_at`

---

## 🧩 Step 4 — Livewire Component & Backend Flow [Pending]

1.  User selects plan (Frontend Updated to use `wire:navigate`)
2.  Livewire component initiates backend to create PayPal order via `PaymentManager`'s `paypal` driver.
3.  Frontend opens PayPal Smart Button pop-up (orchestrated by Livewire).
4.  PayPal returns order ID to frontend.
5.  Livewire component sends order ID to backend for capture.
6.  Backend captures payment via `PaymentManager`'s `paypal` driver.
7.  Save transaction to `transactions` table.
8.  Activate subscription/unlock.

---

## 👂 Step 5 — Minimal Webhook Listener [Completed]

-   [x] Define a `POST /webhooks/paypal` route.
-   [x] Create a handler (`PayPalWebhookController`) to listen for `PAYMENT.CAPTURE.COMPLETED` events.
-   [x] Verify webhook signature for security.
-   [x] Update `transactions` table based on webhook data.
-   [x] Exclude route from CSRF protection in `bootstrap/app.php`.

---

## 🔐 Step 6 — Validation [Pending]

Always validate on backend:
- [ ] Amount matches plan price
- [ ] Currency correct
- [ ] Order not already captured
- [ ] User authentication and authorization

---

## 🏁 Step 7 — Post-Payment UX & Redirects [New]

Define the user journey after the payment interaction:
- [ ] **Success:** 
    - [ ] Redirect to a dedicated `/payment/success` page OR show a high-quality success state on the current page.
    - [ ] Trigger a "Thank You" notification/email.
    - [ ] Immediately reflect the new status (e.g., Credits updated, Premium badge visible).
- [ ] **Cancel:** 
    - [ ] Close the popup and stay on the payment page.
    - [ ] Show a non-intrusive "Payment cancelled" message.
    - [ ] Allow the user to try again or choose a different method.
- [ ] **Error:** 
    - [ ] Show a clear error message (e.g., "Insufficient funds" or "Gateway error").
    - [ ] Log the error for support.
    - [ ] Keep the transaction record as `failed` with the error message.

---

## 🚀 Result

✅ Working payments fast
✅ Clean code, integrated with existing architecture
✅ Basic reliability for payments
✅ Easy future refactor
✅ Clear user feedback and post-purchase flow

---

## ❌ What We Still Skip Now (for simplicity)

-   Complex multi-gateway abstraction (beyond current `PaymentManager`)
-   Advanced webhook event handling (e.g., refunds, disputes)
-   Complex UI components (beyond what's necessary for basic flow)
