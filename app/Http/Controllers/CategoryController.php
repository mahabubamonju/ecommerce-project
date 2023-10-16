<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoties;

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Category::createCategory($request);
        return back()->with('message', 'Category info created successfully...!');
    }

    public function manage()
    {
        $this->categoties = Category::all();
        return view('admin.category.manage', ['categoties' => $this->categoties]);
    }
}
