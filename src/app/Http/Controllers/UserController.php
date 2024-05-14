<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show other user's profile
     */

    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);
        $posts = Post::where('user_id', $user->id)->get();
        return view('pages.other-profile.other-profile', compact('user', 'posts'));
    }
}
