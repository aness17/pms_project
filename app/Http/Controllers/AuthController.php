<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // regenerasi session
            $request->session()->regenerate();

            // redirect ke halaman OTP
            return redirect()->route('otp');
        }

        // kalau gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function dashboard()
    {
        return view('dashboard'); // bikin file resources/views/dashboard.blade.php
    }

    public function showOTP()
    {
        return view('auth.otp'); // resources/views/auth/otp.blade.php
    }

    public function verifyOtp(Request $request)
    {
        $otp = $request->input('otp');
        $password = $request->input('password');

        // contoh validasi sederhana
        if ($otp == '123456' && $password == 'btn123') {
            // arahkan ke dashboard setelah OTP valid
            return view('dashboard'); // resources/views/dashboard.blade.php
        }

        // kalau gagal
        return back()->withErrors(['otp' => 'OTP atau Password salah']);
    }
}
