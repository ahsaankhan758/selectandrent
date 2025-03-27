<?php

namespace App\Http\Controllers\website;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteBlogController extends Controller
{
    public function blogView(Request $request)
    {
        $query = Blog::latest();
    
        $totalBlogs = Blog::count();
    
        $blogs = $query->take(8)->get();

        if ($request->ajax()) {
            return response()->json([
                'data' => view('website.blog.include.blogcard', compact('blogs'))->render(),
                'hasMore' => $totalBlogs > 8
            ]);
        }
    
        return view('website.blog.blog', compact('blogs', 'totalBlogs'));
    }
    
    public function loadMoreBlogs(Request $request)
    {
        $offset = $request->offset;
    
        // Fetch more blogs based on offset
        $blogs = Blog::latest()->skip($offset)->take(8)->get();
        $hasMore = Blog::count() > ($offset + 8);
    
        return response()->json([
            'data' => view("website.blog.include.blogcardload", compact('blogs'))->render(),
            'hasMore' => $hasMore
        ]);
    }
    
    

    public function blogDetail($id) {
        $blog = Blog::findOrFail($id);
        return view('website.blog.blogDetail', compact('blog'));
    }  
}
