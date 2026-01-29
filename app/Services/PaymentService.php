<?php

namespace App\Services;

class PaymentService
{
    /**
     * Mock a payment transaction.
     * Always returns success after a simulated delay.
     */
    public function process(float $amount): bool
    {
        // Simulate processing time (1 second)
        usleep(1000000);

        return true;
    }
}
