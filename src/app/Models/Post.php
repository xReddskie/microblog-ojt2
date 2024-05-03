<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['content', 'user_id'];
    
    /**
     * Post belongs to user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Likes belongs to many user
     */
    public function likes(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }
}
