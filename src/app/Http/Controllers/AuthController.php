<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;

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

            Profile::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_name' => $request->middle_name,
                'birth_date' => $request->birthday,
                'address' => implode(', ', array_filter([
                    $request->lot_block,
                    $request->street,
                    $request->city,
                    $request->province,
                    $request->country,
                    $request->zip_code,
                ])),
            ]);

            auth()->login($user);
            event(new Registered($user));

            return redirect('/register')->with('success', 'Registration is successful! Please check your email for verification.');
        } catch (\Exception $e) {
            dd($e->getMessage());
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

        return redirect('/register')->with('verified', true);
    }

    public function verifyWaiting()
    {

        if (auth()->check()) {
            if (auth()->check() && auth()->user()->email_verified_at) {
                return view('register');
            }
        }
        return view('register');
    }

    public function logout() {
        auth()->logout();
        return view('register');
    }
}
