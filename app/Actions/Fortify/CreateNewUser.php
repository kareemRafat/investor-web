<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->where(function ($query) {
                    $query->whereNotNull('email_verified_at'); // يسمح بنفس الإيميل لو مش مؤكد
                }),
            ],
            'password' => $this->passwordRules(),
            'job_title' => ['required', 'string', 'max:255'],
            'residence_country' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date', 'before:today'],

        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            'job_title' => $input['job_title'],
            'residence_country' => $input['residence_country'],
            'birth_date' => $input['birth_date'],
        ]);
    }
}
