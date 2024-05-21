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
                        <div class="py-1"></div>
                            @if (auth()->user()->id == $user->id)
                                @include('pages.dashboard.post')
                            @endif
                        @include('pages.dashboard.post-content')
                    </main>
                @include('pages.dashboard.aside')
            <div class="d-dashboard__space"></div>
        </div>
    </div>
</body>
