<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
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
            // 'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'detail' => 'required|string',
        ]);
    
        $thumbnailPath = $request->file('thumbnail')->store('blogs/thumbnails', 'public');
    
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('blogs', 'public');
            }
        }

        $blog = Blog::create([
            'name' => $request->name,
            'date' => $request->date,
            'authorName' => $request->authorName,
            'thumbnail' => $thumbnailPath,
            'images' => json_encode($imagePaths),
            'detail' => $request->detail,
        ]);

       // save logs
       $userId = Auth::id();
       $userName = Auth::user()->name;
       $description = $userName . ' Created [ Blog Name: ' . $blog->name . ' ] [ Author Name: ' . $blog->authorName . ' ] Successfully.';
       $action = 'Create';
       $module = 'Blog';
       activityLog($userId, $description,$action,$module);
    
       return redirect()->route('blogs.blogDetail')->with('status', 'Blog successfully created!');
    }
    

   // Get Blog Detail
   public function getBlogDetail()
   {
       $blogs =  Blog::paginate(8);
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
         'images' => 'nullable|array|max:7', // Limit to 7 images
         'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
         'detail' => 'required|string',
     ]);
 
     $blog = Blog::findOrFail($id);
 
     // Handle Thumbnail Upload
     if ($request->hasFile('thumbnail')) {
         // Delete the old thumbnail if it exists
         if ($blog->thumbnail) {
             Storage::disk('public')->delete($blog->thumbnail);
         }
 
         // Store new thumbnail
         $blog->thumbnail = $request->file('thumbnail')->store('blogs/thumbnails', 'public');
     }
 
     // Handle Additional Images Upload
     $existingImages = json_decode($blog->images, true) ?? [];
 
     if ($request->hasFile('images')) {
         // Remove old images if any, but leave space for new uploads
         foreach ($existingImages as $image) {
             Storage::disk('public')->delete($image);  // Delete old images
         }
         $existingImages = [];  // Reset the images array
 
         // Add new images to the array, ensuring there are no more than 7
         foreach ($request->file('images') as $image) {
             if (count($existingImages) < 7) {
                 $existingImages[] = $image->store('blogs/images', 'public');
             }
         }
     }
 
     // Update the images field with the new set of images
     $blog->images = json_encode($existingImages);
 
     // Update other fields
     $blog->name = $request->name;
     $blog->date = $request->date;
     $blog->authorName = $request->authorName;
     $blog->detail = $request->detail;
     $blog->save();
 
     // Save logs
     $userId = Auth::id();
     $userName = Auth::user()->name;
     $description = $userName . ' Updated [ Blog Name: ' . $blog->name . ' ] [ Author Name: ' . $blog->authorName . ' ] Successfully.';
     $action = 'Update';
     $module = 'Blog';
     activityLog($userId, $description, $action, $module);
 
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

     // Save logs
     $userId = Auth::id();
     $userName = Auth::user()->name;
     $description = $userName . ' Deleted [ Blog Name: ' . $blog->name . ' ] [ Author Name: ' . $blog->authorName . ' ] Successfully.';
     $action = 'Delete';
     $module = 'Blog';
     activityLog($userId, $description, $action, $module);

    return redirect()->back()->with('status', 'Blog deleted successfully!');
}
    
}
