<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Seller;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;
use App\Traits\SaveImage;

class PostController extends Controller
{
    //
    use SaveImage;
    public function index()
    {
        $post = Post::all();
        return view('admin.pages.offers.offers.index',compact('post'));
    }
    public function create_offer_api(Request $request)
    {
        $this->validate($request, [
            'banner' => 'required|image|mimes:jpg,bmp,png,webp||max:2048',
            'title' => 'required',
            'description' => 'required',
            'hash_tag' => 'required',
            'IsFeature' => 'required|In:0,1',
        ]);
        try
        {
            if(auth('api')->user()->seller->shop != null)
            {
                $banner = $this->post_banner($request->banner);
                $shop_id = auth('api')->user()->seller->shop->id;
                $data = $request->all();
                $data['banner'] = $banner;
                $data['shop_id'] = $shop_id;
                $offer = Post::create($data);
                return $offer;
            }
            else
            {
                return response()->json(['error'=> "You've to make the shop first..."]);
            }

        }
        catch(Exception $ex)
        {
            return response()->json(['error'=> $ex->getMessage()]);
        }
    }

}
