<?php


namespace App\Services\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

interface AuthServiceInterface
{
    public function login(LoginRequest $request);

    public function logout();

    public function register(RegisterRequest $request);
}
