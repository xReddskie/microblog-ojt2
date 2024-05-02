@extends('pages.layouts.app')

@section('title', 'Edit Profile')

@section('content')


    <body>
        <h1>Edit Your Profile</h1>

        {{-- Success Message --}}
        @if (session('status'))
            <div id="successMessage" style="color: green; background-color: #ccffcc; padding: 10px; margin-bottom: 15px;">
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

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ $user->profile->first_name }}" required>

            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" value="{{ $user->profile->middle_name }}">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ $user->profile->last_name }}" required>


            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ $user->profile->birth_date }}" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $user->profile->address }}" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $user->profile->phone_number }}" required>

            <label for="password">Confirm your password to save changes:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Save Changes</button>
        </form>
    </body>
@endsection
