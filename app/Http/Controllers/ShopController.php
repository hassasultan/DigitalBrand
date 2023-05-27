<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;
use App\Traits\SaveImage;
class ShopController extends Controller
{
    //
    use SaveImage;
    public function create_shop_api(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'area' => 'required|numeric|exists:area,id',
            'branch_name' => 'required',
            'address' => 'required',
            'logo' => 'image|mimes:jpg,bmp,png,webp||max:2048'
        ]);
        try
        {
            if($request->has('logo'))
            {
                $logo = $this->shop_logo($request->logo);
            }
            $seller_id = auth('api')->user()->seller->id;
            $data = $request->all();
            $data['logo'] = $logo;
            $data['seller_id'] = $seller_id;
            $shop = Shop::create($data);
            return $shop;

        }
        catch(Exception $ex)
        {
            return response()->json(['error'=> $ex->getMessage()]);
        }
    }
    public function shop_list()
    {
        $shop_list = Shop::where('seller_id', auth('api')->user()->seller->id)->get();
        return $shop_list;
    }
}
