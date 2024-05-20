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
