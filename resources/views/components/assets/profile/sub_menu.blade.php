<div class="col-12">
    <div class="nav-strip sticky-top" style="top: 0; z-index: 99;">
        @php
            $currentPath = request()->path();
        @endphp

        <a wire:navigate class="nav-item {{ str_contains($currentPath, 'profile/personal-info') ? 'active' : '' }}"
            href="{{ route('main.profile') }}">
            <i class="bi bi-person-fill"></i> {{ __('profile.navigation.personal_data') }}
        </a>

        <a wire:navigate class="nav-item {{ str_contains($currentPath, 'profile/security') ? 'active' : '' }}"
            href="{{ route('profile.security') }}">
            <i class="bi bi-shield-lock-fill"></i> {{ __('profile.navigation.security') }}
        </a>

        <a wire:navigate class="nav-item {{ str_contains($currentPath, 'profile/ideas') ? 'active' : '' }}"
            href="{{ route('profile.ideas') }}">
            <i class="bi bi-person-lines-fill"></i> {{ __('profile.navigation.ideas') }}
        </a>

        <a wire:navigate class="nav-item {{ str_contains($currentPath, 'profile/investments') ? 'active' : '' }}"
            href="{{ route('profile.investments') }}">
            <i class="bi bi-person-lines-fill"></i> {{ __('profile.navigation.investments') }}
        </a>
    </div>
</div>
