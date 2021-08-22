<div class="card border-0 rounded-0 shadow-none mb-0">
    <div class="card-body border-0" style="min-height: calc(100vh - 143px);">

        <div class="mb-4">
            <span class="h5 fw-bold">Danger Zone</span>
            <div class="mt-0 small text-muted">
                <b>Note:</b> You can't recover your account
            </div>
        </div>

        <div class="h5 fw-bold text-danger mb-1">Reset your Account</div>
        <div class="mb-2 text-muted">
            Resetting your account is will be wiped out all your data immediately and you won't be able to get it back.
        </div>
        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#resetAccountModal">
            <x-heroicon-o-trash class="heroicon" />
            Reset now
        </button>

        <div class="mb-4"></div>

        <div class="h5 fw-bold text-danger mb-1">Delete your Account</div>
        <div class="mb-2 text-muted">
            Deleting your account is permanent. All your data will be wiped out immediately and you won't be able to get it back.
        </div>
        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
            <x-heroicon-o-trash class="heroicon" />
            Delete now
        </button>
    </div>
</div>
<div class="modal fade" id="resetAccountModal" tabindex="-1" aria-labelledby="resetAccountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="resetAccountModalLabel">Reset Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to reset your account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button wire:loading.attr="disabled" wire:click="resetAccount" type="button" class="btn btn-danger">
                    Reset Account
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="deleteAccountModalLabel">Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button wire:loading.attr="disabled" wire:click="deleteAccount" type="button" class="btn btn-danger">
                    Delete Account
                </button>
            </div>
        </div>
    </div>
</div>