<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'thumbnail',
        'location',
        'start_date',
        'end_date',
        'website',
        'is_active',
        'creator_id',
        'slug',
        'price',
    ];

    // Relasi ke model User (creator)
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
    

}
