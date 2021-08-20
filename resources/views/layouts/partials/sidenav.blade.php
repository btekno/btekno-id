<div class="side-nav">
    <div class="side-nav-bg"></div>
    <ul>
        <li>
            <a href="" class="{{ request()->getHttpHost() === 'btekno.id' ? 'active' : '' }}">
                <div class="side-nav-link">
                    <img src="https://tailwindspace.com/demos/yootube/assets/images/icons/home.png">
                </div>
            </a>
        </li>
        <li>
            <a href="" class="{{ request()->getHttpHost() === 'komix.btekno.id' ? 'active' : '' }}">
                <div class="side-nav-link">
                    <img src="https://tailwindspace.com/demos/yootube/assets/images/icons/games.png">
                </div>
                <span class="tooltips">Komix</span>
            </a>
        </li>
        <li>
            <a href="" class="{{ request()->getHttpHost() === 'today.btekno.id' ? 'active' : '' }}">
                <div class="side-nav-link">
                    <img src="https://tailwindspace.com/demos/yootube/assets/images/icons/explore.png">
                </div>
                <span class="tooltips">To;Day</span>
            </a>
        </li>
        <li>
            <a href="" class="{{ request()->getHttpHost() === 'kamus.btekno.id' ? 'active' : '' }}">
                <div class="side-nav-link">
                    <img src="https://tailwindspace.com/demos/yootube/assets/images/icons/bookmark.png">
                </div>
                <span class="tooltips">Qamus</span>
            </a>
        </li>
    </ul>
</div>