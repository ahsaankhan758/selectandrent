<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
class AdminBlogController extends Controller
{
    public function createBlog(){
        return view("admin.blogs.createBlog");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'authorName' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'detail' => 'required|string',
        ]);
    
        $thumbnailPath = $request->file('thumbnail')->store('blogs/thumbnails', 'public');
    
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('blogs', 'public');
            }
        }

        Blog::create([
            'name' => $request->name,
            'date' => $request->date,
            'authorName' => $request->authorName,
            'thumbnail' => $thumbnailPath,
            'images' => json_encode($imagePaths),
            'detail' => $request->detail,
        ]);
    
        return redirect()->route('blogs.blogDetail')->with('status', 'Blog successfully created!');
    }
    

   // Get Blog Detail
   public function getBlogDetail()
   {
       $blogs =  Blog::paginate(10);
       return view('admin.blogs.blogDetail', compact('blogs'));
   }
   

   // Edit Blog
   public function edit($id)
   {
       $blog = Blog::findOrFail($id);
       return view('admin.blogs.editBlog', compact('blog'));
   }

 // Update Blog
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'date' => 'required|date',
        'authorName' => 'required|string|max:255',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'detail' => 'required|string',
    ]);

    $blog = Blog::findOrFail($id);

    if ($request->hasFile('thumbnail')) {
        if ($blog->thumbnail) {
            Storage::disk('public')->delete($blog->thumbnail);
        }
        $blog->thumbnail = $request->file('thumbnail')->store('blogs/thumbnails', 'public');
    }

    $existingImages = json_decode($blog->images, true) ?? [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $existingImages[] = $image->store('blogs/images', 'public');
        }
    }
    $blog->images = json_encode($existingImages);

    $blog->name = $request->name;
    $blog->date = $request->date;
    $blog->authorName = $request->authorName;
    $blog->detail = $request->detail;
    $blog->save();

    return redirect()->route('blogs.blogDetail')->with('status', 'Blog updated successfully!');
}

// Delete Blog
public function delete($id)
{
    $blog = Blog::findOrFail($id);
    
    if ($blog->thumbnail) {
        Storage::disk('public')->delete($blog->thumbnail);
    }

    $images = json_decode($blog->images, true) ?? [];
    foreach ($images as $image) {
        Storage::disk('public')->delete($image);
    }

    $blog->delete();
    return redirect()->back()->with('status', 'Blog deleted successfully!');
}
    
}
