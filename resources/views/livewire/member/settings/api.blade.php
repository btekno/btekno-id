<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Personal Access Token</span>
                <div class="text-muted lh-sm mt-1">
                    API Token generated that can be used to access the {{ env('APP_NAME') }} API.
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form wire:submit.prevent="regenerateToken">
                <div class="mb-3">
                    <label class="form-label">API Token</label>
                    <div class="input-group">
                        <input type="text" id="personal-access-token"
                            class="form-control @error('token') is-invalid @enderror" value="{{ $user->api_token }}"
                            readonly>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary js-clipboard h-100 rounded-1 border-0" type="button" title="Copy" data-bs-toggle="tooltip" data-for="#personal-access-token">
                                <x-heroicon-o-clipboard-copy class="heroicon heroicon-18px" />
                            </button>
                        </div>
                    </div>
                    @error('token')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <x-submit>Regenerate</x-submit>
                
            </form>
        </div>
    </div>
</div>