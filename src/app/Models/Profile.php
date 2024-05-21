<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'address',
        'phone_number',
        'bio',
        'images',
        'cover',
    ];

    /**
     * Get the user that owns this profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Get image URL
     */
    public function getImageURL(): string
    {
        if($this->images){
            $cleanedPath = str_replace('public/', '', $this->images);
            return url('storage/'. $cleanedPath);
        }
        return "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ{{$this->name}}";
    }
    
    /**
     * Get cover URL
     */
    public function getCoverURL(): string
    {
        if($this->cover){
            $cleanedPath = str_replace('public/', '', $this->cover);
            return url('storage/'. $cleanedPath);
        }
        return "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ{{$this->name}}";
    }
}
