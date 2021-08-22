<div class="sidebar">
    <div class="sidebar_inner" data-simplebar>
        <ul>
            <li class="{{ Route::is('member.settings.profile') ? 'active' : '' }}">
                <a href="{{ route('member.settings.profile') }}">
                    <span class="iconify" data-icon="uil:user-circle" data-inline="false"></span>
                    <span>Profile</span>
                </a>
            </li>
            <li class="{{ Route::is('member.settings.account') ? 'active' : '' }}">
                <a href="{{ route('member.settings.account') }}">
                    <span class="iconify" data-icon="uil:at" data-inline="false"></span>
                    <span>Account</span>
                </a>
            </li>
            <li class="{{ Route::is('member.settings.password') ? 'active' : '' }}">
                <a href="{{ route('member.settings.password') }}">
                    <span class="iconify" data-icon="uil:lock-alt" data-inline="false"></span>
                    <span>Password</span>
                </a> 
            </li>
            <li class="{{ Route::is('member.settings.appearance') ? 'active' : '' }}">
                <a href="{{ route('member.settings.appearance') }}">
                    <span class="iconify" data-icon="uil:image-edit" data-inline="false"></span>
                    <span>Appearance</span>
                </a> 
            </li>
            <li class="{{ Route::is('member.settings.notifications') ? 'active' : '' }}">
                <a href="{{ route('member.settings.notifications') }}">
                    <span class="iconify" data-icon="uil:bell" data-inline="false"></span>
                    <span>Notifications</span>
                </a> 
            </li>
            <li class="{{ Route::is('member.settings.api') ? 'active' : '' }}">
                <a href="{{ route('member.settings.api') }}">
                    <span class="iconify" data-icon="uil:arrow" data-inline="false"></span>
                    <span>API</span>
                </a> 
            </li>
            <li class="{{ Route::is('member.settings.sessions') ? 'active' : '' }}">
                <a href="{{ route('member.settings.sessions') }}">
                    <span class="iconify" data-icon="uil:shield-question" data-inline="false"></span>
                    <span>Session Devices</span>
                </a> 
            </li>
            <li class="{{ Route::is('member.settings.logs') ? 'active' : '' }}">
                <a href="{{ route('member.settings.logs') }}">
                    <span class="iconify" data-icon="uil:stopwatch" data-inline="false"></span>
                    <span>Logs</span>
                </a> 
            </li>
            <li class="{{ Route::is('member.settings.data') ? 'active' : '' }}">
                <a href="{{ route('member.settings.data') }}">
                    <span class="iconify" data-icon="uil:server-network-alt" data-inline="false"></span>
                    <span>Data</span>
                </a> 
            </li>

            <li class="{{ Route::is('member.settings.delete') ? 'bg-danger text-white' : '' }}">
                <a href="{{ route('member.settings.delete') }}" class="{{ Route::is('member.settings.delete') ? 'text-white' : '' }}">
                    <span class="iconify" data-icon="uil:trash-alt" data-inline="false"></span>
                    <span>Danger Zone</span>
                </a> 
            </li>
        </ul>
    </div>
</div> 