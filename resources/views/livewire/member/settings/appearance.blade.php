<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Theme preferences</span>
                <div class="text-muted">Choose how {{ env('APP_NAME') }} looks to you.</div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="d-flex">
                <div class="cursor-pointer me-3 card shadow-none {{ me()->dark_mode === 0 ? 'border-primary' : '' }}"
                    wire:click="toggleMode(0)">
                    <img class="rounded-top" src="{{ asset('assets/images/preview-light.png') }}" />
                    <div class="card-footer">
                        <div class="fw-bold">
                            Default light
                        </div>
                    </div>
                </div>
                <div class="cursor-pointer me-3 card shadow-none {{ me()->dark_mode === 1 ? 'border-primary' : '' }}"
                    wire:click="toggleMode(1)">
                    <img class="rounded-top" src="{{ asset('assets/images/preview-dark.png') }}" />
                    <div class="card-footer">
                        <div class="fw-bold">
                            Default dark
                        </div>
                    </div>
                </div>
                <div class="cursor-pointer card shadow-none {{ me()->dark_mode === 2 ? 'border-primary' : '' }}"
                    wire:click="toggleMode(2)">
                    <img class="rounded-top" src="{{ asset('assets/images/preview-auto.png') }}" />
                    <div class="card-footer">
                        <div class="fw-bold">
                            System
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>