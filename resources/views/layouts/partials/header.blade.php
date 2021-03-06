<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">
                
                @stack('sidebar-menu')

                <div id="logo">
                    <a href="{{ route('index') }}"> 
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        <img src="{{ asset('assets/images/logo-light.png') }}" class="logo_inverse" alt="Logo"> 
                        <img src="{{ asset('assets/images/logo.png') }}" class="logo_mobile" alt="">
                    </a>
                </div>
            </div>

            <livewire:plugin.search />

            <div class="right_side">
                <div class="header_widgets">
                    @auth
                        <a href="#" aria-expanded="false">
                            <img loading=lazy src="{{ Helper::getCDNImage(me()->image, 80) }}" class="is_avatar" alt="{{ me()->username }}'s avatar">
                        </a>
                    @else
                        <a href="#" class="is_link">
                            Login or Register
                        </a>
                    @endauth
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                        @auth
                            <a href="{{ route('members.index', ['username' => me()->username]) }}" class="user">
                                <div class="user_avatar">
                                    <img src="{{ Helper::getCDNImage(me()->image, 80) }}" alt="{{ me()->name }}">
                                </div>
                                <div class="user_name">
                                    <div>{{ me()->name }}</div>
                                    <span>{{ '@' . me()->username }}</span>
                                </div>
                            </a>
                            <hr class="border-gray-700">
                            <a href="{{ route('members.index', ['username' => me()->username]) }}">
                                <span class="iconify" data-icon="uil:user" data-inline="false"></span>
                                My Account 
                            </a>
                            <a href="{{ route('member.settings.sessions') }}">
                                <span class="iconify" data-icon="uil:shield-question" data-inline="false"></span>
                                Session Device
                            </a>
                            <a href="{{ route('member.settings.profile') }}">
                                <span class="iconify" data-icon="uil:setting" data-inline="false"></span>
                                Settings
                            </a>

                            @if(me()->is_staff == 1)
                                <hr class="border-gray-700">
                                <a href="">
                                    <span class="iconify" data-icon="uil:setting" data-inline="false"></span>
                                    Admin Console
                                </a>
                            @endif
                            <hr class="border-gray-700">
                        @endauth

                        <a href="#" id="night-mode" class="btn-night-mode">
                            @if (Cookie::get('color_mode') === 'dark')
                                <span class="iconify" data-icon="uil:sun" data-inline="false"></span> 
                                Light Mode
                            @else
                                <span class="iconify" data-icon="uil:moon" data-inline="false"></span> 
                                Night Mode
                            @endif
                            <span class="btn-night-mode-switch">
                                <span class="uk-switch-button"></span>
                            </span>
                        </a>

                        @auth
                            <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#shortcutsModal">
                                <span class="iconify" data-icon="uil:keyboard" data-inline="false"></span>
                                Shortcuts
                            </a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" data-prefetch="false"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="iconify" data-icon="uil:signout" data-inline="false"></span>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}">
                                <span class="iconify" data-icon="uil:signin" data-inline="false"></span>
                                Login or Register
                            </a>    
                        @endauth                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</header>

<x-modals.shortcuts />
<x-modals.lightbox />