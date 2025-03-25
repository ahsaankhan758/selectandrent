<?php

namespace App\Http\Controllers\website;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteBlogController extends Controller
{
    public function blogView() {
        $blogs = Blog::latest()->take(8)->get(); 
        return view('website.blog.blog', compact('blogs'));
    }
    

    public function blogDetail($id) {
        $blog = Blog::findOrFail($id);
        return view('website.blog.blogDetail', compact('blog'));
    }  
}
