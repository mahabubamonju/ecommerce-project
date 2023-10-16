<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $categories;
    private $blogs;
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Blog::createBlog($request);
        return back()->with('message', 'Blog info created successfully...!');
    }


    public function manage()
    {
        $this->categories = Category::all();
        $this->blogs = Blog::all();
        return view('admin.blog.manage', ['blogs' => $this->blogs, 'categories' => $this->categories]);
    }
}
