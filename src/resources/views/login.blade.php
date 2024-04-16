<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
    <title>Login</title>
</head>

<body>
    <div class="a-login">
        <div class="a-login__card">
            <div class="a-login__padding5">
            </div>
            <div class="a-login__h1">
                <h1>LOGIN</h1>
            </div>
            <div class="a-login__padding5"></div>
            <form action="">
                <div class="a-login__label">
                    <label for="">Email</label>
                </div>
                <input class="a-login__input" type="text" placeholder="example@gmail.com">
                <div class="a-login__padding2"></div>
                <div class="a-login__label">
                    <label for="">Password</label>
                </div>
                <input class="a-login__input" type="text" placeholder="******************">
                <div class="a-login__forgotpassword">
                    <a href="">Forgot Password?</a>
                </div>
                <div class="a-login__padding4">
                    <button class="a-login__button">Login</button>
                </div>
                <div class="a-login__registered">
                    <p>Not yet registered? <a class="underline" href="">Create an account.</a></p>
                </div>
            </form>
            <svg class="h-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#333333" fill-opacity="1" d="M0,0L60,26.7C120,53,240,107,360,138.7C480,171,600,181,720,160C840,139,960,85,1080,85.3C1200,85,1320,139,1380,165.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                <path fill="#484848" fill-opacity="1" d="M0,128L48,160C96,192,192,256,288,282.7C384,309,480,299,576,272C672,245,768,203,864,170.7C960,139,1056,117,1152,144C1248,171,1344,245,1392,282.7L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </div>

</body>

</html>