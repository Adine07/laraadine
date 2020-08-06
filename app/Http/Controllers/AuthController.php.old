<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function __construct()
    {
        // $this->middleware('guest')->except(['logout']); KECUALI
        $this->middleware('guest')->only(['login', 'register', 'loginProccess', 'registrationProccess']); // HANYA INI
        $this->middleware('auth')->only(['logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registrationProccess(Request $request)
    {
        $encriptPassword = bcrypt($request->password);


        $request->merge([
            'password' => $encriptPassword,
        ]);

        User::create($request->all());

        return redirect('/login');
    }

    public function loginProccess(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $isLoginSuccess = Auth::attempt($credentials);

        if ($isLoginSuccess) {
            return redirect()->intended('/');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
