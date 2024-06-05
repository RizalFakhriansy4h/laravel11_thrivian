<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'username',
        'bio',
        'is_active',
        'gender',
        'interest',
        'phone_number',
        'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'creator_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'creator_id');
    }
    public function joinedEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user');
    }
    
    // Relasi ke model LikesPost
    public function likes()
    {
        return $this->hasMany(LikesPost::class);
    }

    // Relasi ke model Bookmark
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public function isFollowing($userId)
    {
        return $this->following()->where('followed_id', $userId)->exists();
    }
    public function totalLikes()
    {
        return $this->posts()->withCount('likes')->get()->sum('likes_count');
    }

    public function communities()
    {
        return $this->belongsToMany(Community::class, 'community_user')->withPivot('role')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
