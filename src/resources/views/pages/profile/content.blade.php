@if (!isset($x) || $x == 1)
    @if (auth()->user()->id == $user->id)
        @include('pages.dashboard.post')
    @endif
    @if (auth()->user()->followees->contains($user->id) || auth()->user()->id == $user->id)
        @include('pages.dashboard.post-content')
    @else  
        @include('pages.dashboard.post-hidden')
    @endif
@elseif ($x == 2)
    @include('pages.profile.nav.follower-lists')
@elseif ($x == 3)
    @include('pages.profile.nav.photos')
@elseif ($x == 4)
    @include('pages.profile.nav.about')
@endif
