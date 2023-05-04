<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCatogory;
use Illuminate\Http\Request;
class SubCatogoryController extends Controller
{
    //
    public function index()
    {
        $subcat = SubCatogory::with('category')->get();
        return view('admin.pages.offers.sub-categories.index',compact('subcat'));
    }
    public function create()
    {
        $category = Category::where('status', 1)->get();
        return view('admin.pages.offers.sub-categories.create',compact('category'));
    }
    public function store(Request $request)
    {
        SubCatogory::create($request->all());
        return redirect()->route('offer-sub-categories.index');
    }
}
