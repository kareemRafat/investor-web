<?php

namespace App\Services\Payments;

use App\Contracts\PaymentGatewayInterface;
use App\Services\Payments\Drivers\MockGateway;
use App\Services\Payments\Drivers\PayPalGateway;
use Illuminate\Support\Manager;
use InvalidArgumentException;

class PaymentManager extends Manager implements PaymentGatewayInterface
{
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver(): string
    {
        return $this->config->get('payments.default', 'mock');
    }

    /**
     * Create a new Mock driver instance.
     *
     * @return MockGateway
     */
    protected function createMockDriver(): MockGateway
    {
        return new MockGateway();
    }

    /**
     * Create a new PayPal driver instance.
     *
     * @return PayPalGateway
     */
    protected function createPaypalDriver(): PayPalGateway
    {
        // For now, this will fail until the PayPalGateway class is created
        if (!class_exists(PayPalGateway::class)) {
             throw new InvalidArgumentException("PayPal driver is not yet implemented.");
        }
        return new PayPalGateway();
    }

    /**
     * @inheritDoc
     */
    public function createOrder(float $amount, string $currency = 'USD', array $metadata = []): string
    {
        return $this->driver()->createOrder($amount, $currency, $metadata);
    }

    /**
     * @inheritDoc
     */
    public function capturePayment(string $orderId): array
    {
        return $this->driver()->capturePayment($orderId);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentStatus(string $orderId): string
    {
        return $this->driver()->getPaymentStatus($orderId);
    }
}
