<aside class="d-dashboard__aside">
    <div class="d-dashboard__bgcolor">
        <div class="d-dashboard__aside-about">
            <ul class="d-dashboard__aside-ul" style="line-height: 1.2;">
                <li class="text-xl font-bold">About me</li>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                        </svg>
                        <span>{{ auth()->user()->profile->birth_date }}</span> <!-- Phone number -->
                        <li class="text-xl font-bold">About
                            @if (auth()->user()->id == $user->id)
                                me
                            @else
                                {{ $user->username }}
                            @endif
                        </li>
                        <div class="d-dashboard__aside-container">
                            <div class="d-dashboard__aside-icons-center">
                                @include('svg.birthday')
                                <span>{{ $user->profile->birth_date }}</span> <!-- Phone number -->
                            </div>
                        </div>
                        <div class="d-dashboard__aside-container">
                            <div class="d-dashboard__aside-icons-ctop">
                                <li class="d-dashboard__side-list">
                                    <<<<<<< HEAD <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                            </div>
                            <div class="">
                                {{ auth()->user()->profile->address }}
                            </div>
                            </li>
                        </div>
                        <div class="d-dashboard__aside-container"> <!-- Reduced gap from 2 to 1 -->
                            <div class="d-dashboard__aside-icons-center"> <!-- To align SVG and text in the same row -->
                                <svg class="h-7 w-7 text-black-700 mr-2" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                    <path d="M15 7a2 2 0 0 1 2 2" />
                                    <path d="M15 3a6 6 0 0 1 6 6" />
                                </svg>
                                <span>{{ auth()->user()->profile->phone_number }}</span> <!-- Phone number -->
                            </div>
                        </div>
                        <li class="d-dashboard__aside-aboutbtn">
                            <a href="/profile/edit" class="p-2">Edit Profile</a>
                        </li>
                        =======
                        @include('svg.location')
                    </div>
                    <div class="">
                        {{ $user->profile->address }}
                    </div>
                    </li>
                </div>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-center">
                        @include('svg.phone')
                        <span>{{ $user->profile->phone_number }}</span>
                    </div>
                </div>
                @if (auth()->user()->id == $user->id)
                    <li class="d-dashboard__aside-aboutbtn">
                        <a href="/profile/edit" class="p-2">Edit Profile</a>
                    </li>
                @endif
                >>>>>>> 6568e9d (added image upload in profile picture)
        </div>
        <div class="d-dashboard__user">
            <div class="font-semibold">Suggestions</div>
            <!-- User suggest number 1 -->
            <hr class="d-dashboard__user-hr">
            <div class="pt-1">User 1</div>
            <div class="pt-2">
                <button type="button" class="d-dashboard__aside-btns">Follow</button>
            </div>
            <!-- User suggest number 2 -->
            <hr class="d-dashboard__user-hr">
            <div class="pt-1">User 1</div>
            <div class="pt-2">
                <button type="button" class="d-dashboard__aside-btns">Follow</button>
            </div>
        </div>
    </div>
    <div class="d-dashboard__bgcolor">
        <div class="d-dashboard__aside-about">
            <ul class="d-dashboard__aside-ul" style="line-height: 1.2;">
                <<<<<<< HEAD <li class="text-xl font-bold">About
                    @if (auth()->user()->id == $user->id)
                        me
                    @else
                        {{ $user->username }}
                    @endif
                    </li>
                    =======
                    <li class="text-xl font-bold">About me</li>
                    >>>>>>> 6568e9d (added image upload in profile picture)
                    <div class="d-dashboard__aside-container">
                        <div class="d-dashboard__aside-icons-center">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                            </svg>
                            <<<<<<< HEAD <span>{{ $user->profile->birth_date }}</span> <!-- Phone number -->
                                =======
                                <span>{{ auth()->user()->profile->birth_date }}</span> <!-- Phone number -->
                                >>>>>>> 6568e9d (added image upload in profile picture)
                        </div>
                    </div>
                    <div class="d-dashboard__aside-container">
                        <div class="d-dashboard__aside-icons-ctop">
                            <li class="d-dashboard__side-list">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                        </div>
                        <div class="">
                            <<<<<<< HEAD {{ $user->profile->address }}======={{ auth()->user()->profile->address }}>
                                >>>>>> 6568e9d (added image upload in profile picture)
                        </div>
                        </li>
                    </div>
                    <div class="d-dashboard__aside-container"> <!-- Reduced gap from 2 to 1 -->
                        <div class="d-dashboard__aside-icons-center"> <!-- To align SVG and text in the same row -->
                            <svg class="h-7 w-7 text-black-700 mr-2" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                <path d="M15 7a2 2 0 0 1 2 2" />
                                <path d="M15 3a6 6 0 0 1 6 6" />
                            </svg>
                            <<<<<<< HEAD <span>{{ $user->profile->phone_number }}</span> <!-- Phone number -->
                        </div>
                    </div>
                    @if (auth()->user()->id == $user->id)
                        <li class="d-dashboard__aside-aboutbtn">
                            <a href="/profile/edit" class="p-2">Edit Profile</a>
                        </li>
                    @endif
        </div>
        <div class="d-dashboard__user">
            <div class="font-semibold">Suggestions</div>
            <!-- User suggest number 1 -->
            <hr class="d-dashboard__user-hr">
            <div class="pt-1">User 1</div>
            <div class="pt-2">
                <button type="button" class="d-dashboard__aside-btns">Follow</button>
            </div>
            <!-- User suggest number 2 -->
            <hr class="d-dashboard__user-hr">
            <div class="pt-1">User 1</div>
            <div class="pt-2">
                <button type="button" class="d-dashboard__aside-btns">Follow</button>
            </div>
        </div>
    </div>
    <div class="d-dashboard__bgcolor">
        <div class="d-dashboard__aside-about">
            <ul class="d-dashboard__aside-ul" style="line-height: 1.2;">
                <li class="text-xl font-bold">About
                    @if (auth()->user()->id == $user->id)
                        me
                    @else
                        {{ $user->username }}
                    @endif
                </li>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-center">
                        @include('svg.birthday')
                        <span>{{ $user->profile->birth_date }}</span> <!-- Phone number -->
                    </div>
                </div>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-ctop">
                        <li class="d-dashboard__side-list">
                            @include('svg.location')
                    </div>
                    <div class="">
                        {{ $user->profile->address }}
                    </div>
                    </li>
                </div>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-center">
                        @include('svg.phone')
                        <span>{{ $user->profile->phone_number }}</span>
                    </div>
                </div>
                @if (auth()->user()->id == $user->id)
                    <li class="d-dashboard__aside-aboutbtn">
                        <a href="/profile/edit" class="p-2">Edit Profile</a>
                    </li>
                @endif
                =======
                <span>{{ auth()->user()->profile->phone_number }}</span> <!-- Phone number -->
        </div>
    </div>
    <li class="d-dashboard__aside-aboutbtn">
        <a href="/profile/edit" class="p-2">Edit Profile</a>
    </li>
    >>>>>>> 6568e9d (added image upload in profile picture)
    </div>
    <div class="d-dashboard__user">
        <div class="font-semibold">Suggestions</div>
        <!-- User suggest number 1 -->
        <hr class="d-dashboard__user-hr">
        <div class="pt-1">User 1</div>
        <div class="pt-2">
            <button type="button" class="d-dashboard__aside-btns">Follow</button>
        </div>
        <!-- User suggest number 2 -->
        <hr class="d-dashboard__user-hr">
        <div class="pt-1">User 1</div>
        <div class="pt-2">
            <button type="button" class="d-dashboard__aside-btns">Follow</button>
        </div>
    </div>
    </div>
</aside>
