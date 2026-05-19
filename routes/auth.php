<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use Illuminate\Support\Facades\Route;

Route::post('auth/register-otp', [AuthController::class, 'register'])->name('auth.register.otp');
Route::post('auth/register-otp/verify', [AuthController::class, 'verify'])->name('auth.register.otp.verify');
Route::post('auth/register-otp/resend', [AuthController::class, 'resend'])->name('auth.register.otp.resend');

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('auth/forgot-password/send-otp', [AuthController::class, 'sendForgotOtp'])
    ->name('auth.forgot.sendOtp');
Route::post('auth/forgot-password/verify-otp', [AuthController::class, 'verifyForgotOtp'])
    ->name('auth.forgot.verifyOtp');
Route::post('auth/forgot-password/reset', [AuthController::class, 'resetForgotPassword'])
    ->name('auth.forgot.reset');
Route::post('auth/change-password', [AuthController::class, 'changePassword'])
    ->name('auth.changePassword');
Route::post('auth/forgot-otp/resend', [AuthController::class, 'resendForgotOtp'])
    ->name('auth.forgot.resendOtp');

Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('auth/{provider}/redirect', [SocialAuthController::class, 'redirect'])
    ->where('provider', 'google|facebook')
    ->name('auth.social.redirect');

Route::get('auth/{provider}/callback', [SocialAuthController::class, 'callback'])
    ->where('provider', 'google|facebook')
    ->name('auth.social.callback');
