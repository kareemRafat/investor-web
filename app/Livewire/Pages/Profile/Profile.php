<?php

namespace App\Livewire\Pages\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.profile')]
class Profile extends Component
{
    public $user;

    public $name;

    public $email;

    public $phone;

    public $job_title;

    public $residence_country;

    public $birth_date;

    public function mount()
    {
        $this->user = Auth::user();

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->job_title = $this->user->job_title;
        $this->residence_country = $this->user->residence_country;
        $this->birth_date = $this->user->birth_date;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'phone' => ['required', 'string', 'max:20'],
            'job_title' => ['required', 'string', 'max:100'],
            'residence_country' => ['required', 'string', 'max:100'],
            'birth_date' => ['nullable', 'date', 'before:today'],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => __('profile.validation.required_name'),
            'email.required' => __('profile.validation.required_email'),
            'email.unique' => __('profile.validation.unique_email'),
            'email.email' => __('profile.validation.valid_email'),
            'phone.required' => __('profile.validation.required_phone'),
            'job_title.required' => __('profile.validation.required_job_title'),
            'residence_country.required' => __('profile.validation.required_country'),
            'birth_date.before' => __('profile.validation.birth_date_before_today'),
        ];
    }

    public function updateProfile()
    {
        $validatedData = $this->validate();

        try {
            $this->user->update($validatedData);

            session()->flash('success', __('profile.messages.profile_updated'));

            $this->user->refresh();
        } catch (\Exception $e) {
            session()->flash('error', __('profile.messages.update_error'));
        }
    }

    public function render()
    {
        return view('livewire.pages.profile.profile');
    }
}
