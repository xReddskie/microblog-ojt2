@section('title', 'Login')

@section('content')

<div class="flex min-h-screen flex-col items-center justify-center gap-4">
    <div class="relative mb-14 flex w-2/3 flex-col items-center justify-center text-6xl">
        <svg class="h-16 w-16 animate-bounce" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
            height="100" viewBox="0,0,256,256">
            <g fill="#dad2c3" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                style="mix-blend-mode: normal">
                <g transform="scale(5.33333,5.33333)">
                    <path
                        d="M25,18.4c11,0 20,-2.4 20,-5.4c0,-1.1 -1.2,-2.1 -3.2,-2.9c0.8,0.5 1.2,1.1 1.2,1.7c0,2.6 -8.1,4.7 -18,4.7c-9.9,0 -18,-2.2 -18,-4.8c0,-0.6 0.4,-1.2 1.2,-1.7c-2,0.8 -3.2,1.9 -3.2,2.9c0,3 9,5.5 20,5.5z">
                    </path>
                    <path
                        d="M25,21c-8.8,0 -16.3,-1.6 -19.9,-4h-0.1c0,2.3 0.8,4.7 1.9,7.1c-5.9,4.1 -4.8,14.9 5.1,12.9c0.5,-0.1 0.5,-0.5 0,-0.6c-3.9,-0.5 -7.9,-5.3 -4.1,-10.3c2.3,4.4 5.5,8.8 7.2,12.9v0c0.7,1.7 4.8,3 9.9,3c5.1,0 9.2,-1.3 9.9,-3v0c3,-7 10.1,-15 10.1,-22h-0.1c-3.6,2.4 -11.1,4 -19.9,4zM18,9c0,0 -4.9,-0.4 -4.9,2.2c0,1.1 0.8,2.6 4.2,2.6c3,0 6.8,-3.7 11.9,-3.7c3.7,0 3.7,2.5 0.7,2.5c-2,0 -3,-0.8 -3,-0.8c-0.6,-0.4 -1.3,0.4 -1,1.1c0,0 0,1.1 4,1.1c4,0 4.6,-1.9 4.5,-2.6c-0.1,-1.4 -1.4,-2.7 -3.5,-3.1c-1.9,-0.3 -4,-0.5 -7,0.6c-3,1.1 -5.1,3.1 -7.1,3.1c-2,0 -3.6,-2.3 1.2,-2c2.3,0.2 1,-1 0,-1z">
                    </path>
                </g>
            </g>
        </svg>
        <span class="absolute top-12">Microblog</span>
        <span class="absolute top-28 text-sm">Your Microblogging Playground</span>
    </div>

    <div class="flex flex-col items-center justify-center text-center">
        <span class="w-2/3  px-8 py-2 mt-3"> Welcome to the sharing idea journey! Before you begin, please verify your
            email to unlock all the features. Check your inbox for the verification email. </span>
        <span class="w-2/3  px-8"> If you haven't received it, you can click the button below to resend the verification
            email. </span>
    </div>

    <div class="mb-12 mt-8 w-2/3 flex flex-col items-center justify-evenly relative">
        <div id="resendEmailText" class="hidden absolute p-2 -top-10 text-red-800">Resend email again on: <span
                id="countdown">30</span> sec</div>
        <a href="/resend-email" id="resendButton" onclick="startCountdown(event)"
            class="border-black border-2 p-5 rounded-3xl text-slate-100 bg-gray-500 hover:bg-gray-900">Resend Email
            Verification</a>
        <a href="{{ route('logout')}}" aria-label="Logout Account" class="mt-3 underline text-red-800">Logout</a>
    </div>

    <script>
        function startCountdown(event) {
            var countdownElement = document.getElementById('countdown');
            var resendButton = document.getElementById('resendButton');

            if (resendButton.disabled) {
                event.preventDefault();
                return;
            }

            resendButton.removeEventListener('click', startCountdown);
            resendButton.disabled = true;
            resendButton.classList.remove('hover:bg-warmbeige');
            resendButton.classList.add('bg-mygray', 'text-white', 'cursor-not-allowed');

            document.getElementById('resendEmailText').classList.remove('hidden');

            var seconds = 30;
            var countdownInterval = setInterval(function () {
                seconds--;
                countdownElement.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    resendButton.disabled = false;
                    resendButton.addEventListener('click', startCountdown);
                    resendButton.classList.remove('bg-mygray', 'text-white', 'cursor-not-allowed');
                    resendButton.classList.add('hover:bg-warmbeige');
                    document.getElementById('resendEmailText').classList.add('hidden');
                }
            }, 1000);
        }

        document.addEventListener('DOMContentLoaded', function () {
            startCountdown();
        });
    </script>

    @endsection