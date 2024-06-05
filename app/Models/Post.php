<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'creator_id',
        'thumbnail',
        'content',
        'category',
        'likes_count',
        'comment_count',
        'community_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }

    public function likes()
    {
        return $this->hasMany(LikesPost::class);
    }

    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    

}

