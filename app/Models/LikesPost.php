<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesPost extends Model
{
    use HasFactory;

    protected $table = 'likes_post';

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    // Definisikan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan relasi ke model Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
