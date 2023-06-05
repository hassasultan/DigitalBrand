<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    //
    public function index()
    {
        $province= Province::all();
        return view('admin.pages.locations.Provinces.index',compact('province'));
    }
    public function create()
    {
        return view('admin.pages.locations.Provinces.create');
    }
    public function store(Request $request)
    {
        Province::create($request->all());
        return redirect()->route('province-management.index');
    }
    public function provinceApi()
    {
        $province = Province::where('status',1)->get();
        return $province;
    }
}
