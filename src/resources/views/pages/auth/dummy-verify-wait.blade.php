@extends('pages.layouts.app')

@section('title', 'Login')

@section('content')

<body>
    <p>Please Verify your email</p>
    <p>test( 0 = unverified, 1 = verified) status: {{auth()->user()->status}}</p>
    <a href='/resend-email'><button>Resend Email Verification</button></a>
</body>

</html>
