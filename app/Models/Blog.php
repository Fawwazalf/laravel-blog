<?php

namespace App\Models;

use App\Traits\ConvertContentImageBase64ToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;
    use ConvertContentImageBase64ToUrl;

    protected $contentName = 'content';

    protected $fillable = [
        'title',
        'content',
        'featured_image',
        'gallery_images',
        'published_at',
        'status',
        'user_id',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
