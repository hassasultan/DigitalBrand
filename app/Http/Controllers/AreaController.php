<?php

namespace App\Http\Controllers;

use App\Models\Area;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function index()
    {
        $area = Area::all();
        return view('admin.pages.offers.categories.index',compact('area'));
    }
    public function create()
    {
        return view('admin.pages.offers.categories.create');
    }
    public function store(Request $request)
    {
        Area::create($request->all());
        return redirect()->route('offer-categories.index');
    }
}
