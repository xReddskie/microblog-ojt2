@section('content')

<body>
  <form id="postContent" action="{{route('post')}}" method="POST"> 
    @csrf 
    <div class="d-dashboard__create-post">
      <label for="large-input" class="text-lg font-semibold">Share your mind with us</label>
      <div class="mt-2 mb-5">
        <input type="text" id="large-input" class="d-dashboard__write-post" name='content'>
      </div>
      <div class="flex justify-between items-center">
        <a href="">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 transition-transform transform hover:stroke hover:scale-150 ml-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
          </svg>
        </a>
        <button id="shareButton" class="d-dashboard__post-btn">Post</button>
      </div>
    </div>
  </form>
</body>
