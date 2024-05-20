@section('content')

<body>
  @foreach($posts as $post)
  <div id="container" class="d-dashboard__post-container relative">
      <div id="filter{{$post->id}}" class="filter"></div>
      <div class="flex justify-between font-semibold py-3 text-xl">
          <span><a href="{{ route('user.profile', ['id' => $post->user->id]) }}">{{$post->user->username}} </a><span class="font-thin">{{ $post->created_at->diffForHumans() }}</span></span>
          @if ($post->user_id === auth()->id())
              <div id="mySidenav{{$post->id}}" class="sidenav z-20 bg-mygray flex flex-col justify-center items-center">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav({{$post->id}})">&times;</a>
                    <form action="{{route('delete.post', ['post' => $post])}}" method="post">
                        @csrf
                        @method('DELETE') 
                        <button><p class="delete">Delete</p></button>
                    </form>
                    <a class="hover:text-white" href="{{route('view.post', ['post' => $post->id])}}">Edit</a>
              </div>
              <span style="cursor:pointer;" onclick="openNav({{$post->id}})">
              @include('svg.kebab')
              </span>
          @endif
      </div>

      <div class="mt-2 relative w-2/3">{{$post->content}}</div> 
     
      {{-- Image Display --}}
      @if ($post->photos->count() > 0) 
          <div class="d-dashboard__image">
              @foreach($post->photos as $photo)
                  @php
                      $cleanedPath = str_replace('public/', '', $photo->img_file);
                  @endphp
                  <img src="{{ asset('storage/' . $cleanedPath) }}" alt="Post Image" class="w-full h-full rounded-lg">
              @endforeach
          </div>
      @endif

<div class="py-3">
      <div class="flex justify-evenly mt-2 relative border-t border-b border-gray-400 pt-3">
      
    @include('pages.dashboard.like-button')
          <!-- comment -->

      <span href="" class="d-dashboard__like-comm cursor-pointer" onclick="openComment({{$post->id}})">
                <span class="flex justify-center items-center gap-2">
                  @include('svg.comment')
                  Comment
              </span>
            </span>

  </div>

  <div id="comment{{$post->id}}" class="d-dashboard__border-gray mb-2 flex p-2 items-center w-full hidden transition-all duration-300">
    <div class="flex flex-col h-max-64 w-full">
      <div>
        <form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="POST">
            @csrf
              <label for="comment" class="w-full">Comment as <span class="font-semibold">{{auth()->user()->username}}<span></label>
              <div class="flex flex-end items-center gap-2">
                <textarea class="d-dashboard__border-gray w-full mt-2 p-2 rounded-lg" name="content" placeholder="Enter your comment here"></textarea>
                <button class="py-5 px-10 me-2 mt-1 text-sm font-medium text-gray-100 focus:outline-none bg-mygray rounded-lg border border-mygray focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="submit">Comment</button>
              </div>
        </form>
      </div>
      <div>
          <ul class="rounded-lg max-h-40 overflow-y-scroll scrollbar-hidden">
            @foreach ($post->comments->reverse() as $comment)
              <div class="flex flex-col gap-2 p-1 bg-white border-t border-b border-gray-400">
                <div class="relative">
                  <li class="font-semibold">&commat;{{ $comment->user->username}}
                  @if($post->user_id === $comment->user_id)
                      <span class="font-thin">(Author) </span>
                  @endif
                    <span class="font-thin"> {{ $comment->created_at->diffForHumans() }}</span>
                  </li>
                  @if ($comment->user_id == auth()->id() || $post->user_id == auth()->id())
                  <form action="{{ route('delete.comment', ['comment' => $comment->id]) }}" method="POST" class="absolute right-0 top-0">
                    @csrf
                    @method('DELETE')
                    <button class="d-dashboard__aside-btns">Delete</button>
                  </form> 
                  @endif
                </div>
                <li class="ml-10">{{ $comment->content }}</li>
              </div>
            @endforeach
          </ul>
      </div>
    </div>
      </div>
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

  function openComment(postId){
    const comment = document.getElementById("comment" + postId);
    const container = document.getElementById("container" + postId);
    comment.classList.toggle("hidden");
  }
</script>
</body>
