 <div class=" pt-1 flex justify-start items-start gap-1 text-xs font-light">
                <span class="likes-count" id="likes-count-{{ $post->id }}">{{ $post->likes()->distinct('user_id')->count() }} likes</span>
                {{ $post->comments()->count() }} comments
                {{ $post->comments()->count() }} shares
            </div>
            <div class="py-1">
                <div class="flex justify-evenly m-0 relative border-t border-b border-gray-400 py-2">
                    @include('pages.dashboard.like-button')
                    <!-- comment -->
                    <span href="" class="d-dashboard__like-comm cursor-pointer"
                        onclick="openComment({{ $post->id }})">
                        <span class="flex justify-center items-center gap-2 text-sm">
                            @include('svg.comment')
                            Comment
                        </span>
                    </span>
                    <a href="{{ url('postDetails', $post->id) }}" class="d-dashboard__like-comm cursor-pointer">
                        <span class="flex justify-center items-center gap-2 text-sm">
                            @include('svg.share')
                            Share
                        </span>
                    </a>
                </div>
                </a>
 <div class="bg-whisperwhite">
                    @if (session()->has('comment'))
                        <div id="myAlert" role="alert"
                            class="alert alert-success alert-dismissible border-2 hide overflow absolute top-0 left-0 right-0 bg-green-100 text-green-800 p-4 rounded-t-lg">
                            {{ session('comment') }}
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
                                                    $formattedTimeString = str_replace($search, $replace, $timeString);
                                                    $stringspace = str_replace(
                                                        ' ',
                                                        '',
                                                        str_replace('ago', '', $formattedTimeString),
                                                    );
                                                @endphp
                                                {{ $stringspace }}
                                            </span>
                                            @if ($comment->user_id == auth()->id() || $post->user_id == auth()->id())
                                               @include('pages.forms.delete-comment-form')
                                                @if ($comment->user_id == auth()->id())
                                                    <span
                                                        class="text-sm font-semibold ml-1 cursor-pointer comment-edit-link"
                                                        onclick="editComment({{ $comment->id }})">
                                                        Edit
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                        <!-- Edit Comment Form -->
                                        @include('pages.forms.edit-comment-form')
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
                            <!-- Add Comment Form -->
                            @include('pages.forms.add-comment-form')
                        </div>
                    </div>
                </div>
