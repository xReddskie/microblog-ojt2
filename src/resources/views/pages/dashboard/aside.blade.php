<aside class="d-dashboard__aside">
    <div class="d-dashboard__bgcolor">
        <div class="d-dashboard__aside-about">
            <ul class="d-dashboard__aside-ul" style="line-height: 1.2;">
                <li class="text-xl font-bold">About
                    @if (auth()->user()->id == $user->id)
                        me
                    @else
                        {{ $user->username }}
                    @endif
                </li>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-center">
                        @include('svg.birthday')
                        <span>{{ $user->profile->birth_date }}</span> <!-- Phone number -->
                    </div>
                </div>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-ctop">
                        <li class="d-dashboard__side-list">
                            @include('svg.location')
                    </div>
                    <div class="">
                        {{ $user->profile->address }}
                    </div>
                    </li>
                </div>
                <div class="d-dashboard__aside-container">
                    <div class="d-dashboard__aside-icons-center">
                        @include('svg.phone')
                        <span>{{ $user->profile->phone_number }}</span>
                    </div>
                </div>
                @if (auth()->user()->id == $user->id)
                    <li class="d-dashboard__aside-aboutbtn">
                        <a href="/profile/edit" class="p-2">Edit Profile</a>
                    </li>
                @endif
        </div>
        <div class="d-dashboard__user">
            <div class="font-semibold">Suggestions</div>
            @if ($suggestedUsers->count() >= 1)
                @foreach ($suggestedUsers as $suggestion)
                    <!-- User suggest number 1 -->
                    <hr class="d-dashboard__user-hr">
                    <div class="flex items-center py-1">
                        <img class="object-cover w-10 h-10 mr-1 border-2 border-white rounded-full"
                            src='{{ $suggestion->profile->getImageURL() }}' alt='Profile Picture'>
                        <div class="flex flex-col justify-center">
                            <div class="pt-1">{{$suggestion->username}}</div>
                            <div class="font-light text-sm">(mutual {{$suggestion->mutualFollowers()->count()}})</div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <button class="d-dashboard__aside-btns follow-button"
                            data-user-id="{{ $suggestion->id }}">Follow</button>
                    </div>
                @endforeach
            @else
                <div class="flex justify-center p-2 items-center font-light">
                    No suggestions available
                </div>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.follow-button').on('click', function () {
                var button = $(this);
                var userId = button.data('user-id');

                $.ajax({
                    url: '/follow-ajax/' + userId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            button.text('Following').attr('disabled', true);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (response) {
                        alert('Error following user.');
                    }
                });
            });
        });
    </script>
</aside>
