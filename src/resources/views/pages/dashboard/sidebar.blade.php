@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')

<body>
    <aside class="d-dashboard__sidebar">
        <ul class="d-dashboard__side-nav">
            <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Home page">Home</a></li>
            <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Profile page">Profile</a></li>
            <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Friends page">Friends</a></li>
            <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Settings page">Settings</a></li>
        </ul>
        <hr class="border border-gray-600 shadow:md w-full">
            <a href="{{ route('logout')}}" class="transition-transform hover:scale-150 hover:text-red-900"><div class="p-6 font-semibold">Logout</div></a>
    </aside>
</body>
