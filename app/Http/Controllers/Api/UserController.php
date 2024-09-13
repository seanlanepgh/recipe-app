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

    /** Use object composition to inject the AuthService into the UserController */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }
    /** Validates the request then defers to the authService login. */
    public function login(LoginRequest $request)
    {
        $request->validated();
        return $this->authService->login($request);
    }

    /** Validates the request then defers to the authService register. */
    public function register(RegisterRequest $request)
    {
        $request->validated();
        return $this->authService->register($request);
    }


    /** logout function that defers to the authService logout. */
    public function logout()
    {
        return $this->authService->logout();
    }
}
