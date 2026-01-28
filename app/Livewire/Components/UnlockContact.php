<?php

namespace App\Livewire\Components;

use App\Models\User;
use Livewire\Component;
use App\Enums\UnlockMethod;
use App\Services\UnlockService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class UnlockContact extends Component
{
    public Model $model;
    public bool $isUnlocked = false;
    public string $errorMessage = '';

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
        Log::info('confirmUnlock called for model ID: ' . $this->model->id);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->errorMessage = '';
        $this->dispatch('open-unlock-modal');
    }

    public function unlock(UnlockService $service)
    {
        Log::info('unlock action triggered for model ID: ' . $this->model->id);

        if (!Auth::check()) {
            return;
        }

        $this->errorMessage = '';

        /** @var User $user */
        $user = Auth::user();

        if ($service->unlock($user, $this->model, UnlockMethod::CREDIT)) {
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
