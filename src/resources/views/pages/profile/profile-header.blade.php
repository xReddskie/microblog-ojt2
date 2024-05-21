<div class="p-profile">
    <div class="p-profile__container">
        <div class="h-80 overflow-hidden rounded-lg">
            <img class="object-cover w-full h-full" src='{{ $user->profile->getCoverURL() }}' alt='Cover Picture'>
        </div>
        <div class="p-profile__cover">
            <div class="p-profile__name">
                <p>{{ $user->profile->first_name ?? 'First Name' }} {{ $user->profile->last_name ?? 'Last Name' }}</p>
            </div>
            <div class="-mt-16 w-40 h-40 border-4 border-white rounded-full overflow-hidden relative">
                <img class="object-cover w-full h-full" src='{{ $user->profile->getImageURL() }}' alt='Profile Picture'>
            </div>
        </div>
        <p class="p-profile__bio">"{{ $user->profile->bio }}"</p>
    </div>
