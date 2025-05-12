<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $type, $id)
{
    $request->validate([
        'body' => 'required|string',
    ]);

    $model = $this->getModelInstance($type, $id);

    $model->comments()->create([
        'body' => $request->body,
        'user_id' => Auth::user()->id,
    ]);

    return back()->with('success', 'Comment added!');
}

protected function getModelInstance($type, $id)
{
    $map = [
        'blog' => Blog::class, 
        'post-image' => PostImage::class, 
    ];

    if (!array_key_exists($type, $map)) {
        abort(404, 'Invalid type');
    }

    return $map[$type]::findOrFail($id);
}
}
