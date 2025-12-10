<div class="settings-card">
    <div class="section-title">
        <i class="bi bi-envelope-paper text-primary"></i>
        {{ __('profile.contact_info.title') }}
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <label class="form-label">{{ __('profile.labels.email') }}</label>
            <div class="custom-input-group bg-light">
                <span class="input-icon"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" value="ahmed@example.com" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">{{ __('profile.labels.phone') }}</label>
            <div class="custom-input-group">
                <span class="input-icon"><i class="bi bi-telephone"></i></span>
                <input type="tel" class="form-control" value="01000000000">
            </div>
        </div>
        <div class="col-12 text-end">
            <button type="button" class="btn btn-save">{{ __('profile.contact_info.save_contact') }}</button>
        </div>
    </div>
</div>
