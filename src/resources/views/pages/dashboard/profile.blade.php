@extends('pages.layouts.app')

@section('title', 'Profile')

@section('content')

<body>
    <div class="d-dashboard">
        @include('pages.dashboard.navbar')
        <div class="d-dashboard__main">
            <div class="d-dashboard__space"></div>
                @include('pages.dashboard.sidebar')
                    <main class="d-dashboard__post-content">
                        @include('pages.dashboard.post')
                        @include('pages.dashboard.post-content')
                    </main>
            <div class="d-dashboard__space"></div>
        </div>
    </div>
</body>