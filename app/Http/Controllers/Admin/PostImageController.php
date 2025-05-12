<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostImageController extends Controller
{     public function index(Request $request)
{
     
        $status = $request->input('status', '');  
        $perPage = $request->input('perPage', 10); 
    
       
        $postImages = PostImage::where('user_id', Auth::user()->id)->with('user:id,name');
    
        
     
    
       
        if ($status) {
            $postImages->where('status', $status);
        }
    
       
        $postImages = $postImages->latest('created_at')->paginate($perPage);
        
        return view('dashboard.post_images.index', compact('postImages', 'status', 'perPage'));
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

    public function create()
    {
        return view('dashboard.post_images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_path' => 'required|image|max:2048',
            'status' => 'required|in:published,scheduled,draft',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('post_images', 'public');
        }

        $publishedAt = now();
        if ($validated['status'] === 'scheduled' && $request->filled('published_at')) {
            $publishedAt = $request->published_at;
        } elseif ($validated['status'] === 'draft') {
            $publishedAt = null;
        }

        PostImage::create([
            'image_path' => $imagePath ?? null,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('post-images.index')->with('success', 'Image uploaded successfully!');
    }

    public function edit(PostImage $postImage)
    {

        return view('dashboard.post_images.edit', compact('postImage'));
    }

    public function update(Request $request, PostImage $postImage)
    {

        $validated = $request->validate([
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:published,scheduled,draft',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $postImage->image_path = $imagePath;
        }

        if ($validated['status'] === 'scheduled' && $request->filled('published_at')) {
            $postImage->published_at = $request->published_at;
        } elseif ($validated['status'] === 'draft') {
            $postImage->published_at = null;
        } else {
            $postImage->published_at = now();
        }

        $postImage->status = $validated['status'];
        $postImage->save();

        return redirect()->route('post-images.index')->with('success', 'Image updated successfully!');
    }

    public function destroy(string $id)
    {
       $postImage = PostImage::findOrFail($id);
        $postImage->delete();
        return redirect()->route('post-images.index')->with('success', 'Image deleted successfully!');
    }
}