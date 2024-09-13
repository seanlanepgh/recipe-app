<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthService implements Interfaces\AuthServiceInterface
{
    private $authRepository;

    /** Use object compostion to inject the AuthRepository class throught the interface*/
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    /** returns  */
    public function login(LoginRequest $request)
    {
        $user = $this->authRepository->login($request);
        if ($user)
            return response()->json(['message' => 'Logged in Successfully', 'user' => $user], 200);

        // Return a response similar to the response sent by validator to pick up by frontend easily
        return response()->json(['password' => 'Incorrect password.'], 401);
    }

    public function logout()
    {
        $user = $this->authRepository->logout();
        if ($user)
            return response()->json(['message' => 'Log out successful.'], 205);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authRepository->register($request);
        if ($user)
            return response()->json(['message' => 'Registered successfully.', 'user' => $user], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }
}
