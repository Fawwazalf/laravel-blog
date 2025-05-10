<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
