<?php

namespace App\Api\Controllers;

use App\Api\Requests\LoginRequest;
use App\Api\Requests\RegisterRequest;
use App\Api\Resources\UserResource;
use App\Domain\Auth\Service\AuthService;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login(LoginRequest $request)
    {
        return $this->authService->login($request);
    }

    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request);
    }

    public function user()
    {
        return $this->authService->user();
    }
    
    public function change_password(Request $request)
    {
        return $this->authService->change_password($request);
    }
}
