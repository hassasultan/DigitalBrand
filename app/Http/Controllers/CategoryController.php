<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('admin.pages.offers.categories.index',compact('category'));
    }
    public function create()
    {
        return view('admin.pages.offers.categories.create');
    }
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('offer-categories.index');
    }
}
