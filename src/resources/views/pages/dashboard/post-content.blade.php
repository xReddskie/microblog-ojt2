@section('content')

<body>
    @foreach ($posts as $post)
            <div id="container" class="d-dashboard__post-container relative">
                <div id="filter{{ $post->id }}" class="filter"></div>
                <div class="flex justify-between font-semibold py-3 text-xl">
                    <div class="flex items-center gap-3 mb-2 rounded-lg">
                        <div class="w-20 h-20 border-2 border-white rounded-full overflow-hidden relative">
                            <img class="object-cover w-full h-full" src='{{ $post->user->profile->getImageURL() }}'
                                alt='Profile Picture'>
                        </div>
                        <div class="flex flex-col text-3xl">
                            <span>
                                <a href="{{ route('user.profile', ['id' => $post->user->id]) }}">{{ $post->user->username }}</a>
                            </span>
                            <span class="font-thin text-lg">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @if ($post->user_id === auth()->id())
                        <div id="mySidenav{{ $post->id }}" class="sidenav z-20 bg-mygray flex flex-col justify-center items-center">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav({{ $post->id }})">&times;</a>
                            <form action="{{ route('delete.post', ['post' => $post]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <p class="delete">Delete</p>
                                </button>
                            </form>
                            <a class="hover:text-white" href="{{ route('view.post', ['post' => $post->id]) }}">Edit</a>
                        </div>
                        <span style="cursor:pointer;" onclick="openNav({{ $post->id }})">
                            @include('svg.kebab')
                        </span>
                    @endif
                </div>
                <a href="{{ url('postDetails', $post->id) }}">
                    <div class="mb-2 relative w-2/3 text-xl">{{ $post->content }}</div>
                </a>
                {{-- Image Display --}}
                @if ($post->photos->count() > 0)
                    <div class="d-dashboard__image">
                        @foreach ($post->photos as $photo)
                            @php
                                $cleanedPath = str_replace('public/', '', $photo->img_file);
                            @endphp
                            <a href="{{ url('postDetails', $post->id) }}">
                                <img src="{{ asset('storage/' . $cleanedPath) }}" alt="Post Image"
                                    class="cursor-pointer w-full h-full rounded-lg"></a>
                        @endforeach
                    </div>
                @endif
                <div class=" pt-1 flex justify-start items-start gap-3 text-xs font-light">
                    {{ $post->likes()->distinct('user_id')->count() }} likes
                    {{ $post->comments()->count() }} comments
                    {{ $post->comments()->count() }} shares
                </div>
                <div class="py-1">
                    <div class="flex justify-evenly m-0 relative border-t border-b border-gray-400 pt-3">
                        @include('pages.dashboard.like-button')
                        <!-- comment -->
                        <span href="" class="d-dashboard__like-comm cursor-pointer"
                            onclick="openComment({{ $post->id }})">
                            <span class="flex justify-center items-center gap-2 text-sm">
                                @include('svg.comment')
                                Comment
                            </span>
                        </span>
                        <span href="" class="d-dashboard__like-comm cursor-pointer"
                            onclick="openComment({{ $post->id }})">
                            <span class="flex justify-center items-center gap-2 text-sm">
                                @include('svg.share')
                                Share
                            </span>
                        </span>
                    </div>
                    </a>
                    <div class="bg-whisperwhite">
                        <ul class="rounded-lg max-h-40 overflow-y-scroll scrollbar-hidden">
                            @foreach ($post->comments->reverse() as $comment)
                                <div class="flex flex-col border-t border-b border-gray-400">
                                    <div class="relative flex px-2 pt-1 gap-2 items-start">
                                        <div
                                            class="w-8 h-8 border-2 border-white rounded-full overflow-hidden flex-shrink-0">
                                            <img class="object-cover w-full h-full"
                                                src="{{ $comment->user->profile->getImageURL() }}" alt="Profile Picture">
                                        </div>
                                        <div class="flex flex-col w-full">
                                            <div class="flex items-center gap-1">
                                                <li class="font-semibold flex items-center">
                                                    <span
                                                        class="text-sm font-semibold">{{ $comment->user->username }}</span>
                                                    @if ($post->user_id === $comment->user_id)
                                                        <span class="font-thin text-xs ml-1">(Author)</span>
                                                    @endif
                                                </li>
                                            </div>
                                            <li class="text-sm comment-content">{{ $comment->content }}</li>
                                            <div class="flex items-center gap-2 text-sm font-thin comment-actions">
                                                <span class="comment-time">
                                                    @php
                                                        $timeString = $comment->created_at->diffForHumans();
                                                        $search = [
                                                            'hours',
                                                            'days',
                                                            'seconds',
                                                            'minutes',
                                                            'weeks',
                                                            'week',
                                                            'months',
                                                            'years',
                                                        ];
                                                        $replace = ['h', 'd', 's', 'm', 'w', 'wk', 'mn', 'y'];
                                                        $formattedTimeString = str_replace(
                                                            $search,
                                                            $replace,
                                                            $timeString,
                                                        );
                                                        $stringspace = str_replace(
                                                            ' ',
                                                            '',
                                                            str_replace('ago', '', $formattedTimeString),
                                                        );
                                                    @endphp
                                                    {{ $stringspace }}
                                                </span>
                                                @if ($comment->user_id == auth()->id() || $post->user_id == auth()->id())
                                                    <form
                                                        action="{{ route('delete.comment', ['comment' => $comment->id]) }}"
                                                        method="POST" class="m-0 inline comment-delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-sm font-semibold ml-1">Delete</button>
                                                    </form>
                                                    @if ($post->user_id === $comment->user_id)
                                                    <span
                                                        class="text-sm font-semibold ml-1 cursor-pointer comment-edit-link"
                                                        onclick="editComment({{ $comment->id }})">
                                                        Edit
                                                        @endif
                                                    </span>
                                                @endif
                                            </div>
                                            <!-- Edit Form -->
                                            <form id="editForm{{ $comment->id }}"
                                                action="{{ route('posts.comments.edit', ['comment' => $comment->id]) }}"
                                                method="POST" class="hidden mt-1 mb-1 edit-form">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="content" value="{{ $comment->content }}"
                                                    class="border rounded w-full text-sm">
                                                <button type="submit" class="text-sm font-semibold mt-1">Save</button>
                                                <button type="button" class="text-sm font-semibold mt-1 ml-2"
                                                    onclick="cancelEdit({{ $comment->id }})">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>

                    <div id="comment{{ $post->id }}"
                        class="d-dashboard__border-gray mb-2 flex p-2 items-center w-full hidden transition-all duration-300">
                        <div class="flex flex-col h-max-64 w-full">
                            <div>
                                <form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="POST">
                                    @csrf
                                    <label for="comment" class="w-full">Comment as <span
                                            class="font-semibold">{{ auth()->user()->username }}</span></label>
                                    <div class="flex flex-end items-center gap-2">
                                        <textarea class="d-dashboard__border-gray w-full mt-2 p-2 rounded-lg" name="content"
                                            placeholder="Enter your comment here"></textarea>
                                        <button
                                            class="py-5 px-10 me-2 mt-1 text-sm font-medium text-gray-100 focus:outline-none bg-mygray rounded-lg border border-mygray focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                            type="submit">Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <script>
        function openNav(postId) {
            document.getElementById("mySidenav" + postId).style.width = "100px";
            document.getElementById("filter" + postId).style.display = "block";
        }

        function closeNav(postId) {
            document.getElementById("mySidenav" + postId).style.width = "0";
            document.getElementById("filter" + postId).style.display = "none";
        }

            function openComment(postId) {
                const comment = document.getElementById("comment" + postId);
                comment.classList.toggle("hidden");
            }

            function editComment(commentId) {
                const editForm = document.getElementById("editForm" + commentId);
                const commentContent = editForm.parentElement.querySelector('.comment-content');
                const commentActions = editForm.parentElement.querySelector('.comment-actions');

                editForm.classList.remove("hidden");
                commentContent.classList.add("hidden");
                commentActions.classList.add("hidden");
            }

            function cancelEdit(commentId) {
                const editForm = document.getElementById("editForm" + commentId);
                const commentContent = editForm.parentElement.querySelector('.comment-content');
                const commentActions = editForm.parentElement.querySelector('.comment-actions');

                editForm.classList.add("hidden");
                commentContent.classList.remove("hidden");
                commentActions.classList.remove("hidden");
            }
        </script>
    </body>
