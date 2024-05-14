@section('title', 'Profile')

@section('content')

<body>
    <div class="d-dashboard">
        @include('pages.other-profile.other-navbar')
        <div class="d-dashboard__main">
            <div class="d-dashboard__space"></div>
                @include('pages.other-profile.other-profile-info')
                    <main class="d-dashboard__post-content">
                        @include('pages.other-profile.other-profile-header')
                        <div class="py-1"></div>
                        @include('pages.other-profile.other-post-content')
                    </main>
                @include('pages.other-profile.other-aside')
            <div class="d-dashboard__space"></div>
        </div>
    </div>
</body>
