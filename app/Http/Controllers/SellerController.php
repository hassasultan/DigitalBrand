<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\SaveImage;
use Illuminate\Support\Facades\Validator;


class SellerController extends Controller
{
    //
    use SaveImage;
    protected function validator($data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'numeric', 'exists:users.id'],
            'phone' => ['required', 'string'],
            'whatsapp' => ['required', 'string'],
            'business_name' => ['required', 'string'],
            'business_address' => ['required', 'string'],
            'faecbook_page' => ['required', 'string'],
            'insta_page' => ['required', 'string'],
            'web_url' => ['required', 'string'],
            'isFeatured' => ['required', 'string'],
            'logo' => ['required', 'image','size:1024'],
        ]);
    }
    public function index()
    {
        $seller = Seller::all();
        return view('admin.pages.sellers.sellers',compact('seller'));
    }
    public function create()
    {
        // $seller = Seller::all();
        return view('admin.pages.sellers.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $user = User::create([
            "name" => $request->first_name." ".$request->last_name,
            "email" => $request->email,
            "role" => 2,
            "password" => Hash::make("12345678"),
        ]);
        $seller = new Seller();
        $seller->user_id = $user->id;
        if($request->has('business_name') && $request->business_name)
        {
            $seller->business_name = $request->business_name;

        }
        if($request->has('business_address') && $request->business_address)
        {
            $seller->business_address = $request->business_address;

        }
        if($request->has('faecbook_page') && $request->faecbook_page)
        {
            $seller->faecbook_page = $request->faecbook_page;

        }
        if($request->has('insta_page') && $request->insta_page)
        {
            $seller->insta_page = $request->insta_page;

        }
        if($request->has('phone') && $request->phone)
        {
            $seller->phone = $request->phone;

        }
        if($request->has('whatsapp') && $request->whatsapp)
        {
            $seller->whatsapp = $request->whatsapp;

        }
        if($request->has('web_url') && $request->web_url)
        {
            $seller->web_url = $request->web_url;

        }
        if($request->has('isFeatured') && $request->isFeatured)
        {
            $seller->isFeatured = $request->isFeatured;

        }
        if($request->has('logo') && $request->logo)
        {
            $seller->logo = $this->seller_logo($request->logo);
        }
        $seller->save();
        return redirect()->route('seller-management.index');
    }
    public function Apistore(Request $request)
    {
        // dd($request->all());
        $valid = $this->validator($request->all());
        if(!$valid->errors())
        {
            $check = Seller::find($request->user_id);
            if($check != null)
            {
                $seller = new Seller();
                $seller->user_id = $request->user_id;
            }
            else
            {
                $seller = $check;
            }
            if($request->has('business_name') && $request->business_name)
            {
                $seller->business_name = $request->business_name;

            }
            if($request->has('business_address') && $request->business_address)
            {
                $seller->business_address = $request->business_address;

            }
            if($request->has('faecbook_page') && $request->faecbook_page)
            {
                $seller->faecbook_page = $request->faecbook_page;

            }
            if($request->has('insta_page') && $request->insta_page)
            {
                $seller->insta_page = $request->insta_page;

            }
            if($request->has('phone') && $request->phone)
            {
                $seller->phone = $request->phone;

            }
            if($request->has('whatsapp') && $request->whatsapp)
            {
                $seller->whatsapp = $request->whatsapp;

            }
            if($request->has('web_url') && $request->web_url)
            {
                $seller->web_url = $request->web_url;

            }
            if($request->has('isFeatured') && $request->isFeatured)
            {
                $seller->isFeatured = $request->isFeatured;

            }
            if($request->has('logo') && $request->logo)
            {
                $seller->logo = $this->seller_logo($request->logo);
            }
            $seller->save();
        }
        else
        {
            return response()->json(['status' => 'error',
                'message' => $valid->errors()]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Seller has been updated Successfully...',
        ]);
    }
}
