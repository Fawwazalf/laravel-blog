<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
       $blogs = Blog::where('status', 'published')->get();
    
        return view('index', compact('blogs'));
    }


    public function show(string $id)
    {

        $blog = Blog::with('user:id,name')->findOrFail($id);
        $blogs = Blog::all();
        $previousBlog = Blog::with('user:id,name')->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::with('user:id,name')->where('id', '>', $id)->orderBy('id', 'asc')->first();
        if (!$nextBlog) {
            $nextBlog = false;
            return view('detail', compact('blog', 'blogs', 'previousBlog', 'nextBlog' ));
        }

         if (!$previousBlog) {
            $previousBlog = false;
            return view('detail', compact('blog', 'blogs', 'previousBlog', 'nextBlog' ));
        }
       
        return view('detail', compact('blog', 'blogs', 'previousBlog', 'nextBlog'));
    }


}
