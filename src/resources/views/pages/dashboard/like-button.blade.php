@auth
    @php
        $isLiked = auth()->user()->likes->where('post_id', $post->id)->isNotEmpty();
    @endphp

    @if ($isLiked)
        <form action="{{ route('unlike.post', $post->id) }}" method="POST" class="m-0 p-0">
            @csrf
    @else
        <form action="{{ route('like.post', $post->id) }}" method="POST" class="m-0 p-0">
            @csrf
    @endif
            <button type="submit" class="d-dashboard__like-comm like-button">
                <span class="flex justify-center items-center gap-2 text-sm">
                    @include('svg.like')
                    <span class="like-text">{{ $isLiked ? 'Unlike' : 'Like' }}</span>
                </span>
            </button>
        </form>
@endauth
