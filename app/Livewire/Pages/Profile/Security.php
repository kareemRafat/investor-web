<?php

namespace App\Livewire\Pages\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.profile')]
class Security extends Component
{
    public $current_password;

    public $new_password;

    public $new_password_confirmation;

    protected function rules()
    {
        return [
            'current_password' => 'required|current_password',
            'new_password' => ['required', 'confirmed', Password::min(8)],
            'new_password_confirmation' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'current_password.required' => __('profile.validation.current_password_required'),
            'current_password.current_password' => __('profile.validation.current_password_incorrect'),
            'new_password.required' => __('profile.validation.new_password_required'),
            'new_password.confirmed' => __('profile.validation.password_confirmation'),
            'new_password.min' => __('profile.validation.password_min'),
            'new_password_confirmation.required' => __('profile.validation.confirm_password_required'),
        ];
    }

    public function updatePassword()
    {
        $this->validate();

        try {
            // تحديث كلمة المرور
            $user = Auth::user();
            $user->password = Hash::make($this->new_password);
            $user->save();

            // إعادة تعيين الحقول
            $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

            // رسالة نجاح
            session()->flash('success', __('profile.messages.password_updated'));

        } catch (\Exception $e) {
            session()->flash('error', __('profile.messages.update_failed'));
        }
    }

    public function render()
    {
        return view('livewire.pages.profile.security');
    }
}
