<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">
                
                @stack('sidebar-menu')

                <div id="logo">
                    <a href="{{ route('index') }}"> 
                        <img src="assets/images/logo.png" alt="">
                        <img src="assets/images/logo.png" class="logo_mobile" alt="">
                    </a>
                </div>
            </div>

            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i> 
                <input value="" type="text" class="form-control" placeholder="Search for Friends , Videos and more.." autocomplete="off">
                {{-- <div uk-drop="mode: click" class="header_search_dropdown">   
                    <h4 class="search_title"> Recently </h4>
                    <ul>
                        <li> 
                            <a href="#">  
                                <img src="assets/images/avatars/avatar-1.jpg" alt="" class="list-avatar">
                                <div class="list-name">  Erica Jones </div>
                            </a> 
                        </li> 
                        <li> 
                            <a href="#">  
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="list-avatar">
                                <div class="list-name">  Coffee  Addicts </div>
                            </a> 
                        </li>
                        <li> 
                            <a href="#">  
                                <img src="assets/images/avatars/avatar-3.jpg" alt="" class="list-avatar">
                                <div class="list-name"> Mountain Riders </div>
                            </a> 
                        </li>
                        <li> 
                            <a href="#">  
                                <img src="assets/images/avatars/avatar-4.jpg" alt="" class="list-avatar">
                                <div class="list-name"> Property Rent And Sale  </div>
                            </a> 
                        </li>
                        <li> 
                            <a href="#">  
                                <img src="assets/images/avatars/avatar-5.jpg" alt="" class="list-avatar">
                                <div class="list-name">  Erica Jones </div>
                            </a> 
                        </li>
                    </ul>
                </div> --}}
            </div>

            <div class="right_side">

                <div class="header_widgets">
                    @auth
                        <a href="#" aria-expanded="false">
                            <img src="assets/images/avatars/avatar-2.jpg" class="is_avatar" alt="">
                        </a>
                    @else
                        <a href="#" class="is_link">Login or Register</a>
                    @endauth
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                        <a href="#" id="night-mode" class="btn-night-mode">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                              </svg>
                             Night mode
                            <span class="btn-night-mode-switch">
                                <span class="uk-switch-button"></span>
                            </span>
                        </a>

                        @auth
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}" data-prefetch="false"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <x-heroicon-o-logout class="heroicon heroicon-18px text-secondary" />
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Login or Register
                            </a>    
                        @endauth                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</header>