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

            // Update google_id if not already done
            if (! $user->google_id) {
                $user->forceFill(['google_id' => $googleUser->id])->save();
            }

            // Mark as verified if not already
            if (! $user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }
        } else {
            // Create new verified user if they don't exist
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'status' => UserStatus::ACTIVE,
                'role' => UserRole::USER,
                'plan_type' => PlanType::FREE,
            ]);

            // Don`t send verification email to google user
            $user->markEmailAsVerified();
        }

        Auth::login($user);

        return redirect()->intended(
            route('main.home', ['locale' => app()->getLocale()])
        );
    }
}
