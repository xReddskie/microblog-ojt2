@section('content')

    <body>
        <form id="postContent" action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-dashboard__create-post">
                <label for="large-input" class="text-lg font-semibold">Share your mind with us</label>
                <div class="mt-2 mb-5">
                    <input type="text" id="large-input" class="d-dashboard__write-post" name='content'>
                </div>
                <div class="flex justify-between items-center">
                    <label for="image-upload" class="text-lg font-semibold">Upload Images:</label>
                    <input type="file" id="image-upload" name="images[]" multiple accept="image/*">
                    <button id="shareButton" class="d-dashboard__post-btn">Post</button>
                </div>
            </div>
        </form>
    </body>
