<div>
    <div class="row m-0 p-3">
        <div class="col-md-4">
            <div class="mt-2">
                <span class="h5 fw-bold">Sessions Devices</span>
                <div class="text-muted lh-sm mt-1">
                    This is a list of devices that have logged into your account. Revoke any sessions that you do not recognize.
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(count($sessions) === 0)
                <div class="card-body text-center mt-3 mb-3">
                    <span class="iconify text-primary h1 mb-2" data-icon="uil:shield-question" data-inline="false"></span>
                    <div class="h5 text-muted">
                        Nothing has been logged!
                    </div>
                </div>
            @endif

            @foreach ($sessions as $session)
                @php
                    $agent = new Jenssegers\Agent\Agent();
                    $agent->setUserAgent($session->user_agent);
                @endphp
                <div class="flex items-center space-x-4 rounded-md -mx-2 py-2 px-3 mb-2 bg-gray-100 hover:bg-gray-50">
                    <a href="" class="flex-shrink-0 overflow-hidden relative">
                        @if ($agent->isPhone())
                            <span class="iconify text-secondary display-4 mb-0" data-icon="uil:mobile-android" data-inline="false"></span>
                        @else
                            <span class="iconify text-secondary display-4 mb-0" data-icon="uil:desktop" data-inline="false"></span>
                        @endif
                    </a>
                    <div class="flex-1">
                        <span class="text-base font-semibold capitalize">{{ $session->ip_address }}</span>
                        <div class="text-sm text-gray-500 mt-0.5">
                            <div class="small text-dark">
                                @if (session()->getId() === $session->id)
                                    <span class="text-primary">Your current session</span>
                                @else
                                    <span class="text-light">Last accessed on {{ carbon($session->last_activity)->format('M d, Y') }}</span>
                                @endif
                            </div>
                            @if ($agent->browser() and $agent->platform())
                                <div class="mt-0 small text-secondary" title="{{ $session->user_agent }}">
                                    <small>{{ $agent->browser() }} on {{ $agent->platform() }}</small>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(session()->getId() === $session->id)
                        <a href="javascript:;" class="flex items-center justify-center h-8 px-3 rounded-md text-sm font-semibold bg-red-500 text-white">
                            Revoke
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>