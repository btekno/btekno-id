{{-- <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
<div class="header_search"><i class="uil-search-alt"></i> 
    <input type="text" wire:model="query" id="search-input" name="q" class="form-control" placeholder="Search for Friends, News, Videos and more.." autocomplete="off">
</div>
<div uk-drop="mode: click" class="header_search_dropdown uk-drop uk-open uk-drop-bottom-left" style="left: 0px; top: 44px;">           
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
</div>
 --}}

<div class="d-none d-md-block me-3">
    <div class="header_search">
        <i class="uil-search-alt"></i> 
        <input type="text" id="search-input" name="q" aria-label="Search SS"  class="form-control" placeholder="Search for Friends, News, Videos and more.." wire:model="query" />
        <div class="header_search_dropdown w-100 mt-1 uk-drop uk-open uk-drop-bottom-left shadow-sm border-1" style="z-index:3;@if(empty($query)) display:none!important; @endif">
            <ul class="ps-0 mb-0">
                @if (!empty($query))
                    <li class="d-flex border-0 p-2">
                        <x-heroicon-o-users class="heroicon me-1" />
                        <span class="h5 mb-0">Users</span>
                    </li>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <li>
                                <a href="{{ route('members.index', ['username' => $user->username]) }}">  
                                    <img loading=lazy class="list-avatar"
                                        src="{{ Helper::getCDNImage($user->image, 80) }}" height="30" width="30"
                                        alt="{{ $user->username }}'s avatar" />
                                    <div class="list-name lh-1">
                                        <span class="fw-bold">
                                            @if ($user->name)
                                                {{ $user->name }}
                                            @else
                                                {{ $user->username }}
                                            @endif
                                        </span>
                                        @if($user->is_verified)
                                            <x-heroicon-s-badge-check class="heroicon ms-1 text-primary verified d-inline" />
                                        @endif
                                        <br/>
                                        <small><span class="small text-muted">{{ '@' . $user->username }}</span></small>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="text-secondary">We couldn’t find any users matching <span class="fw-bold">{{ $query }}</span>!</li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>