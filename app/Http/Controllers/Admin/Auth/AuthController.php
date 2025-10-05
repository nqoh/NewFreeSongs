<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegiusterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function Login(LoginRequest $request)
    {
        if(Auth::attempt(request()->only(['email','password'])))
           {
             return redirect()->route('Deshboard');
           }
         
            return back()->with('login','Invalid Credentials');
    }

    public function Register(RegiusterRequest $request)
    {
           User::create([
                'email' => request('email'),
                'name' => request('name'),
                'password' => Hash::make(request('password')),
              ]);
         
         return back()->with('register','NEW ADMIN HAS BEEN REGISTERED SUCCESSFULY');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('Login');     
    }

}
