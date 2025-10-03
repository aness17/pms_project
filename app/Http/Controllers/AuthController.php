<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['username' => 'Incorrect username or password.']);
        }

        if ($user->is_blocked) {
            return back()->withErrors(['username' => 'Account blocked.']);
        }

        // generate OTP (lebih aman pakai random_int)
        $otp = random_int(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(5);

        $otpRecord = UserOtp::create([
            'id_user'    => $user->id_user,
            'otp_code'   => (string)$otp,
            'expires_at' => $expiresAt,
        ]);

        // kirim email
        Mail::raw("Kode OTP Anda adalah: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Kode OTP Login');
        });

        // simpan session sementara supaya verify/resend bisa pakai session
        session([
            'otp_user_id'     => $user->id_user,
            'otp_user_email'  => $user->email,
            'otp_expires_at'  => $expiresAt->toDateTimeString(),
        ]);

        $expiresIn = Carbon::now()->diffInSeconds($expiresAt);

        return view('auth.otp', [
            'email'     => $user->email,
            'expiresIn' => $expiresIn,
        ]);
    }

    public function showOtpForm()
    {
        if (!session()->has('otp_user_id')) {
            return redirect()->route('login')->withErrors(['otp' => 'Silakan login terlebih dahulu.']);
        }

        return view('auth.otp', [
            'email' => session('otp_user_email'),
            'expiresIn' => session('otp_expires_at')
                ? now()->diffInSeconds(session('otp_expires_at'))
                : 300,
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        $userId = session('otp_user_id');
        if (!$userId) {
            return redirect()->route('login')->withErrors(['otp' => 'Session tidak valid. Silakan login ulang.']);
        }

        $otpRecord = UserOtp::where('id_user', $userId)
            ->where('otp_code', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if (!$otpRecord) {
            return back()->withErrors(['otp' => 'OTP salah atau kadaluarsa']);
        }

        $user = User::find($userId);

        // login menggunakan Laravel Auth
        Auth::login($user);

        // update status login di DB
        $user->update([
            'is_login' => true,
            'last_login_date' => Carbon::now(),
        ]);

        // hapus atau tandai OTP terpakai
        $otpRecord->delete();

        // bersihkan session sementara
        session()->forget(['otp_user_id', 'otp_user_email', 'otp_expires_at']);

        return redirect()->intended('/dashboard');
    }

    public function resendOtp(Request $request)
    {
        // pakai session untuk reference user
        $userId = session('otp_user_id');
        if (!$userId) {
            return redirect()->route('login')->withErrors(['otp' => 'Session tidak ada. Silakan login ulang.']);
        }

        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('login')->withErrors(['otp' => 'User tidak ditemukan.']);
        }

        // buat OTP baru
        $otp = random_int(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(5);

        UserOtp::create([
            'id_user' => $user->id_user,
            'otp_code' => (string)$otp,
            'expires_at' => $expiresAt,
        ]);

        // kirim email
        Mail::raw("Kode OTP Anda (ulang) adalah: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Kode OTP Login (Kirim Ulang)');
        });

        // update session expires
        session(['otp_expires_at' => $expiresAt->toDateTimeString()]);

        $expiresIn = Carbon::now()->diffInSeconds($expiresAt);

        return view('auth.otp', [
            'email'     => $user->email,
            'expiresIn' => $expiresIn,
            'message'   => 'OTP terkirim ulang ke ' . $user->email,
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $user->update(['is_login' => false]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function dashboard()
    {
        return view('dashboard'); // bikin file resources/views/dashboard.blade.php
    }
}
