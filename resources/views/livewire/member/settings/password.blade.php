<div class="row m-0 p-3">
    <div class="col-md-4">
        <div class="mt-2">
            <span class="h5 fw-bold">Ubah Sandi</span>
            <div class="text-muted">Perbarui kata sandi akun kamu.</div>
        </div>
    </div>
    <div class="col-md-8">
        <form wire:submit.prevent="updatePassword">
            <div class="form-group mb-3">
                <label class="form-label">
                    Existing Password <span class="text-danger">*</span>
                </label>
                <input type="password" class="with-border bg-secondary @error('currentPassword') is-invalid @enderror"
                    wire:model.defer="currentPassword">
                @error('currentPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">
                    New Password <span class="text-danger">*</span>
                </label>
                <input type="password" class="with-border bg-secondary @error('newPassword') is-invalid @enderror"
                    wire:model="newPassword">
                @error('newPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">
                    Confirm Password <span class="text-danger">*</span>
                </label>
                <input type="password" class="with-border bg-secondary @error('confirmPassword') is-invalid @enderror"
                    wire:model="confirmPassword">
                @error('confirmPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <x-submit>Simpan Perubahan</x-submit>

        </form>
    </div>
</div>