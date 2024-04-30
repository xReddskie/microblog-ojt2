@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')

<body>
<style>
    .top-negative {
        top: -205px;
    }
</style>
    <aside class="d-dashboard__sidebar sticky top-negative">
            <div class="flex flex-col items-start gap-2 bg-gray-50 m-1 p-2 border-2 border-mygray rounded-lg">
                <ul class="flex flex-col gap-2 border-2 border-mygray rounded-lg p-2 w-full h-full bg-beige" style="line-height: 1.2;">
                    <li>Lives in {{auth()->user()->profile->address}}</li>
                    <li>Contact Number: {{auth()->user()->profile->phone_number}}</li>
                    <li class="flex justify-center items-center bg-mygray w-full h-full rounded-lg text-white mt-2">
                        <a href="#" class="block p-2">Edit Profile</a>
                    </li>
                </ul>
                </div>
                <ul class="d-dashboard__side-nav">
                    <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Home page">Home</a></li>
                    <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Profile page">Profile</a></li>
                    <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Friends page">Friends</a></li>
                    <li class="d-dashboard__side-list"><a href="#" aria-label="Go to Settings page">Settings</a></li>
                    <hr class="border border-gray-600 mt-2 mb-2 shadow:md w-full">
                    <li class="d-dashboard__side-list"><a href="{{ route('logout')}}" aria-label="Logout Account" class="transition-transform hover:scale-150 hover:text-red-900">Logout</a></li>
            </ul>
    </aside>
</body>
