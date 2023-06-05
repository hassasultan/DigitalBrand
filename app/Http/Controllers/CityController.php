<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;

use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    public function index()
    {
        $city= City::with('province')->get();
        return view('admin.pages.locations.Cities.index',compact('city'));
    }
    public function create()
    {
        $province = Province::all()->where('status',1);
        return view('admin.pages.locations.Cities.create',compact('province'));
    }
    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->route('city-management.index');
    }
    public function cityApi(Request $request)
    {
        $city = City::where('province_id',$request->province_id)->with('province')->where('status',1)->get();
        return $city;
    }
}
