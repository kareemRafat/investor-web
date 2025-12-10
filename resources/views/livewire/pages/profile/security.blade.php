<div class="settings-card">
    <div class="section-title">
        <i class="bi bi-shield-lock text-danger"></i>
        {{ __('profile.security.title') }}
    </div>
    <form>
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
                <div class="custom-input-group">
                    <span class="input-icon"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control"
                        placeholder="{{ __('profile.placeholders.current_password') }}">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('profile.security.new_password') }}</label>
                <div class="custom-input-group">
                    <span class="input-icon"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control"
                        placeholder="{{ __('profile.security.new_password_placeholder') }}">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('profile.security.confirm_password') }}</label>
                <div class="custom-input-group">
                    <span class="input-icon"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control"
                        placeholder="{{ __('profile.security.confirm_password_placeholder') }}">
                </div>
            </div>

            <div class="col-12 text-end mt-4">
                <button type="button" class="btn btn-save">{{ __('profile.security.update_security') }}</button>
            </div>
        </div>
    </form>
</div>
