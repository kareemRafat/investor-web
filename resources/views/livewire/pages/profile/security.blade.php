<div class="settings-card">
    <div class="section-title">
        <i class="bi bi-shield-lock text-danger"></i>
        {{ __('profile.security.title') }}
    </div>
    <form wire:submit.prevent="updatePassword">
        <div class="row g-4">
            <div class="col-12">
                <div class="security-alert mb-3">
                    <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                    <div>
                        <strong class="d-block mb-1">{{ __('profile.security.alert_title') }}</strong>
                        <small>{{ __('profile.security.alert_message') }}</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label">{{ __('profile.security.current_password') }}</label>
                <div class="custom-input-group mb-1">
                    <span class="input-icon"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                        wire:model="current_password"
                        placeholder="{{ __('profile.placeholders.current_password') }}">
                </div>
                @error('current_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">{{ __('profile.security.new_password') }}</label>
                <div class="custom-input-group mb-1">
                    <span class="input-icon"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        wire:model="new_password"
                        placeholder="{{ __('profile.security.new_password_placeholder') }}">
                </div>
                @error('new_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">{{ __('profile.security.confirm_password') }}</label>
                <div class="custom-input-group mb-1">
                    <span class="input-icon"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        wire:model="new_password_confirmation"
                        placeholder="{{ __('profile.security.confirm_password_placeholder') }}">
                </div>
                @error('new_password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 text-end mt-4 d-flex justify-content-between align-items-center gap-3">
                <div class="w-50">
                    @if (session()->has('success'))
                        <div class="alert alert-success mb-0 text-start" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger mb-0 text-start" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-save" wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('profile.security.update_security') }}</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status"></span>
                        {{ __('profile.messages.saving') }}
                    </span>
                </button>
            </div>
        </div>
    </form>
</div>
