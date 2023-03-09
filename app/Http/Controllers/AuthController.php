<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;


class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['seller_login','customer_login','register']]);
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

    public function register(Request $request)
    {
        try
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'role' => 'required|numeric|In:2,3',
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            $credentials = $request->only('email', 'password');
            $token = auth('api')->attempt($credentials);
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
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
