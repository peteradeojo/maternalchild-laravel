<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->middleware('auth', 'verified')->name('home');

Route::prefix('/login')->group(function () {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::post('', [LoginController::class, 'store']);
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('/register')->group(function () {
    Route::get('', [RegisterController::class, 'index'])->name('register');
    Route::post('', [RegisterController::class, 'store']);
});

Route::prefix('/email')->group(function () {
    Route::get('/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'verification link sent');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});


// Patients
Route::resource('/patients', PatientsController::class)->middleware('auth', 'verified');
