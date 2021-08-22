<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Account</span>
                <div class="text-muted">Change your username and email.</div>
            </div>
        </div>
        <div class="col-md-8">
            <form wire:submit.prevent="updateAccount">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text border border-1" id="basic-addon3">{{ env('APP_URL') }}/@</span>
                        <input type="text" class="form-control border border-1 @error('username') is-invalid @enderror"
                            value="{{ $user->username }}" wire:model="username">
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control border border-1 @error('email') is-invalid @enderror"
                        value="{{ $user->email }}" wire:model="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <x-submit>Simpan Perubahan</x-submit>

            </form>
        </div>
    </div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Private Account</span>
                <div class="text-muted">All your information will hidden from public.</div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-check mt-2">
                <input wire:click="enrollPrivate" id="enrollPrivate" class="form-check-input" type="checkbox" {{ $user->is_private ? 'checked' : '' }}>
                <label for="enrollPrivate" class="form-check-label">Hide all information from public</label>
            </div>
            <p class="text-muted lh-base">When your account is private, Only people you approve can see your information on {{ env('APP_NAME') }}. Your existing followers won't be affected.</p>
        </div>
    </div>
</div>