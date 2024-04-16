<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'address'
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return int
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}