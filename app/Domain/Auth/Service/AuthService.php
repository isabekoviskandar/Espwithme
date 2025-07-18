<?php

namespace App\Domain\Auth\Service;

use App\Api\Requests\LoginRequest;
use App\Api\Requests\RegisterRequest;
use App\Api\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{

    public function login(LoginRequest $request)
    {
        Log::info($request->validated());
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
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return response()->json([
            'message' => 'User registered successfully',
        ], 200);
    }

    public function user()
    {
        $user = Auth::user();

        return new UserResource($user);
    }
    
    public function change_password(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6'
        ]);

        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Sorry old password is incorrect',
            ]);
        }

        $user->update(['password' => Hash::make($validated['new_password'])]);

        return response()->json([
            'message' => 'Password updated successfully',
        ]);
    }
}
