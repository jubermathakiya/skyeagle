<?php

namespace App\Repositories;

use App\Jobs\SendWhatsappOtpJob;
use App\Mail\ForgotPasswordOtpMail;
use App\Mail\LoginOtpMail;
use App\Models\LoginOtp;
use App\Models\PasswordResetOtp;
use App\Models\User;
use App\Models\UserTemp;
use App\Services\WhatsAppService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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

    public function sendLoginOtp(string $login): array
    {
        $identifier = $this->parseLoginIdentifier($login);
        $storedLogin = $identifier['value'];

        $user = $this->findUserByLogin($login);

        if ($user) {
            if ($user->hasAdminRole()) {
                throw ValidationException::withMessages(['login' => config('roles.messages.admin_credentials_on_customer_login')]);
            }

            if (! $user->hasCustomerRole()) {
                throw ValidationException::withMessages(['login' => config('roles.messages.non_user_role')]);
            }

            LoginOtp::query()->where('user_id', $user->id)->delete();

            $otp = (string) random_int(100000, 999999);
            $expiresAt = now()->addMinutes(5);

            LoginOtp::create([
                'user_id' => $user->id,
                'login' => $storedLogin,
                'is_registration' => false,
                'otp' => $otp,
                'otp_expires_at' => $expiresAt,
                'last_otp_sent_at' => now(),
            ]);

            $this->dispatchLoginOtp($user, $otp);

            return [
                'expires_at' => $expiresAt,
                'display_login' => $this->maskLoginForDisplay($user, $storedLogin),
                'is_new_user' => false,
                'login' => $storedLogin,
            ];
        }

        $temp = $this->createOrUpdateLoginOtpTemp($identifier);

        $this->dispatchLoginOtpToTemp($temp);

        return [
            'expires_at' => $temp->otp_expires_at,
            'display_login' => $this->maskLoginForDisplayFromIdentifier($identifier),
            'is_new_user' => true,
            'login' => $storedLogin,
        ];
    }

    public function verifyLoginOtpAndAuth(string $login, string $otp, bool $remember = false): string
    {
        $identifier = $this->parseLoginIdentifier($login);
        $storedLogin = $identifier['value'];

        $user = $this->findUserByLogin($login);

        if ($user) {
            return $this->verifyExistingUserLoginOtp($user, $storedLogin, $otp, $remember);
        }

        $temp = $this->findLoginOtpTempByIdentifier($identifier);

        if (! $temp) {
            throw ValidationException::withMessages(['otp' => 'OTP session not found. Please request a new OTP.']);
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

        $user = DB::transaction(fn () => $this->createUserFromLoginTemp($temp));

        Auth::login($user, $remember);

        return 'registered';
    }

    public function resendLoginOtp(string $login): array
    {
        $identifier = $this->parseLoginIdentifier($login);
        $storedLogin = $identifier['value'];
        $user = $this->findUserByLogin($login);

        if ($user) {
            $record = LoginOtp::query()->where('login', $storedLogin)->first();
            if ($record?->last_otp_sent_at?->gt(now()->subSeconds(30))) {
                throw ValidationException::withMessages(['login' => 'Please wait 30 seconds before resending OTP.']);
            }
        } else {
            $temp = $this->findLoginOtpTempByIdentifier($identifier);
            if ($temp?->last_otp_sent_at?->gt(now()->subSeconds(30))) {
                throw ValidationException::withMessages(['login' => 'Please wait 30 seconds before resending OTP.']);
            }
        }

        return $this->sendLoginOtp($login);
    }

    protected function verifyExistingUserLoginOtp(User $user, string $storedLogin, string $otp, bool $remember): string
    {
        $record = LoginOtp::query()
            ->where('user_id', $user->id)
            ->where('login', $storedLogin)
            ->first();

        if (! $record) {
            throw ValidationException::withMessages(['otp' => 'OTP session not found. Please request a new OTP.']);
        }
        if ($record->otp_expires_at->isPast()) {
            throw ValidationException::withMessages(['otp' => 'OTP expired. Please resend OTP.']);
        }
        if ($record->attempt_count >= 5) {
            throw ValidationException::withMessages(['otp' => 'Too many attempts. Please resend OTP.']);
        }
        if ($record->otp !== $otp) {
            $record->increment('attempt_count');
            throw ValidationException::withMessages(['otp' => 'Invalid OTP.']);
        }

        if (! $user->hasCustomerRole()) {
            return 'forbidden_role';
        }

        if ($user->hasAdminRole()) {
            return 'admin_credentials';
        }

        LoginOtp::query()->where('user_id', $user->id)->delete();

        if ($user->email && $user->email_verified_at === null) {
            $user->forceFill(['email_verified_at' => now()])->save();
        }

        Auth::login($user, $remember);

        return 'success';
    }

    protected function createOrUpdateLoginOtpTemp(array $identifier): UserTemp
    {
        $otp = (string) random_int(100000, 999999);
        $expiresAt = now()->addMinutes(5);

        if ($identifier['type'] === 'email') {
            UserTemp::query()->where('email', $identifier['value'])->delete();
        } else {
            UserTemp::query()->where('phone', $identifier['value'])->delete();
        }

        return UserTemp::create([
            'first_name' => null,
            'last_name' => null,
            'email' => $identifier['type'] === 'email' ? $identifier['value'] : null,
            'phone' => $identifier['type'] === 'phone' ? $identifier['value'] : null,
            'password' => Hash::make(Str::random(32)),
            'otp' => $otp,
            'otp_expires_at' => $expiresAt,
            'attempt_count' => 0,
            'last_otp_sent_at' => now(),
        ]);
    }

    protected function findLoginOtpTempByIdentifier(array $identifier): ?UserTemp
    {
        if ($identifier['type'] === 'email') {
            return UserTemp::query()->where('email', $identifier['value'])->first();
        }

        return UserTemp::query()->where('phone', $identifier['value'])->first();
    }

    protected function createUserFromLoginTemp(UserTemp $temp): User
    {
        $roleId = (int) config('roles.registration_default', config('roles.ids.user', 2));

        $user = User::create([
            'first_name' => $temp->first_name,
            'last_name' => $temp->last_name,
            'email' => $temp->email,
            'phone' => $temp->phone,
            'password' => $temp->password,
            'role_id' => $roleId,
            'email_verified_at' => $temp->email ? now() : null,
        ]);

        $temp->delete();

        return $user;
    }

    protected function dispatchLoginOtpToTemp(UserTemp $temp): void
    {
        $userName = trim(($temp->first_name ?? '').' '.($temp->last_name ?? '')) ?: 'User';

        if ($temp->email) {
            Mail::to($temp->email)->queue(
                new LoginOtpMail(
                    otp: $temp->otp,
                    userName: $userName,
                    expiresIn: '5 minutes'
                )
            );

            return;
        }

        if ($temp->phone) {
            SendWhatsappOtpJob::dispatch($temp->phone, $temp->otp);
        }
    }

    protected function maskLoginForDisplayFromIdentifier(array $identifier): string
    {
        if ($identifier['type'] === 'email') {
            return $identifier['value'];
        }

        $phone = $identifier['value'];
        if (strlen($phone) >= 10) {
            $last10 = substr($phone, -10);

            return '+91 '.substr($last10, 0, 5).' '.substr($last10, 5);
        }

        return $phone;
    }

    protected function parseLoginIdentifier(string $login): array
    {
        $login = trim($login);

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return ['type' => 'email', 'value' => strtolower($login)];
        }

        $digits = preg_replace('/\D+/', '', $login);
        if (strlen($digits) >= 10 && strlen($digits) <= 15) {
            return ['type' => 'phone', 'value' => $digits];
        }

        throw ValidationException::withMessages([
            'login' => 'Enter a valid email address or phone number',
        ]);
    }

    protected function findUserByLogin(string $login): ?User
    {
        $identifier = $this->parseLoginIdentifier($login);

        if ($identifier['type'] === 'email') {
            return User::query()->where('email', $identifier['value'])->first();
        }

        return User::query()
            ->where('phone', $identifier['value'])
            ->orWhere('phone', trim($login))
            ->first();
    }

    protected function dispatchLoginOtp(User $user, string $otp): void
    {
        $userName = trim($user->first_name.' '.$user->last_name) ?: 'User';

        if ($user->email) {
            
            Mail::to($user->email)->queue(
                new LoginOtpMail(
                    otp: $otp,
                    userName: $userName,
                    expiresIn: '5 minutes'
                )
            );

            return;
        }

        if ($user->phone) {
            SendWhatsappOtpJob::dispatch($user->phone, $otp);
        }
    }

    protected function maskLoginForDisplay(User $user, string $login): string
    {
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return $login;
        }

        $phone = preg_replace('/\D+/', '', $user->phone ?: $login);
        if (strlen($phone) >= 10) {
            $last10 = substr($phone, -10);

            return '+91 '.substr($last10, 0, 5).' '.substr($last10, 5);
        }

        return $login;
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