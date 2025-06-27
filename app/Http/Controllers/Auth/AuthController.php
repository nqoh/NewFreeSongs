<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use \App\Utilities\HttpResponse;
    
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'name' => $request['name'],
        ]);

        return $this->successResponse(
            [
                'User' => $user,
                'ApiToken' => $user->createToken('API Token Of '. $user->name)->plainTextToken,
            ],
            'User registered successfully.',
            201
        );
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            return $this->successResponse(
                [
                    'User' => $user,
                    'ApiToken' => $user->createToken('API Token Of '. $user->name)->plainTextToken,
                ],
                'Login successful.',
                200
            );
        } else {
            return $this->errorResponse('Invalid credentials.', 401);
        }
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return $this->successResponse([], 'Logged out successfully.', 200);
    }
}
