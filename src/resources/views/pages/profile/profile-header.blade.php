<div class="p-profile">
    <div class="p-profile__container">
        <div class="h-80 overflow-hidden rounded-lg">
            <img class="object-cover w-full h-full" src='{{ $user->profile->getCoverURL() }}' alt='Cover Picture'>
        </div>
        <div class="p-profile__cover">
            <div class="p-profile__name">
                <p>{{ $user->profile->first_name ?? 'First Name' }} {{ $user->profile->last_name ?? 'Last Name' }}</p>
                <div class="flex gap-2 -mt-2 ml-2 font-thin text-base">
                    <p class="cursor-pointer hover:underline">{{ $user->followers_count }} followers</p>
                    <p class="cursor-pointer hover:underline">{{ $user->followees_count }} following</p>
                </div>
            </div>
            <div class="-mt-16 w-40 h-40 border-4 border-white rounded-full overflow-hidden relative">
                <img class="object-cover w-full h-full" src='{{ $user->profile->getImageURL() }}' alt='Profile Picture'>
            </div>
        </div>
        <div class="flex justify-start m-4 relative">
            @if (auth()->user()->id == $user->id)
                <div class="p-2"></div>
            @else
                @if (auth()->user()->followees->contains($user->id))
                    <form action="{{ route('unfollow', $user) }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="d-dashboard__aside-btns">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('follow', $user) }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="d-dashboard__aside-btns">Follow</button>
                    </form>
                @endif
            @endif
            <p class="p-profile__bio absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                "{{ $user->profile->bio }}"</p>
        </div>
        <div class="mt-10">
            <hr>
            <div class="flex justify-evenly font-light">
                <a href="{{ route('posts', ['id' => $user->id, 'x' => 1]) }}" class="p-profile__list">Posts</a>
                <a href="{{ route('followers', ['id' => $user->id, 'x' => 2]) }}" class="p-profile__list">Followers</a>
                <a href="{{ route('photos', ['id' => $user->id, 'x' => 3]) }}" class="p-profile__list">Photos</a>
                <a href="{{ route('about', ['id' => $user->id, 'x' => 4]) }}" class="p-profile__list">About</a>
            </div>
        </div>
    </div>
</div>
