<?php

namespace App\Http\Controllers;

use App\Models\City;

use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    public function index()
    {
        $city= City::all();
        return view('admin.pages.locations.Cities.index',compact('city'));
    }
    public function create()
    {
        return view('admin.pages.locations.Cities.create');
    }
    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->route('city-management.index');
    }
    public function cityApi()
    {
        $city = City::where('status',1)->get();
        return $city;
    }
}
