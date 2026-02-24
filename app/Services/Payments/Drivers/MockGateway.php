<?php

namespace App\Services\Payments\Drivers;

use App\Contracts\PaymentGatewayInterface;
use Illuminate\Support\Str;

class MockGateway implements PaymentGatewayInterface
{
    /**
     * {@inheritDoc}
     */
    public function createOrder(float $amount, string $currency = 'USD', array $metadata = []): string
    {
        // Simulate an order ID from a provider
        return 'MOCK-ORDER-'.Str::random(10);
    }

    /**
     * {@inheritDoc}
     */
    public function capturePayment(string $orderId): array
    {
        // Simulate a successful payment capture
        return [
            'status' => 'COMPLETED',
            'transaction_id' => 'MOCK-TRANS-'.Str::random(10),
            'amount' => 0.0, // Amount should be retrieved from order storage in production
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentStatus(string $orderId): string
    {
        return 'COMPLETED';
    }
}
