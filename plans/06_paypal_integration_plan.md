# PayPal & Multi-Gateway Integration Plan

## 🟢 Current Status: Foundation Complete
The project now has a polymorphic payment architecture. We can switch between gateways (Mock, PayPal, Stripe) by changing a single line in the `.env` file.

### ✅ What's Done:
1.  **Interface Created:** `app/Contracts/PaymentGatewayInterface.php` (The "Contract").
2.  **Payment Manager:** `app/Services/Payments/PaymentManager.php` (The "Brain").
3.  **Mock Driver:** `app/Services/Payments/Drivers/MockGateway.php` (For testing).
4.  **Service Refactoring:** `SubscriptionService` and `UnlockService` now use the new system.
5.  **Configuration:** `config/payments.php` is ready for credentials.
6.  **Binding:** Services are automatically injected via `AppServiceProvider`.

---

## 🛠️ Next Session: PayPal Implementation
When we restart, we will focus on the actual PayPal integration.

### 1. Backend: The PayPal Driver
- [ ] **Install Package:** `composer require srmklive/paypal`.
- [ ] **Publish Config:** `php artisan vendor:publish --provider="Srmklive\PayPal\Providers\PayPalServiceProvider"`.
- [ ] **Create Driver:** Implement `app/Services/Payments/Drivers/PayPalGateway.php`.
- [ ] **Logic:**
    - `createOrder()`: Use `setApiAppContext()` and `createOrder()` to get an `id`.
    - `capturePayment()`: Use `captureOrder()` to verify and finalize the transaction.
    - **Error Handling:** Implement robust error handling for API calls, logging detailed responses.

### 2. Frontend: Component-Based UI Strategy
We will break down the payment interface into reusable **Blade Components** for better organization and scalability. The payment page will display plan details and a suitable payment form.

- [ ] **`x-payments.paypal-buttons`**: A dedicated component to load the PayPal SDK and render the smart buttons. When clicked, these typically open an in-context pop-up for authorization without leaving the site.
- [ ] **`x-payments.card-form`**: A polished, reusable credit card form used for both **Mock** and **Stripe** drivers.
- [ ] **`x-payments.loading-overlay`**: A global, professional "Processing Payment..." spinner for all methods.
- [ ] **Dynamic Container:** The main `Payment.php` Livewire page will act as the orchestrator, switching between these components based on the active driver.
- [ ] **Success/Failure UX:** Implement clear UI feedback and redirection for successful payments, cancelled payments, and payment failures.

### 3. Database & Tracking
- [ ] **Dedicated Transactions Table:** Create a new `transactions` table to store all payment attempts, their statuses, and relevant metadata (e.g., `gateway_transaction_id`, `amount`, `currency`, `status`, full API response payload). This provides an audit trail independent of `subscriptions` or `contact_unlocks`.
- [ ] **Migration for related models:** Add `transaction_id` and `payment_gateway` columns to `subscriptions` and `contact_unlocks` tables, linking them to the `transactions` table.

### 4. Webhooks (Asynchronous Payment Notifications)
- [ ] **Webhook Route:** Define a dedicated `POST /webhooks/paypal` route to receive asynchronous payment notifications from PayPal (e.g., `PAYMENT.CAPTURE.COMPLETED`).
- [ ] **Webhook Handler:** Implement a handler to process these notifications, update the `transactions` table, and trigger corresponding subscription or unlock updates.
- [ ] **Webhook Security:** Implement signature verification for incoming webhooks to ensure authenticity.

### 5. Security & Validation
- [ ] **Amount Validation:** Before capturing payment, verify that the received amount matches the expected amount for the chosen plan on the backend.

### 6. Environment & Currency Configuration
- [ ] **Environment Variables:** Clearly define and use environment variables for PayPal API credentials (Client ID, Secret) and mode (Sandbox/Live).
- [ ] **Currency Handling:** Ensure the PayPal driver correctly handles the configured currency (e.g., USD or SAR) and that frontend displays match.

---

## 📋 What You Need to Provide Next Time:
1.  **PayPal Sandbox Credentials:** `Client ID` and `Secret` added to your `.env`.
2.  **Confirmation on UI:** Confirm if we are using the **PayPal Smart Buttons** (Recommended).
3.  **Final Currency:** Confirm if we are using **USD** or another currency.

---
*Last Updated: February 24, 2026*
