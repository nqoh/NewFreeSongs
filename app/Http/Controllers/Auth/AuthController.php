<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
}
