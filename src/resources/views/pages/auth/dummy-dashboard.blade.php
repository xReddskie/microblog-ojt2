@extends('pages.layouts.app')

@section('title', 'Dashboard')

@section('content')

<body>
    @include('pages.dashboard.post')

    <a href="/logout">
        <button>logout</button>
    </a>
</body>

</html>
