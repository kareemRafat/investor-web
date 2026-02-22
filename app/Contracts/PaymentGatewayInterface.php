<?php

namespace App\Contracts;

interface PaymentGatewayInterface
{
    /**
     * Create a new order or payment session.
     *
     * @param float $amount
     * @param string $currency
     * @param array $metadata
     * @return string The external order/transaction ID.
     */
    public function createOrder(float $amount, string $currency = 'USD', array $metadata = []): string;

    /**
     * Capture a payment that has been authorized/approved.
     *
     * @param string $orderId
     * @return array Response with status and transaction ID.
     */
    public function capturePayment(string $orderId): array;

    /**
     * Get the status of a payment.
     *
     * @param string $orderId
     * @return string
     */
    public function getPaymentStatus(string $orderId): string;
}
