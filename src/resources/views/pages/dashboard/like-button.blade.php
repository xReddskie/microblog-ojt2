@auth
    @if (Auth::user()->likesPost($post))
        <form action="{{ route('unlike.post', $post->id) }}" method="POST">
            @csrf
        @else
            <form action="{{ route('like.post', $post->id) }}" method="POST">
                @csrf
    @endif
    <button type="submit" class="d-dashboard__like-comm">
        <span class="flex justify-center items-center gap-2 text-sm">
            @include('svg.like')
    </button>
    </form>
@endauth
