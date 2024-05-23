<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        Auth::user()->followees()->attach($user->id);

        return back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->followees()->detach($user->id);

        return back();
    }
}
