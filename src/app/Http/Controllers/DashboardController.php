<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Services\PostService;

class DashboardController extends Controller
{
    public $postService;

    public function __construct()
    {
        $this->postService = new PostService;
    }
    /**
     * Return dashboard
     */
    public function dashboard(int $id): View
    {
        $user = User::with('profile')->findOrFail($id);
        $posts = $this->postService->viewAllPosts($user);
        return view('/app', compact('user', 'posts'));
    }
}
