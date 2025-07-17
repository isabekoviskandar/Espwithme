<?php

namespace App\Domain\Auth\Service;

use App\Api\Requests\LoginRequest;
use App\Api\Requests\RegisterRequest;
use App\Api\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function login(LoginRequest $request)
    {
        $loginField = $request->validated();

        if (!Auth::attempt($loginField)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'User logged succesfully',
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $newUser = $request->validated();
        $user = User::create($newUser);

        return response()->json([
            'message' => 'User registered succesfully',
        ] , 200);
    }

}
