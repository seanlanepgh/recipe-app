<?php

namespace App\Repositories;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthRepository implements Interfaces\AuthRepositoryInterface
{
    /** The login function that takes an email and password. Creates an api_token for the user. */
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        // Attempt to log in the user with the provided credentials
        // If successful, generate a new API token and save it to the user's record
        if (Auth::attempt(["email" => $email, "password" => $password])) {
            Auth::user()->api_token = Str::random(60);
            Auth::user()->save();
            return Auth::user();
        }
        return false;
    }

    /** Logouts out the current user by setting their api_token back to null. */
    public function logout()
    {
        Auth::user()->api_token = null;
        if (Auth::user()->save())
            return true;
        return false;
    }

    /** Register function that takes email, name, and password. Hashes the password and also makes an api_token so user
     * will be logged in right away.
     */
    public function register(RegisterRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->api_token = Str::random(60);
        if ($user->save())
            return $user;
        else
            return false;
    }
}
