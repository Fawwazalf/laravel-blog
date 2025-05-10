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

    public function create()
    {
        return view('dashboard.post_images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:2048',
            'status' => 'required|in:published,scheduled,draft',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
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

        return redirect()->route('dashboard.post_images.index')->with('success', 'Image uploaded successfully!');
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

        return redirect()->route('dashboard.post_images.index')->with('success', 'Image updated successfully!');
    }

    public function destroy(string $id)
    {
       $postImage = PostImage::findOrFail($id);
        $postImage->delete();
        return redirect()->route('dashboard.post_images.index')->with('success', 'Image deleted successfully!');
    }
}