<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    private $authService;


    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $request->validated();
        return $this->authService->login($request);
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();
        return $this->authService->register($request);
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}
