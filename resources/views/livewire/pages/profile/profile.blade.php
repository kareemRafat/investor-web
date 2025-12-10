<div class="settings-card">
    <div class="section-title">
        <i class="bi bi-person-lines-fill text-primary"></i>
        {{ __('profile.basic_info.title') }}
    </div>
    <form>
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">{{ __('profile.labels.full_name') }}</label>
                <div class="custom-input-group">
                    <span class="input-icon"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" value="أحمد محمد علي">
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('profile.labels.username') }}</label>
                <div class="custom-input-group">
                    <span class="input-icon"><i class="bi bi-at"></i></span>
                    <input type="text" class="form-control" value="ahmed_dev">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">{{ __('profile.labels.bio') }}</label>
                <div class="custom-input-group align-items-start pt-2">
                    <span class="input-icon mt-1"><i class="bi bi-chat-quote"></i></span>
                    <textarea class="form-control" rows="3">مطور برمجيات شغوف بالتقنيات الحديثة...</textarea>
                </div>
            </div>
            <div class="col-12 text-end">
                <button type="button" class="btn btn-save">{{ __('profile.basic_info.save_changes') }}</button>
            </div>
        </div>
    </form>
</div>
