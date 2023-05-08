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
            'branch_name' => 'required',
            'address' => 'required',
            'logo' => 'required|image|mimes:jpg,bmp,png,webp||max:2048'
        ]);
        try
        {
            $logo = $this->shop_logo($request->logo);
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
}
