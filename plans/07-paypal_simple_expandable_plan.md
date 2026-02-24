# PayPal Integration --- Simple & Expandable Plan (Phase 1)

## 🎯 Goal

Launch PayPal payments quickly while keeping the system ready for future
expansion into a multi‑gateway architecture.

------------------------------------------------------------------------

## ✅ Architecture Principles

-   Keep implementation **simple**
-   Avoid premature abstraction
-   Ensure future refactor is easy
-   **Leverage Existing PaymentManager:** Integrate PayPal as a driver within the existing polymorphic payment architecture.
-   No controller talks directly to PayPal SDK

------------------------------------------------------------------------

## 📁 File Structure

app/ └── Services/ └── Payments/ └── Drivers/ └── PayPalGateway.php

------------------------------------------------------------------------

## ⚙️ Step 1 --- Install PayPal Package

composer require srmklive/paypal

Publish config: php artisan vendor:publish
--provider="Srmklive`\PayPal`\Providers`\PayPalServiceProvider`"

------------------------------------------------------------------------

## 🧠 Step 2 --- Create PayPalGateway Driver

Responsibilities (implementing `PaymentGatewayInterface`):
- createOrder()
- capturePayment()
- verifyAmount() (internal to driver, or part of capture)
- handle errors + logging

Example usage: `app(\App\Services\Payments\PaymentManager::class)->driver('paypal')->createOrder($amount, $currency);`

------------------------------------------------------------------------

## 🗄️ Step 3 --- Transactions Table (Minimal)

Create table:

transactions - id
- user_id (foreign key to users table)
- payable_id (polymorphic)
- payable_type (polymorphic)
- gateway (paypal)
- gateway_order_id (from createOrder)
- gateway_transaction_id (from capturePayment)
- amount
- currency
- status (pending, processing, completed, failed, refunded)
- error_message (for failed transactions)
- payload (json, for full response/request data)
- processed_at (nullable timestamp)
- created_at
- updated_at

Purpose: - Audit trail - Debugging - Future refunds & retries

### Recommended Indexes for `transactions` table

-   **`user_id`**: For quickly fetching all transactions for a specific user.
-   **`(payable_type, payable_id)`**: A composite index for efficient polymorphic lookups.
-   **`status`**: For filtering by transaction state (e.g., `completed`, `pending`, `failed`).
-   **`gateway`**: For filtering by payment provider.
-   **`created_at`**: For time-based queries and sorting.
-   **`processed_at`**: For queries related to when transactions reached their final state.
    *(Note: `id` (PK) and `gateway_transaction_id` (unique) are automatically indexed.)*

------------------------------------------------------------------------

## 🧩 Step 4 --- Livewire Component & Backend Flow

1.  User selects plan
2.  Livewire component initiates backend to create PayPal order via `PaymentManager`'s `paypal` driver.
3.  Frontend opens PayPal Smart Button pop-up (orchestrated by Livewire).
4.  PayPal returns order ID to frontend.
5.  Livewire component sends order ID to backend for capture.
6.  Backend captures payment via `PaymentManager`'s `paypal` driver.
7.  Save transaction to `transactions` table.
8.  Activate subscription/unlock.

------------------------------------------------------------------------

## 👂 Step 5 --- Minimal Webhook Listener

-   **Purpose:** Improve reliability by ensuring payment status updates even if client-side redirects fail.
-   **Implementation:**
    -   Define a `POST /webhooks/paypal` route.
    -   Create a handler to listen for `PAYMENT.CAPTURE.COMPLETED` events.
    -   Verify webhook signature for security.
    -   Update `transactions` table and relevant models (subscriptions, unlocks) based on webhook data.

------------------------------------------------------------------------

## 🔐 Step 6 --- Validation

Always validate on backend:
- Amount matches plan price
- Currency correct
- Order not already captured

------------------------------------------------------------------------

## 🚀 Result

✅ Working payments fast
✅ Clean code, integrated with existing architecture
✅ Basic reliability for payments
✅ Easy future refactor

------------------------------------------------------------------------

## ❌ What We Still Skip Now (for simplicity)

-   Complex multi-gateway abstraction (beyond current `PaymentManager`)
-   Advanced webhook event handling (e.g., refunds, disputes)
-   Complex UI components (beyond what's necessary for basic flow)
