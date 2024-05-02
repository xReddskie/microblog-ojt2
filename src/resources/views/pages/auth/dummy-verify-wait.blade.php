@section('title', 'Login')

@section('content')

<div class="flex min-h-screen flex-col items-center justify-center gap-4">
  
    <div class="flex flex-col justify-center items-center relative text-6xl mb-14 w-2/3">
      <span class="animate-bounce">cafe</span>
      <span class="absolute top-11">TABLE</span>
      <span class="absolute text-sm top-24">Your Microblogging Playground</span>
    </div>

    <div class="flex flex-col items-center justify-center text-center">
      <span class="w-2/3 border-2 border-black px-8 py-2"> Welcome to the sharing idea journey! Before you begin, please verify your email to unlock all the features. Check your inbox for the verification email. </span>
      <span class="w-2/3 border-2 border-black px-8"> If you haven't received it, you can click the button below to resend the verification email. </span>
    </div>
    <div class="mb-12 w-2/3 border-2 border-black">
      <div class="flex justify-evenly">
        <span class="border-2 border-black">
          <a href="{{ route('logout')}}" aria-label="Logout Account">Logout</a>
        </span>
        <span class="border-2 border-black">
          <a href="/resend-email">Resend Email Verification</a>
        </span>
      </div>
    </div>
  </div>

  <style>

    .animate-bounce{
        animation: bounce 1s infinite;
        display: inline-block;
    }

    @keyframes bounce {
      0%, 100% {
        transform: translateY(-20%)scaleY(130%);
        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
      }
      50% {
        transform: translateY(0)scaleY(100%);
        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
      }
    }

  </style>

  @endsection