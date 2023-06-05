<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Seller;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;
use App\Traits\SaveImage;
use Facebook\Facebook;
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
        try
        {
            $this->validate($request, [
                'banner' => 'required|image|mimes:jpg,bmp,png,webp|max:2048',
                'title' => 'required',
                'description' => 'required',
                'hash_tag' => 'required',
                'shop_id' => 'required',
                'category_id' => 'required|numeric',
                'subcat_id' => 'required',
                'IsFeature' => 'required|In:0,1',
                'area' => 'required|numeric|exists:area,id',
            ]);
            if(auth('api')->user()->seller->shop != null)
            {
                $banner = $this->post_banner($request->banner);
                // // $shop_id = auth('api')->user()->seller->shop->id;
                $data = $request->all();
                $data['banner'] = $banner;
                $data['subcat_id'] = $request->subcat_id[0];
                foreach($request->shop_id as $row)
                {
                    $data['shop_id'] = $row;
                    $offer = Post::create($data);

                }
                // $fb = new Facebook([
                //     'app_id' => config('app.facebook_app_id'),
                //     'app_secret' => config('app.facebook_app_secret'),
                //     'default_graph_version' => 'v17.0',
                // ]);
                // $pageAccessToken = config('app.facebook_default_access_token');

                // $fb->setDefaultAccessToken($pageAccessToken);
                // $message = 'Your hard-coded message';
                // $response = $fb->post('/pinkad.pk/feed', ['message' => $message]);
                // $graphNode = $response->getGraphNode();
                // dd($graphNode);

                return response()->json(['message'=> "Offer created Successfully..."]);


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
