<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public $postService;
    
    public function __construct()
    {
        $this->postService = new PostService;
    }
    
    /**
     * Create user posts
     */
    public function create(PostRequest $request): RedirectResponse
    {
        $userId = auth()->id(); 
        $posts = $this->postService->create($request, $userId);
        
        return redirect()->back();
    }
    
    /**
     * Retrive user posts
     */
    public function viewOwnPosts(): View
    {
        $posts = $this->postService->viewOwnPosts();
        return view('/pages/dashboard/profile', ['posts' => $posts]);
    }
    
    /**
     * Retrive all posts
     */
    public function viewAllPosts(): View
    {
        $posts = $this->postService->viewAllPosts();
        return view('/app', ['posts' => $posts]);
    }
}
