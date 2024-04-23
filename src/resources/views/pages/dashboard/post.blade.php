@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')

<body>
    <form action="/post" method="POST">
        @csrf
        <input type="text" name="content">
        <button>Share</button>
    </form>
</body>
