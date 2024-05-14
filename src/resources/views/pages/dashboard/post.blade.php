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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="w-7 h-7 transition-transform transform hover:stroke hover:scale-150 ml-5"
                    onclick="document.getElementById('image-upload').click();">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <button id="shareButton" class="d-dashboard__post-btn">Post</button>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('image-upload').addEventListener('change', function (event) {
            const imagePreviewContainer = document.getElementById('image-preview-container');
            imagePreviewContainer.innerHTML = ''; // Clear previous previews

            // Iterate through selected files
            for (const file of event.target.files) {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-32', 'h-32', 'object-cover', 'mr-2', 'mb-2');
                        imagePreviewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Show the image preview container if files are selected
            imagePreviewContainer.classList.remove('hidden');
        });

        // Hide the image preview container if no files are selected
        document.getElementById('image-upload').addEventListener('click', function () {
            if (this.value === '') {
                const imagePreviewContainer = document.getElementById('image-preview-container');
                imagePreviewContainer.classList.add('hidden');
            }
        });
    </script>
</body>