<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
// use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

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
                'address' => $request->lot_block . ' ' . $request->street . ', ' .
                    $request->city . ', ' . $request->province . ', ' .
                    $request->country . ', ' . $request->zip_code,
            ]);

            // $save = new User;
            // $save->email = trim($request->email);

            // // event(new Registered($user));
            // Mail::to($save->email)->send(new RegisterMail($save));

            return redirect('/login')->with('success', 'User registered successfully!');
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }
}
