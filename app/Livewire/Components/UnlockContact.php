<?php

namespace App\Livewire\Components;

use App\Models\User;
use Livewire\Component;
use App\Enums\UnlockMethod;
use App\Services\UnlockService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class UnlockContact extends Component
{
    public Model $model;
    public bool $isUnlocked = false;
    public string $errorMessage = '';
    public int $step = 1; // 1: Selection, 2: Payment
    public string $cardNumber = '';
    public string $expiryDate = '';
    public string $cvv = '';

    public function mount(Model $model, UnlockService $service)
    {
        $this->model = $model;
        if (Auth::check()) {
            $this->isUnlocked = $service->canViewContact(Auth::user(), $model);
            // Fallback for debug if logic still fails
            if (!$this->isUnlocked && (Auth::user()->role === \App\Enums\UserRole::ADMIN || Auth::id() == $model->user_id)) {
                $this->isUnlocked = true;
            }
        }
    }

    public function confirmUnlock()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->errorMessage = '';
        $this->step = 1;
        $this->dispatch('open-unlock-modal');
    }

    public function selectMethod(string $method, UnlockService $service)
    {
        $this->errorMessage = '';
        if ($method === 'credit') {
            $this->unlock($service, UnlockMethod::CREDIT);
        } else {
            $this->step = 2;
        }
    }

    public function processPayment(UnlockService $service)
    {
        if (!Auth::check()) {
            return;
        }

        $this->errorMessage = '';

        // Mock validation
        if (empty($this->cardNumber) || strlen($this->cardNumber) < 16) {
            $this->errorMessage = __('validation.min.string', ['attribute' => __('pages.unlock_contact.card_number'), 'min' => 16]);
            return;
        }

        /** @var User $user */
        $user = Auth::user();

        if ($service->unlock($user, $this->model, UnlockMethod::PAY_PER_USE)) {
            $this->isUnlocked = true;
            $this->dispatch('close-unlock-modal');
            $this->dispatch('contact-unlocked');
        } else {
            $this->errorMessage = 'Payment failed. Please try again.';
        }
    }

    public function unlock(UnlockService $service, UnlockMethod $method = UnlockMethod::CREDIT)
    {
        if (!Auth::check()) {
            return;
        }

        $this->errorMessage = '';

        /** @var User $user */
        $user = Auth::user();

        if ($service->unlock($user, $this->model, $method)) {
            $this->isUnlocked = true;
            $this->dispatch('close-unlock-modal');
            $this->dispatch('contact-unlocked');
        } else {
             $this->errorMessage = __('pages.unlock_contact.error_no_credits');
        }
    }

    public function render()
    {
        return view('livewire.components.unlock-contact');
    }
}
