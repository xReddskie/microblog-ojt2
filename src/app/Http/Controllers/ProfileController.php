<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class ProfileController extends Controller
{
    public $postService;
    public function __construct() {
        $this->postService = new PostService;
    }

    /**
     * Go to profile page
     */
    public function profilePage(): View
    {
        $posts = $this->postService->viewOwnPosts();
        return view('pages/profile/profile', compact('posts'));
    }
}
