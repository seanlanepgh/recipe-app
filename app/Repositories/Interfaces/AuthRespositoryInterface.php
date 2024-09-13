<?php


namespace App\Repositories\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

/** Interface for the AuthRepository 
 * Need login, logout, and register function.
 */
interface AuthRepositoryInterface
{
    public function login(LoginRequest $request);

    public function logout();

    public function register(RegisterRequest $request);
}
