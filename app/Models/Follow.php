<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = ['follower_id', 'followed_id'];

    // Relasi ke model User untuk follower
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    // Relasi ke model User untuk followed
    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_id');
    }
}

