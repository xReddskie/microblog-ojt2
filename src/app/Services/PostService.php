<?php

namespace App\Services; 

use App\Models\Post;
use App\Models\Photo;
use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Collection;


class PostService
{
    /**
     * Create Photo inside Post
     */
    public function addPhotos(PostRequest $request, int $userId, Post $post): Void
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/post_images', $filename);

                Photo::create([
                    'user_id' => $userId,
                    'post_id' => $post->id,
                    'img_file' => $path 
                ]);
            }
        }
    }

    /**
     * Create post function
     */
    public function create(PostRequest $request, int $userId): Post
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
    public function viewAllPosts(User $user): Collection
    {
        $followeesIds = $user->followees->pluck('id')->push($user->id)->toArray();
        $posts = Post::whereIn('user_id', $followeesIds)->get();
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
    
    /**
     * Show post detail
     */
    public function postDetails(int $id): Post
    {
        $post = Post::find($id);
        return $post;
    }
}
