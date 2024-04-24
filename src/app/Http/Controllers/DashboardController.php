<?php

namespace App\Http\Controllers;

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
    public function dashboard(): View
    {
        $posts = $this->postService->viewAllPosts();
        return view('/app', compact('posts'));
    }
}
