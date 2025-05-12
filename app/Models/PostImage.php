<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'image_path',
        'status',
        'published_at',
        'user_id'
    ];

    protected $casts = [
    'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}
}
