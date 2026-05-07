<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterWithOtpRequest;
use App\Http\Requests\Auth\ResendRegisterOtpRequest;
use App\Http\Requests\Auth\ResetForgotPasswordRequest;
use App\Http\Requests\Auth\SendForgotOtpRequest;
use App\Http\Requests\Auth\VerifyForgotOtpRequest;
use App\Http\Requests\Auth\VerifyRegisterOtpRequest;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }
 
    public function register(RegisterWithOtpRequest $request)
    {
        try {
            $result = $this->authRepository->startRegisterWithOtp(
                $request->validated(),
                $request->ip(),
                (string) $request->userAgent()
            );
            return response()->json([
                'status' => true,
                'message' => 'OTP sent successfully.',
                'data' => [
                    'email' => $result['temp']->email,
                    'otp_expires_at' => $result['expires_at']->toIso8601String(),
                ],
            ]);
        } catch (\Throwable $e) {
            Log::error('Register OTP init failed: '.$e->getMessage());
            return response()->json(['status' => false, 'message' => 'Unable to process registration.'], 500);
        }
    }

    public function verify(VerifyRegisterOtpRequest $request)
    {
        $this->authRepository->verifyRegisterOtpAndCreateUser(
            $request->validated('email'),
            $request->validated('otp')
        );
        return response()->json([
            'status' => true,
            'message' => 'Register successful.',
            'open_login_modal' => true,
        ]);
    }
    
    public function resend(ResendRegisterOtpRequest $request)
    {
        $result = $this->authRepository->resendRegisterOtp($request->validated('email'));
        return response()->json([
            'status' => true,
            'message' => 'OTP resent.',
            'data' => [
                'otp_expires_at' => $result['expires_at']->toIso8601String(),
            ],
        ]);
    }


    public function login(LoginRequest $request)
    {
        $isLogin = $this->authRepository->attemptLogin(
            $request->validated('login'),
            $request->validated('password'),
            (bool) $request->boolean('remember')
        );
        if (!$isLogin) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email/phone or password.',
            ], 200);
        }
        return response()->json([
            'status' => true,
            'message' => 'Login successful.',
            'redirect' => route('dashboard'),
        ]);
    }

    public function sendForgotOtp(SendForgotOtpRequest $request)
    {
        $result = $this->authRepository->createForgotOtp($request->validated('email'));
        return response()->json([
            'status' => true,
            'message' => 'OTP sent to your email.',
            'data' => [
                'email' => $request->validated('email'),
                'otp_expires_at' => $result['expires_at']->toIso8601String(),
            ]
        ]);
    }

    public function verifyForgotOtp(VerifyForgotOtpRequest $request)
    {
        $this->authRepository->verifyForgotOtp(
            $request->validated('email'),
            $request->validated('otp')
        );
        return response()->json([
            'status' => true,
            'message' => 'OTP verified successfully.',
            'open_reset_password_modal' => true,
        ]);
    }

    public function resetForgotPassword(ResetForgotPasswordRequest $request)
    {
        $this->authRepository->resetPasswordAfterForgot(
            $request->validated('email'),
            $request->validated('password')
        );
        return response()->json([
            'status' => true,
            'message' => 'Password reset successful. Please login.',
            'open_login_modal' => true,
        ]);
    }
    
    public function resendForgotOtp(Request $request)
    {
        $result = $this->authRepository->resendForgotOtp($request->email);
        return response()->json([
            'status' => true,
            'message' => 'OTP resent successfully.',
            'data' => [
                'otp_expires_at' => $result['expires_at']->toIso8601String(),
            ]
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logout successful.');
    }

}
