<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
</head>
<body>
    <div class="register">
        <div class="register_mainbox">
            <div class="register_box1">
                <figure class="register_figureStyle">
                    <div class="register_justifyCenter">
                        <div class="register_roundedStyle"></div>
                        <img class="register_userIcon"
                            src="https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png"
                            alt="User Icon" type="image" />
                    </div>
                    <figcaption class="register_leftText1">
                        Let’s Get You Set Up
                    </figcaption>
                    <figcaption class="register_leftText2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </figcaption>
                </figure>
            </div>

            <div class="register_box2">
                <form action="#">

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="firstName" class="register_inputBoxLabel">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="register_inputBox" />
                        </div>
                        <div class="w-full">
                            <label for="lastName" class="register_inputBoxLabel">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="register_inputBox" />
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <div class="relative">
                                <div class="register_datepicker1">
                                    <svg class="register_datepicker2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <label for="datepicker" class="register_inputBoxLabel">Birthday</label>
                                <input datepicker type="text" name="datepicker" id="datepicker" class="register_datepicker3" placeholder="Select date">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="email" class="register_inputBoxLabel">Email</label>
                            <input type="email" id="email" name="email" class="register_inputBox" />
                        </div>
                    </div>
                    

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="lot_block" class="register_inputBoxLabel">Lot & Block</label>
                            <input type="text" id="lot_block" name="lot_block" class="register_inputBox" />
                        </div>
                        <div class="w-full">
                            <label for="street" class="register_inputBoxLabel">Street</label>
                            <input type="text" id="street" name="street" class="register_inputBox" />
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="city" class="register_inputBoxLabel">City</label>
                            <input type="text" id="city" name="city" class="register_inputBox" />
                        </div>
                        <div class="w-full">
                            <label for="province" class="register_inputBoxLabel">Province</label>
                            <input type="text" id="province" name="province" class="register_inputBox" />
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="country" class="register_inputBoxLabel">Country</label>
                            <input type="text" id="country" name="country" class="register_inputBox" />
                        </div>
                        <div class="w-full">
                            <label for="zip_code" class="register_inputBoxLabel">Zip Code</label>
                            <input type="text" id="zip_code" name="zip_code" class="register_inputBox" />
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="username" class="register_inputBoxLabel">Username</label>
                            <input type="text" id="username" name="username" class="register_inputBox" />
                        </div>
                        <div class="w-full">
                            <label for="phoneNumber" class="register_inputBoxLabel">Phone Number</label>
                            <input type="text" id="phoneNumber" name="phoneNumber" class="register_inputBox" />
                        </div>
                    </div>

                    <div class="register_flexRow">
                        <div class="w-full">
                            <label for="password" class="register_inputBoxLabel">Password</label>
                            <input type="text" id="password" name="password" class="register_inputBox" />
                        </div>
                        <div class="w-full">
                            <label for="confirmPassword" class="register_inputBoxLabel">Confirm Password</label>
                            <input type="text" id="confirmPassword" name="confirmPassword" class="register_inputBox" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="button" class="register_cancelButton">Cancel</button>
                        <button type="submit" class="register_saveButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
