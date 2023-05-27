<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Seller;
use App\Models\Shop;
use App\Models\Customer;
use App\Traits\SaveImage;
use Exception;


class AuthController extends Controller
{
    use SaveImage;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['seller_login','customer_login','register','salesman_login']]);
    }

    public function seller_login(Request $request)
    {
        try
        {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'role' => 'required|numeric|In:2',
            ]);
            $credentials = $request->only('email', 'password');
            $check = User::where('email',$request->email)->where('role', $request->role)->first();
            if($check)
            {
                $token = auth('api')->attempt($credentials);
                if (!$token) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Unauthorized',
                    ], 401);
                }

                $user = auth('api')->user();
                // dd($user->seller->status);
                if($user->seller->status == 0)
                {
                    Auth::logout();
                    return response()->json([
                        'message' => 'You are Currently De Active Now Kindly Contact to Admin...',

                    ]);
                }
                return response()->json([
                        'status' => 'success',
                        'user' => $user,
                        'authorisation' => [
                            'token' => $token,
                            'type' => 'bearer',
                        ]
                    ]);
            }
            else
            {
                return response()->json(['status' => 'error',
                'message' => "Invalid Credentials..."]);
            }
        }
        catch(Exception $ex)
        {
            return response()->json(['status' => 'error',
            'message' => $ex->getMessage()]);
        }

    }
    public function customer_login(Request $request)
    {
        try
        {
            $request->validate([
                'email' => 'required|string|email|exists:users,email',
                'password' => 'required|string',
                'role' => 'required|numeric|In:3',
            ]);
            $credentials = $request->only('email', 'password');
            $check = User::where('email',$request->email)->where('role', $request->role)->first();
            if($check)
            {
                $token = auth('api')->attempt($credentials);
                if (!$token) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Unauthorized',
                    ], 401);
                }

                $user = auth('api')->user();
                return response()->json([
                        'status' => 'success',
                        'user' => $user,
                        'authorisation' => [
                            'token' => $token,
                            'type' => 'bearer',
                        ]
                    ]);
            }
            else
            {
                return response()->json(['status' => 'error',
                'message' => "Invalid Credentials..."]);
            }
        }
        catch(Exception $ex)
        {
            return response()->json(['status' => 'error',
            'message' => $ex->getMessage()]);
        }

    }
    public function salesman_login(Request $request)
    {
        try
        {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'role' => 'required|numeric|In:4',
            ]);
            $credentials = $request->only('email', 'password');
            $check = User::where('email',$request->email)->where('role', $request->role)->first();
            if($check)
            {
                $token = auth('api')->attempt($credentials);
                // dd($token);
                if (!$token) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Unauthorized',
                    ], 401);
                }

                $user = auth('api')->user();
                return response()->json([
                        'status' => 'success',
                        'user' => $user,
                        'authorisation' => [
                            'token' => $token,
                            'type' => 'bearer',
                        ]
                    ]);
            }
            else
            {
                return response()->json(['status' => 'error',
                'message' => "Invalid Credentials..."]);
            }
        }
        catch(Exception $ex)
        {
            return response()->json(['status' => 'error',
            'message' => $ex->getMessage()]);
        }

    }

    public function register(Request $request)
    {
        try
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'role' => 'required|numeric|In:2,3',
                'phone' => 'required|string',
                'whatsapp' => 'required|string',
                'business_name' => 'required|string',
                'business_address' => 'required|string',
                'faecbook_page' => 'required|string',
                'insta_page' => 'required|string',
                'web_url' => 'required|string',
            ]);
            if($request->role == 2)
            {
                $request->validate([

                    'isFeatured' => 'required|string',
                    'logo' => 'required|image',
                    'reference' => 'required|string',
                    'shop_name' => 'required|string',
                    'area_id' => 'required|numeric',
                    'branch_name' => 'required|string',
                    // 'address' => 'required|string',
                    'cover_image' => 'required|image',

                ]);
                if($request->reference == "salesman")
                {
                    $request->validate([
                        'salesman_id' => 'required|numeric|exists:salemans,id',
                    ]);
                }
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            $credentials = $request->only('email', 'password');
            $token = auth('api')->attempt($credentials);
            if($request->role == 2)
            {
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
                if($request->has('reference'))
                {
                    $seller->reference = $request->reference;

                    if($request->reference == "salesman")
                    {
                        $seller->salesman_id = $request->salesman_id;
                    }
                }
                $seller->save();
                $data['seller_id'] = $seller->id;
                $data['name'] = $request->shop_name;
                $data['area'] = $request->area_id;
                $data['branch_name'] = $request->branch_name;
                $data['address'] = $request->business_address;
                if($request->has('cover_image'))
                {
                    $data['logo'] = $this->shop_logo($request->cover_image);
                }
                $shop = Shop::create($data);
                $shop->area = $request->area_id;
                $shop->save();

            }
            if($request->role == 3)
            {
                $customer = new Customer();
                $customer->user_id = $user->id;
                if($request->has('business_name') && $request->business_name)
                {
                    $customer->business_name = $request->business_name;

                }

                if($request->has('business_address') && $request->business_address)
                {
                    $customer->business_address = $request->business_address;

                }
                if($request->has('faecbook_page') && $request->faecbook_page)
                {
                    $customer->fb_page = $request->faecbook_page;

                }
                if($request->has('insta_page') && $request->insta_page)
                {
                    $customer->insta_page = $request->insta_page;

                }
                if($request->has('phone') && $request->phone)
                {
                    $customer->phone = $request->phone;

                }
                if($request->has('whatsapp') && $request->whatsapp)
                {
                    $customer->whatsapp = $request->whatsapp;

                }
                if($request->has('web_url') && $request->web_url)
                {
                    $customer->web_url = $request->web_url;

                }
                $customer->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }
        catch(Exception $ex)
        {
            return response()->json(['status' => 'error',
            'message' => $ex->getMessage()]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => auth('api')->user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
