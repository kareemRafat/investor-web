<?php

namespace App\Livewire\Pages\Landing;

use App\Models\ContactMessage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.blank')]
class LandingContact extends Component
{
    #[Title('Contact Us')]
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $subject = '';
    public string $message = '';

    public ?string $successMessage = null;

    public function mount(): void
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        if ($user) {
            $this->name = $user->name ?? '';
            $this->email = $user->email ?? '';
            $this->phone = $user->phone ?? '';
        }
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s\-().]{7,20}$/'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function save(): void
    {
        $this->successMessage = null;
        $this->resetValidation();

        $this->validate();

        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset(['subject', 'message']);
        $this->resetValidation();

        // Reactive property (not session flash): Livewire re-renders in the
        // same request, where flashed session data is not yet visible.
        $this->successMessage = __('pages.contact.success');
    }

    public function render()
    {
        return view('livewire.pages.landing.landing-contact');
    }
}
