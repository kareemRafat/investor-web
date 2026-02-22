# Multi-Gateway Payment Integration Plan (PayPal & Future-Proofing)

This document outlines the strategy for integrating PayPal while building a reusable, polymorphic architecture that can easily accommodate future gateways like Stripe.

## 1. Architectural Strategy: The Provider Pattern
To ensure reusability and easy expansion, we will implement a **Driver-based Payment System** (similar to Laravel's Filesystem or Mail drivers).

### Key Components:
-   **`PaymentGatewayInterface`**: A common interface defining methods like `createOrder()`, `capturePayment()`, `refund()`, and `handleWebhook()`.
-   **`PaymentManager`**: A central class that resolves the active gateway (PayPal, Stripe, or Mock) based on the `.env` configuration.
-   **Concrete Drivers**:
    -   `PayPalGateway`: Handles all PayPal-specific API logic.
    -   `StripeGateway`: (Future) To be added later without changing business logic.
    -   `MockGateway`: For local testing.
-   **Service Decoupling**: `SubscriptionService` and `UnlockService` will interact ONLY with the `PaymentGatewayInterface`, making them completely agnostic of which gateway is being used.

## 2. Prerequisites (Information Needed from User)
-   **PayPal Sandbox Credentials:** `Client ID` and `Client Secret`.
-   **Active Gateway Choice:** Which gateway should be the default for now? (PayPal).
-   **Currency:** Primary currency for all transactions (e.g., USD).
-   **Price Confirmation:** Confirm the amounts for Monthly (99), Yearly (999), and One-time Unlocks (9).

## 3. Technical Implementation Details

### Backend Changes:
1.  **Interface Definition**: Create `App\Contracts\PaymentGatewayInterface`.
2.  **Service Refactoring**:
    -   Rename `PaymentService` to `PayPalGateway` (implementing the interface).
    -   Create `PaymentManager` to handle driver switching.
3.  **Database Migration**:
    -   Add `payment_gateway` (string: 'paypal', 'stripe', etc.) to `subscriptions` and `contact_unlocks`.
    -   Add `external_id` (string: the gateway's transaction/order ID).
    -   Add `payment_status` (string: 'pending', 'completed', 'failed').
4.  **Configuration**: Create `config/payments.php` to manage credentials and the "default" driver.

### Frontend Changes:
1.  **Dynamic Payment Components**:
    -   The `Payment.php` Livewire component will dynamically load the correct frontend view/script based on the active gateway.
    -   For PayPal, it will load the PayPal SDK. For Stripe (later), it would load Stripe Elements.

## 4. Implementation Steps
1.  **Foundation**: Create the Interface and the `PaymentManager`.
2.  **Environment**: Update `.env` with `PAYMENT_DRIVER=paypal` and PayPal credentials.
3.  **PayPal Driver**: Implement the `PayPalGateway` logic using the PayPal SDK.
4.  **Service Update**: Update `SubscriptionService` to use the `PaymentManager` to process payments.
5.  **UI Integration**: Add the PayPal Smart Buttons to the checkout page.
6.  **Validation**: Test the "switching" capability by ensuring the Mock driver still works alongside the PayPal driver.

## 5. Future-Proofing for Stripe
When you are ready to add Stripe:
1.  Create `StripeGateway` implementing the same interface.
2.  Add Stripe keys to `.env`.
3.  Switch `PAYMENT_DRIVER=stripe` or allow the user to choose at checkout.
4.  **No changes will be required** in `SubscriptionService` or `UnlockService`.
