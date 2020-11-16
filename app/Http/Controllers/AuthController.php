<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\User;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request, LoginAuthRequest $loginRequest)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    public function register(Request $request, RegisterAuthRequest $registerRequesr)
    {
        $validator = Validator::make($request->all(), [$registerRequesr]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = new User($request->all());
        $user->id = Uuid::generate();
        $user->save();
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    public function createNewToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ]);
    }
}
