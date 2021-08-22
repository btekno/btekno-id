<li class="list-group-item py-2 d-flex align-items-center">
    @php
        $user = App\Models\User::find($activity->causer_id);
        if (!$user) {
            $user = \App\Models\User::whereUsername('ghost')->first();
        }
        $agent = new Jenssegers\Agent\Agent();
        $agent->setUserAgent($activity->getExtraProperty('user_agent'));
    @endphp
    <a href="{{ route('members.index', ['username' => $user->username]) }}">
        <img loading=lazy class="avatar-30 rounded-2 me-3" src="{{ Helper::getCDNImage($user->image, 80) }}" height="35" width="35" alt="{{ $user->username }}'s avatar" />
    </a>
    <div class="w-100">
        <div>
            <div class="text-muted d-flex justify-content-between">
                <span>
                    @if (count($activity->properties) !== 0)
                        @if ($activity->getExtraProperty('type') === 'Staff')
                            🛡 Staff
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Auth')
                            🚪 Auth
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Task')
                            ✅ Task
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Answer')
                            💬 Answer
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Comment')
                            💬 Comment
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Reply')
                            📢 Reply
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Question')
                            ❓ Question
                        @endif
                        @if ($activity->getExtraProperty('type') === 'User')
                            👤 User
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Product')
                            📦 Product
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Milestone')
                            ⛳ Milestone
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Notification')
                            🔔 Notification
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Search')
                            🔍 Search
                        @endif
                        @if ($activity->getExtraProperty('type') === 'Throttle')
                            🛑 Throttled
                        @endif
                    @else
                        🌐 Others
                    @endif
                    <span> - {{ $activity->description }}</span>
                </span>
                <a href="{{ route('members.index', ['username' => $user->username]) }}" class="fw-bold user-popover float-end"
                    data-id="{{ $user->id }}">
                    {{ '@' . $user->username }}
                </a>
            </div>
        </div>
        <div class="mt-0 small d-flex justify-content-between">
            <small>
                @can('staff.ops')
                    <span class="text-secondary" title="Log ID">Log ID: {{ $activity->id }}</span>
                    -
                @endcan

                @if($activity->getExtraProperty('ip'))
                    -
                    <a class="fw-bold text-muted" href="https://ipinfo.io/{{ $activity->getExtraProperty('ip') }}"
                        target="_blank" rel="noreferrer">
                        {{ Str::limit($activity->getExtraProperty('ip'), 15, '..') }}
                    </a>
                    -
                @endif

                @if($activity->getExtraProperty('location'))
                    <span class="text-muted">{{ $activity->getExtraProperty('location') }}</span>
                    -
                @endif

                @if($activity->getExtraProperty('user_agent'))
                    @if($agent->browser() and $agent->platform())
                        @if ($agent->isPhone())
                            <x-heroicon-o-device-mobile class="heroicon text-secondary float-start mr-1" />
                        @else
                            <x-heroicon-o-desktop-computer class="heroicon text-secondary float-start mr-1" />
                        @endif
                        <span class="text-muted" title="{{ $activity->getExtraProperty('user_agent') }}">
                            {{ $agent->browser() }} on {{ $agent->platform() }}
                        </span>
                    @else
                        <span title="{{ $activity->getExtraProperty('user_agent') }}">
                            <x-heroicon-o-lightning-bolt class="heroicon heroicon-icon text-secondary" />
                        </span>
                    @endif
                @endif
            </small>
            <small class="float-end text-secondary">
                {{ carbon($activity->created_at)->diffForHumans() }}
            </small>
        </div>
    </div>
</li>
