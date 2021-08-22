<div class="card border-0 rounded-0 shadow-none mb-0">
    <div class="card-body border-0 p-0" style="min-height: calc(100vh - 143px);">

        <div class="px-3 pt-3 pb-0 mb-2">
            <span class="h5 fw-bold">Security logs</span>
            <div class="mt-0 small text-muted">
                Recent events that happend on your account.
            </div>
        </div>

        @if(count($activities) === 0)
            <div class="card-body text-center mt-3 mb-3">
                <span class="iconify text-primary h1 mb-2" data-icon="uil:stopwatch" data-inline="false"></span>
                <div class="h5 text-muted">
                    Nothing has been logged!
                </div>
            </div>
        @endif

        <ul class="list-group list-group-flush mb-2">
            @foreach ($activities as $activity)
                <x-users.activity :activity="$activity" />
            @endforeach
        </ul>
        <div class="px-3">
            {{ $activities->links() }}
        </div>
    </div>
</div>