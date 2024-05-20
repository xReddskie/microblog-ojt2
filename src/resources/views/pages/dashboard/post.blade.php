@section('content')

<body>
    <form id="postContent" action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-dashboard__create-post">
            <label for="large-input" class="text-lg font-semibold">Share your mind with us</label>
            <div class="mt-2">
                <input type="text" id="large-input" class="d-dashboard__write-post mb-3" name='content'>
                <div id="image-preview-container" class="flex justify-center hidden"></div>
            </div>
            <div class="d-dashboard__imageicon">
                <input type="file" id="image-upload" name="images[]" multiple accept="image/*" style="display: none;">
                @include('svg.image-upload')
                <button id="shareButton" class="d-dashboard__post-btn">Post</button>
            </div>
        </div>
    </form>
</body>
