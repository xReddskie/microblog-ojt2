 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register</title>
 </head>

 <body>
     @auth
        @if(auth()->user()->status === 0)
            @include('dummy-verify-wait')    <!-- dummy-verify-wait.blade.php -->
        @elseif(auth()->user()->status === 1)
            @include('dummy-dashboard')      <!-- dummy-dashboard.blade.php -->
        @endif
     @else
     @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
     <form action="/register" method="POST">
         @csrf
         <!-- First Name -->
         <label for="first_name">First Name:</label>
         <input type="text" id="first_name" name="first_name">
        @error('first_name')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Middle Name -->
         <label for="last_name">Middle Name:</label>
         <input type="text" id="middle_name" name="middle_name">
         @error('middle_name')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Last Name -->
         <label for="last_name">Last Name:</label>
         <input type="text" id="last_name" name="last_name">        
         @error('last_name')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Birthday -->
         <label for="birthday">Birthday:</label>
         <input type="date" id="birthday" name="birthday">
         @error('birthday')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Lot & Block -->
         <label for="lot_block">Lot & Block:</label>
         <input type="text" id="lot_block" name="lot_block">
         @error('lot_block')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Street -->
         <label for="street">Street:</label>
         <input type="text" id="street" name="street">
         @error('street')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- City -->
         <label for="city">City:</label>
         <input type="text" id="city" name="city">        
         @error('city')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Province -->
         <label for="province">Province:</label>
         <input type="text" id="province" name="province">
         @error('province')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Country -->
         <label for="country">Country:</label>
         <input type="text" id="country" name="country">
         @error('country')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Zip Code -->
         <label for="zip_code">Zip Code:</label>
         <input type="text" id="zip_code" name="zip_code">
         @error('zip_code')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Email -->
         <label for="email">Email:</label>
         <input type="email" id="email" name="email">
         @error('email')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Username -->
         <label for="username">Username:</label>
         <input type="text" id="username" name="username">
         @error('username')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Phone Number -->
         <label for="phone_number">Phone Number:</label>
         <input type="text" id="phone_number" name="phone_number">
         @error('phone_number')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Password -->
         <label for="password">Password:</label>
         <input type="password" id="password" name="password">
         @error('password')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Confirm Password -->
         <label for="password_confirmation">Confirm Password:</label>
         <input type="password" id="password_confirmation" name="password_confirmation" required>
         @error('password_confirmation')
        <div style="color:red;">{{$message}}</div>
        @enderror
        <br>

         <!-- Cancel Button -->
         <a href="/register-page">Cancel</a>

         <!-- Submit Button -->
         <button>Submit</button>

     </form>
     @endauth
 </body>

 </html>
