<?php

namespace App\Livewire\Pages\Profile\Components;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileInfo extends Component
{
    use WithFileUploads;

    public $user;
    public $avatar;
    public $fullName;
    public $email;
    public $phone;
    public $username;
    public $birthdate;
    public $gender;
    public $bio;
    public $activeTab = 'personal';

    public function mount()
    {
        $this->loadUserData();
    }

    public function loadUserData()
    {
        // هنا يمكنك جلب بيانات اليوزر من الداتابيز
        $this->user = auth()->user();
        $this->fullName = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone ?? '';
        $this->username = $this->user->username ?? '';
        $this->birthdate = $this->user->birthdate ?? '';
        $this->gender = $this->user->gender ?? 'male';
        $this->bio = $this->user->bio ?? '';
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'image|max:2048',
        ]);

        // حفظ الصورة
        $path = $this->avatar->store('avatars', 'public');
        $this->user->update(['avatar' => $path]);

        session()->flash('message', __('profile.messages.avatar_updated'));
    }

    public function savePersonalInfo()
    {
        $this->validate([
            'fullName' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->user->id,
            'birthdate' => 'nullable|date',
            'gender' => 'required|in:male,female',
            'bio' => 'nullable|string|max:500',
        ]);

        $this->user->update([
            'name' => $this->fullName,
            'username' => $this->username,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'bio' => $this->bio,
        ]);

        session()->flash('message', __('profile.messages.personal_info_updated'));
    }

    public function saveContactInfo()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'phone' => 'required|string|max:20',
        ]);

        $this->user->update([
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        session()->flash('message', __('profile.messages.contact_info_updated'));
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function render()
    {
        return view('livewire.pages.profile.components.profile-info');
    }
}
