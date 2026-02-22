<?php

namespace App\Services;

use App\Models\User;
use App\Models\Idea;
use App\Models\Investor;
use App\Enums\UnlockMethod;
use App\Models\ContactUnlock;
use App\Enums\ContactVisibility;
use App\Contracts\PaymentGatewayInterface;
use Illuminate\Database\Eloquent\Model;

class UnlockService
{
    public function __construct(
        protected PaymentGatewayInterface $paymentGateway
    ) {}

    /**
     * Check if a user can view the contact details of a model.
     */
    public function canViewContact(User $user, Model $model): bool
    {
        // If visibility is open, anyone can view
        if ($model->contact_visibility === ContactVisibility::OPEN) {
            return true;
        }

        // Owner can always view their own contact
        if ($user->id == $model->user_id) {
            return true;
        }

        // Admin can always view
        if ($user->role === \App\Enums\UserRole::ADMIN || $user->role === 'admin' || (is_object($user->role) && $user->role->value === 'admin')) {
            return true;
        }

        // Check if user has already unlocked this contact
        return $user->contactUnlocks()
            ->where('unlockable_id', $model->id)
            ->where('unlockable_type', $model->getMorphClass())
            ->exists();
    }

    /**
     * Attempt to unlock a contact for a user.
     */
    public function unlock(User $user, Model $model, UnlockMethod $method, ?string $paymentOrderId = null): bool
    {
        if ($this->canViewContact($user, $model)) {
            return true;
        }

        if ($method === UnlockMethod::CREDIT) {
            if (!$user->hasCredits()) {
                return false;
            }

            $user->decrement('contact_credits');
        } else {
            // Pay Per Use
            if ($paymentOrderId) {
                $this->paymentGateway->capturePayment($paymentOrderId);
            } else {
                // Default/Legacy flow
                $orderId = $this->paymentGateway->createOrder(9.0);
                $this->paymentGateway->capturePayment($orderId);
            }
        }

        ContactUnlock::create([
            'user_id' => $user->id,
            'unlockable_id' => $model->id,
            'unlockable_type' => $model->getMorphClass(),
            'method' => $method,
        ]);

        return true;
    }
}
