@section('content') 

<body>
  <header>
    <nav class="d-dashboard__navigation">
      <div class="d-dashboard__hidden-menu">
        <!-- burger menu shows when sm -->
        <input type="checkbox" id="toggle-menu" class="hidden" />
        <div for="toggle-menu" class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd"
              d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
              clip-rule="evenodd" />
          </svg>
        </div>
        <div class="menu bg-mygray fixed left-0 sm:flex hidden"
          style="height: calc(100vh - 4rem); width: 12rem; top: 4rem;">
          <ul class="">
            <li>
              <a href="#" aria-label="Go to Home page" class="d-dashboard__hidden-list">Home</a>
            </li>
            <li>
              <a href="#" aria-label="Go to Profile page" class="d-dashboard__hidden-list">Profile</a>
            </li>
            <li>
              <a href="#" aria-label="Go to Followers list" class="d-dashboard__hidden-list">Followers</a>
            </li>
            <li>
              <a href="#" aria-label="Go to Settings page" class="d-dashboard__hidden-list">Settings</a>
            </li>
            <li>
              <a href="{{ route('logout')}}" aria-label="Logouts current user"
                class="d-dashboard__hidden-list">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="d-dashboard__logo-lg"><a href="{{ route('dashboard', ['id' => auth()->id()]) }}">Microblog Ojt2</a>
      </div>
      <div class="d-dashboard__logo-sm">
        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
          viewBox="0,0,256,256">
          <g fill="#dad2c3" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"
            font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
            <g transform="scale(5.33333,5.33333)">
              <path
                d="M25,18.4c11,0 20,-2.4 20,-5.4c0,-1.1 -1.2,-2.1 -3.2,-2.9c0.8,0.5 1.2,1.1 1.2,1.7c0,2.6 -8.1,4.7 -18,4.7c-9.9,0 -18,-2.2 -18,-4.8c0,-0.6 0.4,-1.2 1.2,-1.7c-2,0.8 -3.2,1.9 -3.2,2.9c0,3 9,5.5 20,5.5z">
              </path>
              <path
                d="M25,21c-8.8,0 -16.3,-1.6 -19.9,-4h-0.1c0,2.3 0.8,4.7 1.9,7.1c-5.9,4.1 -4.8,14.9 5.1,12.9c0.5,-0.1 0.5,-0.5 0,-0.6c-3.9,-0.5 -7.9,-5.3 -4.1,-10.3c2.3,4.4 5.5,8.8 7.2,12.9v0c0.7,1.7 4.8,3 9.9,3c5.1,0 9.2,-1.3 9.9,-3v0c3,-7 10.1,-15 10.1,-22h-0.1c-3.6,2.4 -11.1,4 -19.9,4zM18,9c0,0 -4.9,-0.4 -4.9,2.2c0,1.1 0.8,2.6 4.2,2.6c3,0 6.8,-3.7 11.9,-3.7c3.7,0 3.7,2.5 0.7,2.5c-2,0 -3,-0.8 -3,-0.8c-0.6,-0.4 -1.3,0.4 -1,1.1c0,0 0,1.1 4,1.1c4,0 4.6,-1.9 4.5,-2.6c-0.1,-1.4 -1.4,-2.7 -3.5,-3.1c-1.9,-0.3 -4,-0.5 -7,0.6c-3,1.1 -5.1,3.1 -7.1,3.1c-2,0 -3.6,-2.3 1.2,-2c2.3,0.2 1,-1 0,-1z">
              </path>
            </g>
          </g>
        </svg>
      </div>
      <div class="d-dashboard__search">
        <form action="{{ route('users.search', ['id' => auth()->id()]) }}" method="GET" class="w-full p-0 m-0">
          <div class="relative flex justify-center items-center w-10/12 mx-auto">
            <input type="text" name="query" placeholder="Search" id="small-input" class="d-dashboard__search-bar">
            <button type="submit" class="d-dashboard__search-btn">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
      <div class="d-dashboard__username"><a href="{{ route('user.profile', ['id' => auth()->id()]) }}">Hello,
          {{auth()->user()->username}}!</a></div>
      <div class="hidden sm:flex"></div>
    </nav>
  </header>
</body>