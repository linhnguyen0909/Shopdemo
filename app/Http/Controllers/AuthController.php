<?php

namespace App\Http\Controllers;

use App\Enums\GuardType;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use Flugg\Responder\Exceptions\Http\PageNotFoundException;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:admin,user', ['except' => ['login', 'register']]);
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
        return $this->creaNewToken($token);
    }

    public function register(UserRegisterRequest $request)
    {
        $user = new User($request->all());
        $user->id = Uuid::generate();
        //$user->sendEmailVerificationNotification();
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
        return $this->creaNewToken(auth()->refresh());
    }

    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    public function creaNewToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ]);
    }

    private function checkGuard(Request $request)
    {
        $this->guard = $request->route('guard');
        if (!in_array($this->guard, GuardType::getValues())) {
            throw new PageNotFoundException();
        }
    }
}
