@extends('pages.layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <body>
        <div class="a-login bg-background">
            <div class="p-profile__edit-container">
                {{-- Success Message --}}
                @if (session('status'))
                    <div id="successMessage"
                        style="color: green; background-color: #ccffcc; padding: 10px; margin-bottom: 15px;">
                        {{ session('status') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            window.location.href = "{{ route('profile-page') }}";
                        }, 5000);
                    </script>
                @endif
                {{-- Error Messages --}}
                @if ($errors->any())
                    <div style="color: red; background-color: #ffcccc; padding: 10px; margin-bottom: 15px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="a-login__padding1"> </div>
                <div class="a-login__h1 items-center">
                    <h1>Edit Your Profile</h1>
                </div>
                <div class="a-login__padding2"></div>
                <hr>
                <div class="a-login__padding1 w-96"></div>
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="items-start">
                        <div class="a-login__label">
                            <label for="first_name">Name:</label>
                        </div>
                        <div class="flex gap-2">
                            <input class="p-profile__edit-input" type="text" id="first_name" name="first_name"
                                value="{{ $user->profile->first_name }}" required>
                            <input class="p-profile__edit-input" type="text" id="middle_name" name="middle_name"
                                value="{{ $user->profile->middle_name }}">
                            <input class="p-profile__edit-input" type="text" id="last_name" name="last_name"
                                value="{{ $user->profile->last_name }}" required>
                            <hr>
                        </div>
                        <div class="a-login__label">
                            <div class="a-login__padding4 w-96">
                                <div class="w-full">
                                    <hr>
                                </div>
                                <label for="bio">Bio:</label>
                            </div>
                        </div>
                        <input class="p-profile__edit-input" type="text" id="bio" name="bio"
                            value="{{ $user->profile->bio }}" required>
                        <div class="a-login__padding4 w-full">
                            <hr>
                        </div>
                        <div class="a-login__label">
                            <div class="a-login__padding4 w-96">
                                <div class="w-full">
                                </div>
                                <label for="images">Profile Picture:</label>
                            </div>
                        </div>
                        <input type="file" id="image-upload" name="images[]" multiple accept="image/*"
                            value="{{ $user->profile->images }}">
                        <div class="a-login__padding4 w-full">
                            <hr>
                        </div>
                        <div class="a-login__label">
                            <label for="birth_date">Birth Date:</label>
                        </div>
                        <input class="p-profile__edit-input" type="date" id="birth_date" name="birth_date"
                            value="{{ $user->profile->birth_date }}" required>
                        <div class="a-login__padding4 w-full">
                            <hr>
                        </div>
                        <div class="a-login__label">
                            <label for="address">Address:</label>
                        </div>
                        <input class="p-profile__edit-input-full" type="text" id="address" name="address"
                            value="{{ $user->profile->address }}" required>
                        <div class="a-login__padding4 w-full">
                            <hr>
                        </div>
                        <div class="a-login__label">
                            <label for="phone_number">Phone Number:</label>
                        </div>
                        <input class="p-profile__edit-input" type="text" id="phone_number" name="phone_number"
                            value="{{ $user->profile->phone_number }}" required>
                        <div class="a-login__padding4 w-full">
                            <hr>
                        </div>
                        <div class="a-login__label">
                            <label for="password">Confirm your password to save changes:</label>
                        </div>
                        <input class="p-profile__edit-input" type="password" id="password" name="password" required>
                    </div>
                    <div class="a-login__padding4 w-full">
                        <hr>
                    </div>
                    <div class="p-profile__button">
                        <button class="a-login__button" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
    </body>
@endsection
