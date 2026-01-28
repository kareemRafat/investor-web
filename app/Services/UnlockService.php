<?php

namespace App\Services;

use App\Models\User;
use App\Models\Idea;
use App\Models\Investor;
use App\Enums\UnlockMethod;
use App\Models\ContactUnlock;
use App\Enums\ContactVisibility;
use Illuminate\Database\Eloquent\Model;

class UnlockService
{
    /**
     * Check if a user can view the contact details of a model.
     */
    public function canViewContact(User $user, Model $model): bool
    {
        // If visibility is open, anyone can view
        if ($model->contact_visibility === ContactVisibility::OPEN) {
            return true;
        }

        // Owner can always view their own contact (though they already know it)
        if ($user->id === $model->user_id) {
            return true;
        }

        // Admin can always view
        if ($user->role === \App\Enums\UserRole::ADMIN) {
            return true;
        }

        // Check if user has already unlocked this contact
        return $user->contactUnlocks()
            ->where('unlockable_id', $model->id)
            ->where('unlockable_type', get_class($model))
            ->exists();
    }

    /**
     * Attempt to unlock a contact for a user.
     */
    public function unlock(User $user, Model $model, UnlockMethod $method): bool
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
            // Mock Pay Per Use - Logic for actual payment gateway would go here
            // PaymentService::process($9);
        }

        ContactUnlock::create([
            'user_id' => $user->id,
            'unlockable_id' => $model->id,
            'unlockable_type' => get_class($model),
            'method' => $method,
        ]);

        return true;
    }
}
