<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    private $blogs;
    private $blog;

    public function index()
    {
        $this->blogs = Blog::orderBy('id', 'desc')->get();
        return view('website.home.index', ['blogs' => $this->blogs]);
    }

    public function category()
    {
        return view('website.category.index');
    }

    public function detail($id)
    {
        $this->blog = Blog::find($id);
        return view('website.detail.index', ['blog' => $this->blog]);
    }
}
