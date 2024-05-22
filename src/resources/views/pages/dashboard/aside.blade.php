<aside class="d-dashboard__aside">
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
