<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\InvalidStateException;
use GuzzleHttp\Client;

class SocialAuthController extends Controller
{
    private const PROVIDERS = ['google', 'facebook'];

    public function redirect(string $provider, Request $request)
    {
        $this->ensureProviderAllowed($provider);
        $redirectTo = $request->query('redirect') ?: url()->previous();
        $request->session()->put('social_redirect', $this->sanitizeRedirect($redirectTo));
        return Socialite::driver($provider)->redirect();
    }

    
    public function callback(string $provider, Request $request)
    {
        $this->ensureProviderAllowed($provider);
        try {
            /** @var AbstractProvider $socialiteDriver */
            $socialiteDriver = Socialite::driver($provider);
            if (app()->environment('local')) { 
                $socialiteDriver->setHttpClient( 
                    new Client([ 
                        'verify' => false, 
                    ]) 
                ); 
            }
            try {
                $socialUser = $socialiteDriver->user();
            } catch (InvalidStateException $e) {
                $socialUser = $socialiteDriver
                    ->stateless()
                    ->user();
            }
            $email = $socialUser->getEmail();
            $providerId = (string) $socialUser->getId();
            $avatar = $socialUser->getAvatar();
            if (!$email) {
                Log::error("Social login failed: email not found");
                return $this->finishRedirect($request, withError: true);
            }
            $user = User::query()
                ->where('email', $email)
                ->first();
            if (!$user) {
                $name = (string) ($socialUser->getName() ?: '');
                [$first, $last] = $this->splitName($name);
                $user = User::create([
                    'first_name' => $first,
                    'last_name' => $last,
                    'email' => $email,
                    'password' => bcrypt(Str::random(32)),
                    'email_verified_at' => now(),
                ]);
            }
            $this->applySocialFields(
                $user,
                $provider,
                $providerId,
                $avatar
            );
            if ($user->email_verified_at === null) {
                $user->forceFill([
                    'email_verified_at' => now(),
                ])->save();
            }
            Auth::login($user, true);
            Log::info("Social login success", [
                'provider' => $provider,
                'email' => $email,
                'user_id' => $user->id,
            ]);
            return $this->finishRedirect(
                $request,
                withError: false
            );
        } catch (\Throwable $e) {
            Log::error("Social callback failed ({$provider})", [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return $this->finishRedirect(
                $request,
                withError: true
            );
        }
    }


    private function ensureProviderAllowed(string $provider): void
    {
        if (! in_array($provider, self::PROVIDERS, true)) {
            abort(404);
        }
    }

    private function sanitizeRedirect(?string $url): string
    {
        if (! $url) {
            return route('home');
        }
        $appHost = parse_url(config('app.url'), PHP_URL_HOST);
        $host = parse_url($url, PHP_URL_HOST);
        if ($host && $appHost && ! hash_equals((string) $host, (string) $appHost)) {
            return route('home');
        }
        return $url;
    }

    private function finishRedirect(Request $request, bool $withError): RedirectResponse
    {
        $to = $request->session()->pull('social_redirect') ?: route('home');
        if ($withError) {
            return redirect($to)->with('error', 'Social login failed. Please try again.');
        }
        return redirect($to);
    }

    private function splitName(string $name): array
    {
        $name = trim(preg_replace('/\s+/', ' ', $name) ?? '');
        if ($name === '') {
            return ['', ''];
        }
        $parts = explode(' ', $name);
        $first = array_shift($parts) ?: '';
        $last = trim(implode(' ', $parts));
        return [$first, $last];
    }

    private function applySocialFields(User $user, string $provider, string $providerId, ?string $avatar): void
    {
        try {
            $payload = [
                'provider' => $provider,
                'provider_id' => $providerId,
            ];
            if (! empty($avatar)) {
                $payload['avatar'] = $avatar;
            }
            $user->forceFill($payload)->save();
        } catch (QueryException $e) {
            Log::warning('Social fields skipped: '.$e->getMessage());
        }
    }
}

