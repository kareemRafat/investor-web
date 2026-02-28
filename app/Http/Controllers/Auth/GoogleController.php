<?php

namespace App\Http\Controllers\Auth;

use App\Enums\PlanType;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            return redirect()
                ->route('login', ['locale' => app()->getLocale()])
                ->with('error', __('auth.failed'));
        } catch (Exception $e) {
            return redirect()
                ->route('login', ['locale' => app()->getLocale()])
                ->with('error', __('auth.google_failed'));
        }

        if (! $googleUser->email) {
            return redirect()
                ->route('login', ['locale' => app()->getLocale()])
                ->with('error', __('auth.google_no_email'));
        }

        // Find user by email
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            // Check if user is banned/active
            if ($user->status !== UserStatus::ACTIVE) {
                return redirect()
                    ->route('login', ['locale' => app()->getLocale()])
                    ->with('error', __('auth.account_not_active'));
            }

            // Update google_id if it's not set yet
            if (! $user->google_id) {
                $user->update(['google_id' => $googleUser->id]);
            }
        } else {
            // Create new user if they don't exist
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'email_verified_at' => now(),
                'status' => UserStatus::ACTIVE,
                'role' => UserRole::USER,
                'plan_type' => PlanType::FREE,
            ]);
        }

        Auth::login($user);

        return redirect()->intended(
            route('main.home', ['locale' => app()->getLocale()])
        );
    }
}
