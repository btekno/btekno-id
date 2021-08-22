<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Notifications</span>
                <div class="text-muted">Choose how you receive notifications.</div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="mb-3">
                <label class="form-label">Get all notifications via email</label>
                <div class="form-check">
                    <input wire:click="notificationsEmail" id="notificationsEmail" class="form-check-input"
                        type="checkbox" {{ $user->notifications_email ? 'checked' : '' }}>
                    <label for="notificationsEmail" class="form-check-label">Email</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Get all notifications via web</label>
                <div class="form-check">
                    <input wire:click="notificationsWeb" id="notificationsWeb" class="form-check-input" type="checkbox"
                        {{ $user->notifications_web ? 'checked' : '' }}>
                    <label for="notificationsWeb" class="form-check-label">Web</label>
                </div>
            </div>
        </div>
    </div>
</div>