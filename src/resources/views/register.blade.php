<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="/register" method="POST">
        @csrf
        <!-- First Name -->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br><br>

        <!-- Middle Name -->
        <label for="last_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name"><br><br>

        <!-- Last Name -->
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br><br>

        <!-- Birthday -->
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday"><br><br>

        <!-- Lot & Block -->
        <label for="lot_block">Lot & Block:</label>
        <input type="text" id="lot_block" name="lot_block"><br><br>

        <!-- Street -->
        <label for="street">Street:</label>
        <input type="text" id="street" name="street"><br><br>

        <!-- City -->
        <label for="city">City:</label>
        <input type="text" id="city" name="city"><br><br>

        <!-- Province -->
        <label for="province">Province:</label>
        <input type="text" id="province" name="province"><br><br>

        <!-- Country -->
        <label for="country">Country:</label>
        <input type="text" id="country" name="country"><br><br>

        <!-- Zip Code -->
        <label for="zip_code">Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code"><br><br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <!-- Phone Number -->
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number"><br><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <!-- Confirm Password -->
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>

        <!-- Cancel Button -->
        <a href="/">Cancel</a>

        <!-- Submit Button -->
        <button>Submit</button>

    </form>

</body>

</html>