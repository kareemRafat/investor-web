# Plan: Google Login Implementation

This plan outlines the steps required to integrate "Login with Google" into the application, ensuring it works seamlessly with the existing Fortify authentication and Laravel Localization.

## 1. Prerequisites & Installation
- [ ] Install Laravel Socialite: `composer require laravel/socialite`.
- [ ] Set up Google Cloud Console:
    - Create a new project.
    - Configure OAuth Consent Screen.
    - Create OAuth 2.0 Client IDs (Web Application).
    - Add Authorized Redirect URIs (e.g., `http://127.0.0.1:8000/auth/google/callback`).

## 2. Configuration
- [ ] Add Google credentials to `.env`:
    ```env
    GOOGLE_CLIENT_ID=your-client-id
    GOOGLE_CLIENT_SECRET=your-client-secret
    GOOGLE_REDIRECT_URI="${APP_URL}/auth/google/callback"
    ```
- [ ] Configure `config/services.php`:
    ```php
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],
    ```

## 3. Database Updates
- [ ] Create a migration to update the `users` table:
    - Add `google_id` (string, nullable, unique).
    - Make `password` column nullable (required for social-only registrations).

## 4. Backend Logic
- [ ] Create `App\Http\Controllers\Auth\GoogleController`:
    - `redirectToGoogle()`: Redirects user to Google's authentication page.
    - `handleGoogleCallback()`: 
        - Retrieve user data from Google.
        - Check if a user with the same `google_id` or `email` already exists.
        - Create a new user if not found (assigning default roles/plans).
        - Mark email as verified for Google users.
        - Log the user in and redirect to the dashboard.
- [ ] Update `App\Models\User`:
    - Add `google_id` to `$fillable`.

## 5. Routing
- [ ] Register new routes in `routes/auth.php`:
    - `auth/google/redirect` (named `auth.google.redirect`).
    - `auth/google/callback` (named `auth.google.callback`).
    - Ensure these routes handle or bypass localization correctly during the callback handshake.

## 6. Frontend Integration
- [ ] Update Login and Register Livewire views:
    - Add a "Login with Google" button with appropriate styling (Google branding).
    - Add a "Register with Google" button.

## 7. Edge Cases & Polish
- [ ] Handle "Email already exists" conflict (link Google account or show error).
- [ ] Handle "User cancelled" from Google consent screen.
- [ ] Ensure the redirection after login respects the user's preferred locale.
