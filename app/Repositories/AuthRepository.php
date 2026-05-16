<?php

namespace App\Repositories;

use App\Jobs\SendWhatsappOtpJob;
use App\Mail\ForgotPasswordOtpMail;
use App\Models\PasswordResetOtp;
use App\Models\User;
use App\Models\UserTemp;
use App\Services\WhatsAppService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthRepository
{
    public function startRegisterWithOtp(array $data, string $ip, string $ua)
    {
        $otp = (string) random_int(100000, 999999);
        $expiresAt = now()->addMinutes(5);
        UserTemp::query()
            ->where('email', $data['email'])
            ->orWhere('phone', $data['phone'])
            ->delete();
        $temp = UserTemp::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'otp' => $otp,
            'otp_expires_at' => $expiresAt,
            'last_otp_sent_at' => now(),
            'ip_address' => $ip,
            'user_agent' => $ua,
        ]);
        //app(WhatsAppService::class)->sendOtp($data['phone'], $otp);
        return ['temp' => $temp, 'otp' => $otp, 'expires_at' => $expiresAt];
    }

    public function verifyRegisterOtpAndCreateUser(string $email, string $otp)
    {
        $temp = UserTemp::query()->where('email', $email)->first();
        if (! $temp) {
            throw ValidationException::withMessages(['email' => 'Registration session not found.']);
        }
        if ($temp->otp_expires_at->isPast()) {
            throw ValidationException::withMessages(['otp' => 'OTP expired. Please resend OTP.']);
        }
        if ($temp->attempt_count >= 5) {
            throw ValidationException::withMessages(['otp' => 'Too many attempts. Please resend OTP.']);
        }
        if ($temp->otp !== $otp) {
            $temp->increment('attempt_count');
            throw ValidationException::withMessages(['otp' => 'Invalid OTP.']);
        }
        return DB::transaction(function () use ($temp) {
            $user = User::create([
                'first_name' => $temp->first_name,
                'last_name' => $temp->last_name,
                'email' => $temp->email,
                'phone' => $temp->phone,
                'password' => $temp->password,
                'role_id' => (int) config('roles.registration_default', config('roles.ids.user', 2)),
            ]);
            $temp->delete();
            return $user;
        });
    }

    public function resendRegisterOtp(string $email)
    {
        $temp = UserTemp::query()->where('email', $email)->firstOrFail();
        if ($temp->last_otp_sent_at && $temp->last_otp_sent_at->gt(now()->subSeconds(30))) {
            throw ValidationException::withMessages(['email' => 'Please wait 30 seconds before resending OTP.']);
        }
        $otp = (string) random_int(100000, 999999);
        $expiresAt = now()->addMinutes(5);
        $temp->update([
            'otp' => $otp,
            'otp_expires_at' => $expiresAt,
            'attempt_count' => 0,
            'last_otp_sent_at' => now(),
        ]);
        //SendWhatsappOtpJob::dispatch($temp->phone, $otp);
        return ['temp' => $temp, 'otp' => $otp, 'expires_at' => $expiresAt];
    }

    /**
     * Attempt customer-portal login (only role_id = configured "user" may succeed).
     *
     * @return 'success'|'invalid_credentials'|'admin_credentials'|'forbidden_role'
     */
    public function attemptLogin(string $login, string $password, bool $remember = false): string
    {
        $user = User::query()
            ->where('email', $login)
            ->orWhere('phone', $login)
            ->first();
        if (! $user || ! Hash::check($password, $user->password)) {
            return 'invalid_credentials';
        }

        if ($user->hasAdminRole()) {
            return 'admin_credentials';
        }

        if (! $user->hasCustomerRole()) {
            return 'forbidden_role';
        }

        Auth::login($user, $remember);

        return 'success';
    }

    public function createForgotOtp(string $email)
    {
        $user = User::query()->where('email', $email)->first();
        if (! $user) {
            throw ValidationException::withMessages(['email' => 'This email is not registered.']);
        }

        if (! $user->hasCustomerRole()) {
            throw ValidationException::withMessages(['email' => 'This email is not registered.']);
        }

        PasswordResetOtp::query()->where('user_id', $user->id)->delete();
        $otp = (string) random_int(100000, 999999);
        $expiresAt = now()->addMinutes(5);
        $record = PasswordResetOtp::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'otp' => $otp,
            'otp_expires_at' => $expiresAt,
            'last_otp_sent_at' => now(),
        ]);  
        Mail::to($user->email)->queue(
            new ForgotPasswordOtpMail(
                otp: $otp,
                userName: $user->name,
                expiresIn: '5 minutes'
            )
        );
        return ['record' => $record, 'otp' => $otp, 'expires_at' => $expiresAt];
    }

    public function verifyForgotOtp(string $email, string $otp)
    {
        $record = PasswordResetOtp::query()->where('email', $email)->first();
        if (! $record) throw ValidationException::withMessages(['email' => 'OTP request not found.']);
        if ($record->otp_expires_at->isPast()) throw ValidationException::withMessages(['otp' => 'OTP expired.']);
        if ($record->attempt_count >= 5) throw ValidationException::withMessages(['otp' => 'Too many attempts.']);
        if ($record->otp !== $otp) {
            $record->increment('attempt_count');
            throw ValidationException::withMessages(['otp' => 'Invalid OTP.']);
        }
        $record->update(['verified_at' => now()]);
    }

    public function resetPasswordAfterForgot(string $email, string $plainPassword)
    {
        $record = PasswordResetOtp::query()->where('email', $email)->first();
        if (! $record || ! $record->verified_at) {
            throw ValidationException::withMessages(['email' => 'OTP not verified.']);
        }
        if ($record->verified_at->lt(now()->subMinutes(10))) {
            throw ValidationException::withMessages(['email' => 'Verification expired. Re-verify OTP.']);
        }
        $user = User::query()->where('id', $record->user_id)->firstOrFail();
        $user->update(['password' => Hash::make($plainPassword)]);
        $record->delete();
    }

    public function changePassword(int $userId, string $current, string $new)
    {
        $user = User::findOrFail($userId);
        if (! Hash::check($current, $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'Current password is incorrect.']);
        }
        $user->update(['password' => Hash::make($new)]);
    }

    public function resendForgotOtp(string $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            throw new \Exception("User not found.");
        }
        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(5);
        DB::table('password_reset_otps')->updateOrInsert(
            ['email' => $email],
            [
                'otp' => $otp,
                'otp_expires_at' => $expiresAt,
                'created_at' => now(),
            ]
        );
        return [
            'otp' => $otp,
            'expires_at' => $expiresAt,
        ];
    }
    
}