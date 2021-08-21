<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">
                
                @stack('sidebar-menu')

                <div id="logo">
                    <a href="{{ route('index') }}"> 
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        <img src="{{ asset('assets/images/logo-white.png') }}" class="logo_inverse" alt="Logo"> 
                        <img src="{{ asset('assets/images/logo.png') }}" class="logo_mobile" alt="">
                    </a>
                </div>
            </div>

            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i> 
                <input value="" type="text" class="form-control" placeholder="Search for Friends , Videos and more.." autocomplete="off">
            </div>

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
                            <a href="{{ route('index') }}" class="user">
                                <div class="user_avatar">
                                    <img src="{{ Helper::getCDNImage(me()->image, 80) }}" alt="{{ me()->name }}">
                                </div>
                                <div class="user_name">
                                    <div>{{ me()->name }}</div>
                                    <span>{{ '@' . me()->username }}</span>
                                </div>
                            </a>
                            <hr class="border-gray-100">
                            <a href="">
                                <span class="iconify" data-icon="uil:user" data-inline="false"></span>
                                My Account 
                            </a>
                            <a href="">
                                <span class="iconify" data-icon="uil:shield-question" data-inline="false"></span>
                                Session Device
                            </a>
                        @endauth

                        <a href="#" id="night-mode" class="btn-night-mode">
                            <span class="iconify" data-icon="uil:moon" data-inline="false"></span> 
                            Night Mode
                            <span class="btn-night-mode-switch">
                                <span class="uk-switch-button"></span>
                            </span>
                        </a>

                        @auth
                            @if(me()->is_staff == 1)
                                <a href="">
                                    <span class="iconify" data-icon="uil:setting" data-inline="false"></span>
                                    Admin Console
                                </a>
                            @endif
                        @endauth

                        @auth
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}" data-prefetch="false"
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