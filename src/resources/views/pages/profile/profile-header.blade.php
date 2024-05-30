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
        @if (session()->has('unfollow'))
            <div id="myAlert" role="alert"
                class="alert alert-success alert-dismissible border-2 hide overflow absolute top-0 left-0 right-0 bg-red-100 text-red-800 p-4 rounded-t-lg">
                {{ session('unfollow') }}
                <button type="button" class="close absolute top-0 right-0 px-4 py-3" aria-label="Close">
                </button>
            </div>
        @endif
        <div class="p-profile">
            <div class="p-profile__container">
                <div class="h-80 overflow-hidden rounded-lg">
                    <img class="object-cover w-full h-full" src='{{ $user->profile->getCoverURL() }}'
                        alt='Cover Picture'>
                </div>
                <div class="p-profile__cover">
                    <div class="p-profile__name">
                        <p>{{ $user->profile->first_name ?? 'First Name' }}
                            {{ $user->profile->last_name ?? 'Last Name' }}
                        </p>
                        <div class="flex gap-2 -mt-2 ml-2 font-thin text-base">
                            <p class="cursor-pointer hover:underline">{{ $user->followers_count }} followers</p>
                            <p class="cursor-pointer hover:underline">{{ $user->followees_count }} following</p>
                        </div>
                    </div>
                    <div class="-mt-16 w-40 h-40 border-4 border-white rounded-full overflow-hidden relative">
                        <img class="object-cover w-full h-full" src='{{ $user->profile->getImageURL() }}'
                            alt='Profile Picture'>
                    </div>
                </div>
                <div class="flex justify-start m-4 relative">
                    @if (auth()->user()->id == $user->id)
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

            </div>
        </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('myAlert');
        if (alert) {
            alert.classList.remove('hide');

            setTimeout(function() {
                alert.classList.add('hide');
            }, 5000);
        }
    });
</script>
