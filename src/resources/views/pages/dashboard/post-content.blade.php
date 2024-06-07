<body>
    <!-- Post List -->
    @foreach ($posts as $post)

        <div id="container-{{ $post->id }}" class="d-dashboard__post-container relative">
            <div class="flex justify-between font-semibold py-2 text-xl">
                <div class="flex items-center gap-2 rounded-lg">
                    <div class="w-16 h-16 border-2 border-white rounded-full overflow-hidden relative">
                        <img class="object-cover w-full h-full" src='{{ $post->user->profile->getImageURL() }}'
                            alt='Profile Picture'>
                    </div>
                    <div class="flex flex-col text-3xl">
                        <span>
                            <a href="{{ route('user.profile', ['id' => $post->user->id]) }}">{{ $post->user->username }}</a>
                        </span>
                        <span class="font-thin text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="flex justify-between font-semibold py-2">
                    <div class="flex-col">
                        @if ($post->user_id === auth()->id())
                            <div id="mySidenav{{ $post->id }}" class="text-sm flex space-x-2 font-semibold cursor-pointer">
                                @include('pages.forms.delete-post-form')
                                <div class="">
                                    <span class="text-sm flex items-center font-semibold underline cursor-pointer"
                                        onclick="editPost({{ $post->id }})">
                                        Edit
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" onclick="showOnlyPost({{ $post->id }})">
                <div class="mb-2 relative w-2/3 text-xl post-content">{{ $post->content }}</div>
            </a>
            @include('pages.forms.edit-post-form')
            @if (
                    $post->childPost_id &&
                    (!$post->sharedPost ||
                        $post->sharedPost->deleted_at ||
                        !(auth()->user()->followees->contains($post->sharedPost->user->id) ||
                            auth()->user()->id == $post->sharedPost->user->id
                        ))
                )
                    <div class="mb-2 relative w-auto text-normal font-normal border-2 p-3">
                        <p>Content not Available</p>
                    </div>
            @elseif ($post->childPost_id)
                <a href="javascript:void(0);" onclick="showOnlyPost({{ $post->sharedPost->id }})">
                    <div class="mb-2 relative w-auto text-xl border-2 p-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 border-2 border-white rounded-full overflow-hidden relative">
                                <img class="object-cover w-full h-full"
                                    src='{{ $post->sharedPost->user->profile->getImageURL() }}' alt='Profile Picture'>
                            </div>
                            <div>
                                <span>{{ $post->sharedPost->user->username }}</span>
                                <span class="font-thin text-xs">{{ $post->sharedPost->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p>{{ $post->sharedPost->content }}</p>
                        <div class="flex items-center gap-3 mt-2">
                            <div class="w-50 h-50 border-2 border-white relative">
                                @foreach ($post->sharedPost->photos as $photo)
                                    @php
                                        $cleanedPath = str_replace('public/', '', $photo->img_file);
                                    @endphp
                                    <img class="object-cover w-full h-full" src='{{ asset('storage/' . $cleanedPath) }}'
                                        alt='Shared Post Image'>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @endif
            @if ($post->photos->count() > 0)
                <div class="d-dashboard__image">
                    @foreach ($post->photos as $photo)
                        @php
                            $cleanedPath = str_replace('public/', '', $photo->img_file);
                        @endphp
                        <a href="javascript:void(0);" onclick="showOnlyPost({{ $post->id }})">
                            <img src="{{ asset('storage/' . $cleanedPath) }}" alt="Post Image"
                                class="cursor-pointer w-full h-full rounded-lg">
                        </a>
                    @endforeach
                </div>
            @endif
            @include('pages.dashboard.post-footer')
        </div>
        </div>
    @endforeach

    <!-- Modal Structure -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalPostContent"></div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalPostContent"></div>
        </div>
    </div>

    <div class="my-4">
        {{ $posts->links('vendor.pagination.tailwind') }}
    </div>
</body>
