<div class="p-profile">
    <div class="p-profile__container" >
        <div class="h-80 overflow-hidden rounded-lg">
            <img class="object-cover h-80 w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
        </div>
    <div class="p-profile__cover">
        <div class="p-profile__name"> 
            <p>{{ $user->profile->first_name ?? 'First Name' }} {{ $user->profile->last_name ?? 'Last Name' }}</p>
        </div>
        <div class="-mt-16 w-40 h-40 border-4 border-white rounded-full overflow-hidden relative">  <!-- Removed negative margin -->
            <img class="object-cover w-full h-full" src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Woman looking front'>
        </div>
    </div>
    <p class="p-profile__bio">"{{ $user->profile->bio }}"</p>
</div>
