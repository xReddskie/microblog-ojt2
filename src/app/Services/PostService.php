<?php

namespace App\Services; 

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /**
     * Create post function
     */
    public function create(PostRequest $request, $userId): Post
    {
         $posts = Post::create([
            'user_id' =>$userId,
            'content' =>$request->content,
        ]);

        return $posts;
    }
    
    /**
     * View user posts
     */
    public function viewOwnPosts(): Collection
    {
        $posts = Post::where('user_id', auth()->id())->get();
        $sortedPosts = $posts->sortByDesc('created_at');
        return $sortedPosts;
    }
    
    /**
     * View all posts
     */
    public function viewAllPosts(): Collection
    {
        $posts = Post::all();
        $sortedPosts = $posts->sortByDesc('created_at');
        return $sortedPosts;
    }
}
