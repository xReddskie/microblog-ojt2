<?php

namespace App\Services; 

use App\Models\Comment;

class CommentService {
    /**
     * Delete CommentS
     */
    function deleteComment(Comment $comment): Void
    {
        $comment->delete();
    }
}