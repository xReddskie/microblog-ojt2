@extends('pages.layouts.app')

@section('title', 'Login')

@section('content')


<body>
    <p>Your email is verified</p>
    @if(auth()->user()->status == null)
    @else
    <p>test( 0 = unverified, 1 = verified) status: <b>{{auth()->user()->status}}</b></p>
    @endif

    <a href="/logout">
        <button>logout</button>
    </a>
</body>

</html>
