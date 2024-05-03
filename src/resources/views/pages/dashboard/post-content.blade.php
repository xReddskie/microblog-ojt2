@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')

<body>
@foreach($posts as $post)
<div class="d-dashboard__post-container relative">
  <div id="filter{{$post->id}}" class="filter"></div>
  <div class="flex justify-between font-semibold shadow-md mb-1">
    <span>{{$post->user->username}}</span>
    @if ($post->user_id === auth()->id())
    <div id="mySidenav{{$post->id}}" class="sidenav bg-mygray flex justify-center items-center">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav({{$post->id}})">&times;</a>
      <form action="{{route('delete.post', ['post' => $post])}}" method="post">
        @csrf
        @method('DELETE')
          <button><p class="delete">Delete</p></button>
      </form>
      <a href="{{route('view.post', ['post' => $post->id])}}">Edit</a>
    </div>
    <span style="cursor:pointer;" onclick="openNav({{$post->id}})">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
      </svg>
    </span>
    @endif
  </div>
  <div class="mt-2">{{$post['content']}}</div>
  <div class="d-dashboard__image">Image here if there's any</div>
  <div class="flex justify-evenly mt-2">
    @include('pages.dashboard.like-button')
    <a href="" class="d-dashboard__like-comm">
      <span class="flex justify-center items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 fill-mygray">
          <path fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 0 1-.533-.074.75.75 0 0 1-.44-1.223 3.73 3.73 0 0 0 .814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 0 1-4.246.997Z" clip-rule="evenodd" />
        </svg> Comment </span>
    </a>
  </div>
</div>
@endforeach
<script>
  function openNav(postId) {
    document.getElementById("mySidenav" + postId).style.width = "100px";
    document.getElementById("filter" + postId).style.display = "block";
  }

  function closeNav(postId) {
    document.getElementById("mySidenav" + postId).style.width = "0";
    document.getElementById("filter" + postId).style.display = "none";
  }
</script>
</body>
