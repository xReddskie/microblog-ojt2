<?php

namespace App\Services; 

use App\Models\Post;
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

    /**
     * Delete post
     */
    public function deletePost(Post $post): Void
    {
        $post->delete();
    }
    
    /**
     * Edit Post
     */
    public function editPost(Post $post, PostRequest $request): bool
    {
        return auth()->user()->id === $post['user_id'] && $post->update($request->all());
    }
    
    /**
     * Like Post
     */
    public function like(Post $post): void
    {
        auth()->user()->likes()->attach($post);
    }
    
    /**
     * Unlike Post
     */
    public function unlike(Post $post): void
    {
        auth()->user()->likes()->detach($post);
    }
}
