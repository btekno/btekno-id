<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Security logs</span>
                <div class="text-muted">Recent events that happend on your account.</div>
            </div>
        </div>
        <div class="col-md-8">
            @if(count($activities) === 0)
                <div class="card-body text-center mt-3 mb-3">
                    <span class="iconify text-primary h1 mb-2" data-icon="uil:stopwatch" data-inline="false"></span>
                    <div class="h5 text-muted">
                        Nothing has been logged!
                    </div>
                </div>
            @endif


            <div class="px-3">
                {{ $activities->links() }}
            </div>
            <ul class="list-group list-group-flush rounded-2 mb-2">
                @foreach ($activities as $activity)
                    <x-users.activity :activity="$activity" />
                @endforeach
            </ul>
        </div>
    </div>
</div>
