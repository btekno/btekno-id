<div class="card border-0 rounded-0 shadow-none mb-0">
    <div class="card-body border-0 p-0" style="min-height: calc(100vh - 143px);">

        <div class="mb-2 px-3 pt-3">
            <span class="h5 fw-bold">Sessions Devices</span>
            <div class="mt-0 small text-muted">
                This is a list of devices that have logged into your account. Revoke any sessions that you do not recognize.
            </div>
        </div>

        @if(count($sessions) === 0)
            <div class="card-body text-center mt-3 mb-3">
                <span class="iconify text-primary h1 mb-2" data-icon="uil:shield-question" data-inline="false"></span>
                <div class="h5 text-muted">
                    Nothing has been logged!
                </div>
            </div>
        @endif

        <ul class="list-group list-group-flush">
            @foreach ($sessions as $session)
                @php
                    $agent = new Jenssegers\Agent\Agent();
                    $agent->setUserAgent($session->user_agent);
                @endphp
                <li class="list-group-item py-2 d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            @if ($agent->isPhone())
                                <span class="iconify text-secondary display-4 mb-2" data-icon="uil:mobile-android" data-inline="false"></span>
                            @else
                                <span class="iconify text-secondary display-4 mb-2" data-icon="uil:desktop" data-inline="false"></span>
                            @endif
                        </div>
                        <div>
                            <div class="fw-bold mb-0 text-dark">
                                {{ $session->ip_address }}
                            </div>
                            <div class="small text-dark">
                                @if (session()->getId() === $session->id)
                                    <span class="text-primary">Your current session</span>
                                @else
                                    Last accessed on {{ carbon($session->last_activity)->format('M d, Y') }}
                                @endif
                            </div>
                            @if ($agent->browser() and $agent->platform())
                                <div class="mt-0 small text-secondary" title="{{ $session->user_agent }}">
                                    <small>{{ $agent->browser() }} on {{ $agent->platform() }}</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
</div>