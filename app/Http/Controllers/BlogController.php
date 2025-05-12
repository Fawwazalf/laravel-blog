<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\PostImage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
       $blogs = Blog::where('status', 'published')->get();
       $postImages = PostImage::where('status', 'published')->get();
    
        return view('index', compact('blogs', 'postImages'));
    }


    public function show(string $id)
    {

        $blog = Blog::with('user:id,name', 'comments')->findOrFail($id);
        $blogs = Blog::all();
        $previousBlog = Blog::with('user:id,name', 'comments')->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::with('user:id,name', 'comments')->where('id', '>', $id)->orderBy('id', 'asc')->first();
        if (!$previousBlog && !$nextBlog) {
           $previousBlog = false;
           $nextBlog = false;
           return view('dashboard.blogs.detail', compact('blog', 'blogs', 'previousBlog', 'nextBlog' ));
       }

        if (!$nextBlog) {
            $nextBlog = false;
            return view('dashboard.blogs.detail', compact('blog', 'blogs', 'previousBlog', 'nextBlog' ));
        }

         if (!$previousBlog) {
            $previousBlog = false;
            return view('dashboard.blogs.detail', compact('blog', 'blogs', 'previousBlog', 'nextBlog' ));
        }

       
        return view('dashboard.blogs.detail', compact('blog', 'blogs', 'previousBlog', 'nextBlog'));
    }


}
