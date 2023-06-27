<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Traits\SaveImage;
use Exception;

class BannerController extends Controller
{
    //
    use SaveImage;
    public function bannerApi()
    {
        $banners = Banner::where('status',1)->get();
        return $banners;
    }
    public function create_banner_api(Request $request)
    {
        try
        {
            $this->validate($request, [
                'area' => 'required|numeric|exists:area,id',
                'shop_id' => 'required|numeric|exists:shop,id',
                'subcat_id' => 'required|numeric|exists:sub_category,id',
                'redirect_url' => 'required',
                'image' => 'image|mimes:jpg,bmp,png,webp|max:2048'
            ]);
            if($request->has('image'))
            {
                $image = $this->shop_logo($request->image);
            }
            $data = $request->all();
            $data['image'] = $image;
            $banner = Banner::create($data);
            return $banner;

        }
        catch(Exception $ex)
        {
            return response()->json(['error'=> $ex->getMessage()]);
        }
    }
}
