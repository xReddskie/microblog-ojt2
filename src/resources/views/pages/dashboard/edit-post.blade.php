@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')

<body>
<div class="form-popup" id="myForm"> 
      <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="content" value="{{$post->content}}">
          <button><p class="edit">Post</p></button>
      </form>
      </div>
</body>
