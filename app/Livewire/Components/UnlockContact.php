<?php

namespace App\Livewire\Components;

use App\Enums\UnlockMethod;
use App\Models\User;
use App\Services\UnlockService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UnlockContact extends Component
{
    public Model $model;

    public bool $isUnlocked = false;

    public string $errorMessage = '';

    public int $step = 1;

    public function mount(Model $model, UnlockService $service)
    {
        $this->model = $model;
        if (Auth::check()) {
            $this->isUnlocked = $service->canViewContact(Auth::user(), $model);
            // Fallback for debug if logic still fails
            if (! $this->isUnlocked && (Auth::user()->role === \App\Enums\UserRole::ADMIN || Auth::id() == $model->user_id)) {
                $this->isUnlocked = true;
            }
        }
    }

    public function confirmUnlock()
    {
        if (! Auth::check()) {
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
            // Redirect to payment page with $9 plan/unlock info
            return redirect()->route('payment.page', [
                'plan' => 'unlock',
                'unlockable_id' => $this->model->id,
                'unlockable_type' => $this->model->getMorphClass(),
            ]);
        }
    }

    public function unlock(UnlockService $service, UnlockMethod $method = UnlockMethod::CREDIT)
    {
        if (! Auth::check()) {
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
