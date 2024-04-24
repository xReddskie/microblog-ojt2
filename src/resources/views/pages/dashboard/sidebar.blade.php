@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')

<body>
    <aside class="d-dashboard__sidebar">
        <ul class="d-dashboard__side-nav">
            <a href="" class="d-dashboard__side-list"><li>Home</li></a>
            <a href="" class="d-dashboard__side-list"><li>Profile</li></a>
            <a href="" class="d-dashboard__side-list"><li>Friends</li></a>
            <a href="" class="d-dashboard__side-list"><li>Settings</li></a>
        </ul>
        <hr class="border border-gray-600 shadow:md w-full">
            <a href="{{ route('logout')}}" class="transition-transform hover:scale-150 hover:text-red-900"><div class="p-6 font-semibold">Logout</div></a>
    </aside>
</body>