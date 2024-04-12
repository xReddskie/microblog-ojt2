<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'status' => 0,
                'remember_token' => Str::random(40),
            ]);
 
            app(ProfileController::class)->createProfile($request, $user->id);

            Session::regenerate();
            auth()->login($user);
            event(new Registered($user));

            return redirect('/verify-waiting')->with('success', 'Registration is successful! Please check your email for verification.');
        } catch (\Exception $e) {
            return redirect('/register-page')->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }

    public function verifyEmail($id, $hash)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/register')->with('error', 'User not found.');
        }

        if ($hash != sha1($user->getEmailForVerification())) {
            return redirect('/register')->with('error', 'Invalid verification link.');
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        $user->status = 1;
        $user->save();

        event(new Verified($user));

        return redirect('/dashboard')->with('verified', true);
    }

    public function emailVerifyRedirect()
    {
        return view('register');
    }
    public function resendEmailVerification()
    {
        $user = auth()->user();
        $user->sendEmailVerificationNotification();
        return redirect()->back()->with('success', 'Email verification link resent.');
    }

    public function logout()
    {
        auth()->logout();
        Session::flush();
        Session::regenerate();

        $response = new Response(view('register'));

        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');

        return $response;
    }
}
