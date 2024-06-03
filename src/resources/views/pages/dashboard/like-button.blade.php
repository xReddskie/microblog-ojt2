@auth
    <button type="button" class="d-dashboard__like-comm like-button" data-post-id="{{ $post->id }}" data-liked="{{ Auth::user()->likesPost($post) }}">
        <span class="flex justify-center items-center gap-2 text-sm">
            @include('svg.like')
            <span class="like-text">{{ Auth::user()->likesPost($post) ? 'Unlike' : 'Like' }}</span>
        </span>
    </button>
@endauth

<script>
$(document).ready(function () {
    $('.like-button').on('click', function () {
        const button = $(this);
        const postId = button.data('post-id');
        const isLiked = button.data('liked');
        const actionUrl = isLiked ? `/post/${postId}/unlike` : `/post/${postId}/like`;

        $.ajax({
            url: actionUrl,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    const likeText = button.find('.like-text');
                    likeText.text(isLiked ? 'Like' : 'Unlike');
                    button.data('liked', !isLiked);

                    $.ajax({
                        url: `/post/${postId}/likes-count`,
                        method: 'GET',
                        dataType: 'json',
                        success: function (countResponse) {
                            const likesCountElement = $(`#likes-count-${postId}`);
                            likesCountElement.text(countResponse.count + ' likes');
                        },
                        error: function (countError) {
                            console.error('Error fetching likes count:', countError);
                        }
                    });
                }
            },
            error: function (response) {
                alert('Error ' + (isLiked ? 'unliking' : 'liking') + ' post.');
            }
        });
    });
});
</script>
