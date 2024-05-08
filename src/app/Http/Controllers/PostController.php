<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Models\Photo;
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
        $post = $this->postService->create($request, $userId);
        $this->postService->addPhoto($request, $userId, $post);
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

    /**
     * Delete Post
     */
    public function deletePost(Post $post): RedirectResponse
    {
        $this->postService->deletePost($post);
        return redirect()->back()->with('success');
    }

    /**
     * Edit Post
     */
    public function editPost(Post $post, PostRequest $request): RedirectResponse
    {
        return $this->postService->editPost($post, $request) ?  redirect()->route('dashboard') :
            redirect('/')->with('error', 'Unauthorized access');
    }

    /**
     * View to edit Post
     */
    public function viewPost(Post $post): View
    {
        return view('pages.dashboard.edit-post', ['post' => $post]);
    }

    /**
     * Like Post
     */
    public function like(Post $post): RedirectResponse
    {
        $this->postService->like($post);
        return redirect()->back();
    }

    /**
     * Unlike Post
     */
    public function unlike(Post $post): RedirectResponse
    {
        $this->postService->unlike($post);
        return redirect()->back();
    }
}
