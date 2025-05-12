<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostImageController extends Controller
{     public function index()
    {
        $postImages = PostImage::where('user_id', Auth::id())->latest()->get();
        return view('dashboard.post_images.index', compact('postImages'));
    }

    public function show(string $id)
    {
         $post_image = PostImage::with('user:id,name', 'comments')->findOrFail($id);
        $post_images = PostImage::all();
        $previousPostImage = PostImage::with('user:id,name', 'comments')->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextPostImage = PostImage::with('user:id,name', 'comments')->where('id', '>', $id)->orderBy('id', 'asc')->first();
        if (!$previousPostImage && !$nextPostImage) {
           $previousPostImage = false;
           $nextPostImage = false;
           return view('dashboard.post_images.detail', compact('post_image', 'post_images', 'previousPostImage', 'nextPostImage' ));
       }

        if (!$nextPostImage) {
            $nextPostImage = false;
            return view('dashboard.post_images.detail', compact('post_image', 'post_images', 'previousPostImage', 'nextPostImage' ));
        }

         if (!$previousPostImage) {
            $previousPostImage = false;
            return view('dashboard.post_images.detail', compact('post_image', 'post_images', 'previousPostImage', 'nextPostImage' ));
        }

       
        return view('dashboard.post_images.detail', compact('post_image', 'post_images', 'previousPostImage', 'nextPostImage'));
    
    }

   
}