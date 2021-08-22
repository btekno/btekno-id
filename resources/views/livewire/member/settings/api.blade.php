<div class="card border-0 rounded-0 shadow-none mb-0">
    <div class="card-body border-0" style="min-height: calc(100vh - 143px);">

        <div class="mb-4">
            <span class="h5 fw-bold">Personal Access Token</span>
            <div class="mt-0 small text-muted">
                API Token generated that can be used to access the Btekno API.
            </div>
        </div>

        <form wire:submit.prevent="regenerateToken">
            <div class="mb-3">
                <label class="form-label">Personal Access Token</label>
                <div class="input-group">
                    <input type="text" id="personal-access-token"
                        class="form-control @error('token') is-invalid @enderror" value="{{ $user->api_token }}"
                        readonly>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary js-clipboard" type="button" title="Copy"
                            data-bs-toggle="tooltip" data-for="#personal-access-token">
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
            <button type="submit" class="button primary">
                Regenerate
            </button>
        </form>

    </div>
</div>