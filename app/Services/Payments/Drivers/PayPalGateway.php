<?php

namespace App\Services\Payments\Drivers;

use App\Contracts\PaymentGatewayInterface;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class PayPalGateway implements PaymentGatewayInterface
{
    protected PayPalClient $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;

        // This will use the config/paypal.php settings
        $this->provider->setApiCredentials(config('paypal'));

        // Ensure we can get an access token.
        // This might fail if credentials are invalid.
        try {
            $this->provider->getAccessToken();
        } catch (Throwable $e) {
            // Log the error but don't crash here, let it crash when we try to use it
            // or maybe we should crash?
            // If the driver is instantiated via PaymentManager::driver('paypal'),
            // it's likely we intend to use it immediately.
            Log::error('PayPal Gateway Initialization Failed: '.$e->getMessage());
        }
    }

    /**
     * {@inheritDoc}
     */
    public function createOrder(float $amount, string $currency = 'USD', array $metadata = []): string
    {
        $data = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => $currency,
                        'value' => number_format($amount, 2, '.', ''),
                    ],
                    'reference_id' => $metadata['reference_id'] ?? null,
                    'description' => $metadata['description'] ?? 'Order',
                ],
            ],
            'application_context' => [
                'cancel_url' => $metadata['cancel_url'] ?? url('/'),
                'return_url' => $metadata['return_url'] ?? url('/'),
                'user_action' => 'PAY_NOW',
            ],
        ];

        // Merge any specific PayPal metadata if needed
        if (isset($metadata['paypal']) && is_array($metadata['paypal'])) {
            $data = array_replace_recursive($data, $metadata['paypal']);
        }

        try {
            $response = $this->provider->createOrder($data);

            if (isset($response['id']) && ($response['status'] ?? '') !== 'REFUNDED') {
                return $response['id'];
            }

            Log::error('PayPal createOrder failed', ['response' => $response]);
            throw new RuntimeException('Failed to create PayPal order: '.($response['message'] ?? 'Unknown error'));
        } catch (Throwable $e) {
            Log::error('PayPal createOrder exception: '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function capturePayment(string $orderId): array
    {
        try {
            $response = $this->provider->capturePaymentOrder($orderId);

            if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                // Return array with status and transaction ID
                // Typically transaction ID is in purchase_units[0]['payments']['captures'][0]['id']
                $transactionId = $response['purchase_units'][0]['payments']['captures'][0]['id'] ?? $orderId;

                return [
                    'status' => 'completed',
                    'transaction_id' => $transactionId,
                    'payload' => $response,
                ];
            }

            Log::error('PayPal capturePayment failed', ['response' => $response]);

            return [
                'status' => 'failed',
                'error' => $response['message'] ?? 'Capture failed',
                'payload' => $response,
            ];

        } catch (Throwable $e) {
            Log::error('PayPal capturePayment exception: '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentStatus(string $orderId): string
    {
        try {
            $response = $this->provider->showOrderDetails($orderId);

            if (isset($response['status'])) {
                return strtolower($response['status']);
            }

            return 'unknown';
        } catch (Throwable $e) {
            Log::error('PayPal getPaymentStatus exception: '.$e->getMessage());

            return 'error';
        }
    }
}
