<?php

namespace App\Livewire\Pages;

use App\Models\ContactMessage;
use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Title('Contact us')]
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $subject = '';
    public string $message = '';

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($user) {
            $this->name = $user->name ?? '';
            $this->email = $user->email ?? '';
            $this->phone = $user->phone ?? '';
        }

        $this->subject = __('pages.contact.subject_default', [], 'en') === 'pages.contact.subject_default' 
            ? 'General Inquiry' 
            : __('pages.contact.subject_default');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function submit(): void
    {
        $this->validate();

        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset(['message']);

        // Re-mount to preserve user info after submission
        $this->mount();

        session()->flash('success', __('pages.contact.success'));    }

    public function render()
    {
        return view('livewire.pages.contact');
    }
}
