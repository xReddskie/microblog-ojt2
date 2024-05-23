<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class FollowService
{
    /**
     * Follow User
     */
    public function follow(User $user): Void
    {
        Auth::user()->followees()->attach($user->id);
    }

    /**
     * Unfollow User
     */
    public function unfollow(User $user): Void
    {
        Auth::user()->followees()->detach($user->id);
    }
}
