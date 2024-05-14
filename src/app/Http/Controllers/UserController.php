<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show other user's profile
     */

    public function show(int $id): View
    {
        $user = User::with('profile')->findOrFail($id);
        $posts = Post::where('user_id', $user->id)->get();
        return view('pages.profile.profile', compact('user', 'posts'));
    }
}
