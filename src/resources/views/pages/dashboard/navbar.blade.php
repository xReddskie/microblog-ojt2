@section('content')

    <body>
        <header>
            <nav class="d-dashboard__navigation">
                <div class="d-dashboard__hidden-menu">
                    <!-- burger menu shows when sm -->
                    <input type="checkbox" id="toggle-menu" class="hidden" />
                    <div for="toggle-menu" class="cursor-pointer">
                        @include('svg.burger')
                    </div>
                    <div class="menu bg-mygray fixed left-0 sm:flex hidden"
                        style="height: calc(100vh - 4rem); width: 12rem; top: 4rem;">
                        <ul class="">
                            <li>
                                <a href="#" aria-label="Go to Home page" class="d-dashboard__hidden-list">Home</a>
                            </li>
                            <li>
                                <a href="#" aria-label="Go to Profile page"
                                    class="d-dashboard__hidden-list">Profile</a>
                            </li>
                            <li>
                                <a href="#" aria-label="Go to Followers list"
                                    class="d-dashboard__hidden-list">Followers</a>
                            </li>
                            <li>
                                <a href="#" aria-label="Go to Settings page"
                                    class="d-dashboard__hidden-list">Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" aria-label="Logouts current user"
                                    class="d-dashboard__hidden-list">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-dashboard__logo-lg"><a href="{{ route('dashboard', ['id' => auth()->id()]) }}">Microblog
                        Ojt2</a></div>
                <div class="d-dashboard__logo-sm">
                    @include('svg.logo')
                </div>
                <div class="d-dashboard__search">
                    <input placeholder="Post Content" id="small-input" class="d-dashboard__search-bar">
                    <button type="button" class="d-dashboard__search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                <div class="d-dashboard__username">
                    <div class="flex items-center gap-3 mb-2 rounded-lg">
                        <div class="w-10 h-10 border-2 border-white rounded-full overflow-hidden relative">
                            <img class="object-cover w-full h-full" src='{{ auth()->user()->profile->getImageURL() }}'
                                alt='Profile Picture'>
                        </div>
                        <a href="{{ route('user.profile', ['id' => auth()->id()]) }}">Hello,
                            {{ auth()->user()->username }}!</a>
                    </div>
                </div>
                <div class="hidden sm:flex"></div>
            </nav>
        </header>
    </body>
