<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');  
        $status = $request->input('status', '');  
        $perPage = $request->input('perPage', 10); 
    
       
        $blogs = Blog::query()->with('user:id,name');
    
        
        if ($search) {
            $blogs->where(function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")->orWhere('content', 'like', "%{$search}%");
            });
        }
    
       
        if ($status) {
            $blogs->where('status', $status);
        }
    
       
        $blogs = $blogs->latest('published_at')->paginate($perPage);
        
        return view('dashboard.blogs.index', compact('blogs', 'search', 'status', 'perPage'));
    }


    public function show($id)
    {
        
    }

  
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|unique:blogs,title',
        'content' => 'required',
        'featured_image' => 'nullable|image|max:2048',
        'gallery_images.*' => 'nullable|image|max:2048',
        'status' => 'required|in:published,scheduled,draft',
        'published_at' => 'nullable|date',
        
    ]);


    if ($request->hasFile('featured_image')) {
        $featuredPath = $request->file('featured_image')->store('featured_images', 'public');
    }

    $galleryPaths = [];
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $galleryImage) {
            $galleryPaths[] = $galleryImage->store('gallery_images', 'public');
        }
    }

   
   $publishedAt = now();
if ($validated['status'] === 'scheduled' && $request->filled('published_at')) {
    $publishedAt = $request->published_at;
} elseif ($validated['status'] === 'draft') {
    $publishedAt = null; 
}

    Blog::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'featured_image' => $featuredPath ?? null,
        'gallery_images' => json_encode($galleryPaths),
        'published_at' => $publishedAt,
        'status' => $validated['status'],
        'user_id' => Auth::user()->id,
    ]);

    return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
}


    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('dashboard.blogs.edit', compact('blog'));
    }

    
    public function update(Request $request, $id)
    {
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'featured_image' => 'nullable|image|max:2048',
        'gallery_images.*' => 'nullable|image|max:2048',
        'published_at' => 'nullable|date',
        'existing_gallery_images' => 'nullable|array', 
        'status' => 'required|in:published,scheduled,draft',
    ]);

    $blog = Blog::findOrFail($id);
    
    if ($request->hasFile('featured_image')) {
        $featuredPath = $request->file('featured_image')->store('featured_images', 'public');
    } else {
        $featuredPath = $blog->featured_image;
    }

    $existingGallery = $request->input('existing_gallery_images', []);

    if($request->status === 'draft' || $request->status === 'scheduled') {
        $publishedAt = null; 
    } else {
        $publishedAt = now();
    }
    
    $newGalleryImages = [];
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('gallery_images', 'public');
            $newGalleryImages[] = $path;
        }
    }

    $mergedGallery = array_merge($existingGallery, $newGalleryImages);


    $blog->update([
        'title' => $request->title,
        'content' => $request->content,
        'featured_image' => $featuredPath,
        'gallery_images' => json_encode($mergedGallery),
        'published_at' => $publishedAt,
        'status' => $request->status, 
    ]);

    return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
}


     public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
