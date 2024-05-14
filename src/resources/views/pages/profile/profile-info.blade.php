@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')

<body>
    <style>
        .top-negative {
            top: -205px;
        }
    </style>
    <aside class="p-profile__aside">
        <ul class="d-dashboard__side-nav">
            <div class="flex flex-col items-center w-full">
                <div class="w-20 h-20 border-2 border-white rounded-full overflow-hidden relative">
                    <img class="object-cover w-20 h-20"
                        src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                        alt='Woman looking front'>
                </div>
                <div class="flex flex-col justify-center pl-2 items-center">
                    <div class="text-sm text-xl font-bold">
                        {{ auth()->user()->profile->first_name }}
                        {{ auth()->user()->profile->middle_name ? auth()->user()->profile->middle_name[0] . '.' : '' }}
                        {{ auth()->user()->profile->last_name }}
                    </div>
                    <div class="text-sm font-normal">
                        {{ auth()->user()->email }}
                    </div>
                </div>
            </div>
            <hr class="border border-gray-600 mt-2 mb-2 shadow:md w-full">
            <div class="p-profile__icons">
                <div class="col-span-2">
                    <li class="d-dashboard__side-list">
                        <svg class="h-15 w-15 text-black-500" width="1.3em" height="1.7em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                </div>
                <div class="col-span-2 text-lg hover:scale-150"><a href="#" aria-label="Go to Home page">Home</a></div>
                </li>
            </div>
            <div class="p-profile__icons">
                <div class="col-span-2">
                    <li class="d-dashboard__side-list">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                </div>
                <div class="col-span-2 text-lg hover:scale-150"><a href="#" aria-label="Go to Profile page">Profile</a>
                </div>
                </li>
            </div>
            <div class="p-profile__icons">
                <div class="col-span-2">
                    <li class="d-dashboard__side-list">
                        <svg class="h-6 w-6 text-black-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                </div>
                <div class="col-span-2 text-lg hover:scale-150"><a href="#" aria-label="Go to Friends page">Friends</a>
                </div>
                </li>
            </div>
            <div class="p-profile__icons">
                <div class="col-span-2">
                    <li class="d-dashboard__side-list">
                        <svg class="h-6 w-6 text-black-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                </div>
                <div class="col-span-2 text-lg hover:scale-150"><a href="#"
                        aria-label="Go to Settings page">Settings</a></div>
                </li>
            </div>
            <hr class="border border-gray-600 mt-2 mb-2 shadow:md w-full">
            <div class="p-profile__icons">
                <div class="col-span-2">
                    <li class="d-dashboard__side-list">
                        <svg class="h-15 w-15 text-black-500" width="1.3em" height="1.7em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                </div>
                <div class="p-profile__logout"><a href="{{ route('logout') }}" aria-label="Logout Account">Logout</a>
                </div>
                </li>
            </div>
        </ul>
    </aside>
</body>
