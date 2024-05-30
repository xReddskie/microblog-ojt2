document.addEventListener('DOMContentLoaded', function () {
    // Modal related functions
    window.showOnlyPost = function (postId) {
        const post = document.getElementById('container-' + postId);
        const modal = document.getElementById('postModal');
        const modalContent = document.getElementById('modalPostContent');

        // Clone the post content and append to modal content
        const postClone = post.cloneNode(true);
        modalContent.innerHTML = '';
        modalContent.appendChild(postClone);

        // Show the modal
        modal.style.display = "block";

        // Hide the close button within the post clone (because we have a modal close button)
        const closeButton = postClone.querySelector('.close-button');
        if (closeButton) {
            closeButton.style.display = 'none';
        }
    }

    window.closeModal = function () {
        const modal = document.getElementById('postModal');
        modal.style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function (event) {
        const modal = document.getElementById('postModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Other functions
    window.openComment = function (postId) {
        const comment = document.getElementById("comment" + postId);
        comment.classList.toggle("hidden");
    }

    window.editComment = function (commentId) {
        const editForm = document.getElementById("editForm" + commentId);
        const commentContent = editForm.parentElement.querySelector('.comment-content');
        const commentActions = editForm.parentElement.querySelector('.comment-actions');

        editForm.classList.remove("hidden");
        commentContent.classList.add("hidden");
        commentActions.classList.add("hidden");
    }

    window.cancelEdit = function (commentId) {
        const editForm = document.getElementById("editForm" + commentId);
        const commentContent = editForm.parentElement.querySelector('.comment-content');
        const commentActions = editForm.parentElement.querySelector('.comment-actions');

        editForm.classList.add("hidden");
        commentContent.classList.remove("hidden");
        commentActions.classList.remove("hidden");
    }

    window.editPost = function (postId) {
        const editPostForm = document.getElementById("editPostForm" + postId);
        const postContent = editPostForm.parentElement.querySelector('.post-content');
        const postActions = editPostForm.parentElement.querySelector('.post-actions');

        editPostForm.classList.remove("hidden");
        postContent.classList.add("hidden");
        if (postActions) postActions.classList.add("hidden");
    }

    window.cancelEditPost = function (postId) {
        const editPostForm = document.getElementById("editPostForm" + postId);
        const postContent = editPostForm.parentElement.querySelector('.post-content');
        const postActions = editPostForm.parentElement.querySelector('.post-actions');

        editPostForm.classList.add("hidden");
        postContent.classList.remove("hidden");
        if (postActions) postActions.classList.remove("hidden");
    }

    window.confirmDeletePost = function () {
        return confirm('Are you sure you want to delete this post?');
    }

    window.confirmDeleteComment = function () {
        return confirm('Are you sure you want to delete this comment?');
    }

    // Alert related functions
    const alert = document.getElementById('myAlert');
    if (alert) {
        alert.classList.remove('hide');
        setTimeout(function () {
            alert.classList.add('hide');
        }, 5000);
    }

    // Like button color change
    const likeButtons = document.querySelectorAll('.like-button');
    likeButtons.forEach(button => {
        if (button.getAttribute('data-liked') === 'true') {
            button.style.color = 'red';
        }
    });
});
