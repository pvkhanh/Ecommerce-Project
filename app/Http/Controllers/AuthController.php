<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Login1Request;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{



    public function login1()
    {
        return view('admin.auth.pages.login1');
    }
    public function postLogin(Login1Request $request)
    {
        $loginInput = $request->input('login');
        $password = $request->input('password');
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $fieldType => $loginInput,
            'password' => $password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('admin')->with('message', 'Login successful!');
        }

        return back()->withErrors([
            'login' => 'Invalid email/username or password.',
        ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}