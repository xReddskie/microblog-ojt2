@auth
    @php
        $isLiked = auth()->user()->likes->where('post_id', $post->id)->isNotEmpty();
    @endphp

    <button id="like-button-{{ $post->id }}" class="d-dashboard__like-comm like-button"
        onclick="toggleLike({{ $post->id }})">
        <span class="flex justify-center items-center gap-2 text-sm">
            @include('svg.like')
            <span class="like-text">{{ $isLiked ? 'Unlike' : 'Like' }}</span>
        </span>
    </button>
@endauth
<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.toggleLike = function(postId) {
            const likeButtonElement = document.getElementById(`like-button-${postId}`);
            const isLiked = likeButtonElement.classList.contains('liked');
            const url = isLiked ? `/post/${postId}/unlike` : `/post/${postId}/like`;
            const likeText = isLiked ? 'Like' : 'Unlike';

            axios.post(url, {
                _token: '{{ csrf_token() }}'
            })
            .then(response => {
                const likesCount = response.data.likes_count;
                const likeUsers = response.data.like_users;

                const likesCountElement = document.getElementById(`likes-count-${postId}`);
                if (likesCountElement) {
                    likesCountElement.textContent = `${likesCount} likes`;
                }

                const likeUsersElement = document.getElementById(`like-users-${postId}`);
                if (likeUsersElement) {
                    likeUsersElement.innerHTML = '';

                    likeUsers.slice(0, 10).forEach(user => {
                        const userElement = document.createElement('div');
                        userElement.textContent = user;
                        likeUsersElement.appendChild(userElement);
                    });

                    if (likesCount > 10) {
                        const moreElement = document.createElement('div');
                        moreElement.textContent = `and ${likesCount - 10} more...`;
                        likeUsersElement.appendChild(moreElement);
                    }
                }

                // Toggle the like button class and text
                likeButtonElement.classList.toggle('liked');
                const likeButtonText = likeButtonElement.querySelector('.like-text');
                likeButtonText.textContent = likeText;
            })
            .catch(error => {
                console.error('Error toggling like:', error);
            });
        }
    });
</script>