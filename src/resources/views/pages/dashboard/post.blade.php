<style>
    .alert.hide {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
</style>

<body>
    <div class="relative">
        @if (session()->has('success'))
            <div id="myAlert" role="alert"
                class="alert alert-success alert-dismissible border-2 hide overflow absolute top-0 left-0 right-0 bg-green-100 text-green-800 p-4 rounded-t-lg">
                {{ session('success') }}
                <button type="button" class="close absolute top-0 right-0 px-4 py-3" aria-label="Close">
                </button>
            </div>
        @endif
        @if (session()->has('deleted'))
            <div id="myAlert" role="alert"
                class="alert alert-success alert-dismissible border-2 hide overflow absolute top-0 left-0 right-0 bg-red-100 text-red-800 p-4 rounded-t-lg">
                {{ session('deleted') }}
                <button type="button" class="close absolute top-0 right-0 px-4 py-3" aria-label="Close">
                </button>
            </div>
        @endif
        <!-- Add Post Form -->
        @include('pages.forms.add-post-form')
</body>
