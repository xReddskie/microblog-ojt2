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

        <script>
            document.querySelectorAll('.like-button').forEach(button => {
                button.addEventListener('click', () => {
                    const postId = button.dataset.postId;
                    const isLiked = button.classList.contains('liked');
                    const url = isLiked ? `/posts/${postId}/unlike` : `/posts/${postId}/like`;

                    fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
                        .then(response => response.json())
                        .then(data => {
                            button.classList.toggle('liked');
                            button.querySelector('.like-text').textContent = isLiked ? 'Like' : 'Unlike';
                    });
                })
                    .catch(error => console.error('Error:', error));
            });
        </script>
@endauth