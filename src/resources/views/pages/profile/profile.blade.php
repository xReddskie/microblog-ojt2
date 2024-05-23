@section('title', 'Profile')

@section('content')

<body>
    <div class="d-dashboard">
        @include('pages.dashboard.navbar')
        <div class="d-dashboard__main">
            <div class="d-dashboard__space"></div>
            @include('pages.profile.profile-info')
            <main class="d-dashboard__post-content">
                @include('pages.profile.profile-header')
                @if (auth()->user()->id == $user->id)
                    @include('pages.dashboard.post')
                @endif
                @if (auth()->user()->followees->contains($user->id) || auth()->user()->id == $user->id)
                    @include('pages.dashboard.post-content')
                @else  
                    @include('pages.dashboard.post-hidden')
                @endif
            </main>
            @include('pages.dashboard.aside')
            <div class="d-dashboard__space"></div>
        </div>
    </div>
</body>
