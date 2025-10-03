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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/otp', [AuthController::class, 'showOtpForm'])->name('otp.form');
Route::post('/otp', [AuthController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend.otp');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/penilaian', [AuthController::class, 'penilaian'])->name('penilaian');
Route::get('/audit_trail', [AuthController::class, 'audit_trail'])->name('audit_trail');
Route::get('/notification', [AuthController::class, 'notification'])->name('notification');
Route::get('/kuisioner', [AuthController::class, 'kuisioner'])->name('kuisioner');
Route::get('/response', [AuthController::class, 'response'])->name('response');
Route::get('/form', [AuthController::class, 'form'])->name('form');
