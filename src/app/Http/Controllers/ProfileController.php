<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class ProfileController extends Controller
{
    public $postService;
    public function __construct() {
        $this->postService = new PostService;
    }
    public function profilePage()
    {
        $posts = $this->postService->viewOwnPosts();
        return view('pages/profile/profile', compact('posts'));
    }
}
