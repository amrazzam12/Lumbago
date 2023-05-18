<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiTrait;
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('user_name', 'password');
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Wrong Data Please Try Again !',
            ], 401);
        }
        $user = Auth::guard('api')->user();
        return $this->responseSuccess(200 , 'Logged In Successfully!'  , [
           'user' => UserResource::make($user),
           'token' => $token
        ]);

    }

    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request['name'],
            'user_name' => $request['user_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'age' => $request['age'],
            'phone_number' => $request['phone_number'],
        ]);
        $token = Auth::guard('api')->login($user);
        return $this->responseSuccess(200 , 'User Created Successfully!'  , [
            'user' => UserResource::make($user),
            'token' => $token
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'Success',
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
