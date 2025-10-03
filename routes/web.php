<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// hanya untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    // otp butuh session otp_user_id
    Route::middleware('otp.session')->group(function () {
        Route::get('/otp', [AuthController::class, 'showOtpForm'])->name('otp.form');
        Route::post('/otp', [AuthController::class, 'verifyOtp'])->name('otp.verify');
        Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend.otp');
    });
});

// hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/penilaian', [AuthController::class, 'penilaian'])->name('penilaian');
Route::get('/audit_trail', [AuthController::class, 'audit_trail'])->name('audit_trail');
Route::get('/notification', [AuthController::class, 'notification'])->name('notification');
Route::get('/kuisioner', [AuthController::class, 'kuisioner'])->name('kuisioner');
Route::get('/response', [AuthController::class, 'response'])->name('response');
Route::get('/form', [AuthController::class, 'form'])->name('form');
