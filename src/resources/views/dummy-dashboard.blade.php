<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>

<body>
    <!-- this is only for testing -->
    <p>Your email is verified</p>
    @if(auth()->user()->status == null)
    @else
    <p>test( 0 = unverified, 1 = verified) status: <b>{{auth()->user()->status}}</b></p>
    @endif

    <a href="/logout">
        <button>logout</button>
    </a>
</body>

</html>
