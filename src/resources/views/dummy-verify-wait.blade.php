<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body>
    <p>Please Verify your email</p>
    <p>test( 0 = unverified, 1 = verified) status: {{auth()->user()->status}}</p>
    <a href='/resend-email'><button>Resend Email Verification</button></a>
</body>
</html>
