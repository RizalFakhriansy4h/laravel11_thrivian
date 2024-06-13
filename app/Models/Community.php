<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'is_active', 'creator_id', 'thumbnail', 'advert_thumbnail', 'slug','category',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'community_user')->withPivot('role')->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}

