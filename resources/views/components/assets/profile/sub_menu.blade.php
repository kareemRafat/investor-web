<div class="row">
    <div class="nav-strip sticky-top" style="top: 0; z-index: 99;">
        @php
            $currentPath = request()->path();
        @endphp

        <a wire:navigate class="nav-item {{ str_contains($currentPath, 'profile/personal-info') ? 'active' : '' }}"
            href="{{ route('main.profile') }}">
            <i class="bi bi-person-fill"></i> {{ __('profile.navigation.personal_data') }}
        </a>

        <a wire:navigate class="nav-item {{ str_contains($currentPath, 'profile/contact') ? 'active' : '' }}"
            href="{{ route('profile.contactinfo') }}">
            <i class="bi bi-person-lines-fill"></i> {{ __('profile.navigation.contact') }}
        </a>

        <a wire:navigate class="nav-item {{ str_contains($currentPath, 'profile/security') ? 'active' : '' }}"
            href="{{ route('profile.security') }}">
            <i class="bi bi-shield-lock-fill"></i> {{ __('profile.navigation.security') }}
        </a>
    </div>
</div>
