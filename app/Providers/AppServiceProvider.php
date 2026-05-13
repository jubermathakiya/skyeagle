<?php

namespace App\Providers;

use App\Contracts\FlightApiContract;
use App\Repositories\WishlistRepository;
use App\Services\Flight\DummyFlightApiService;
use App\Services\Flight\HttpFlightApiService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FlightApiContract::class, function () {
            $driver = config('flights.driver', 'dummy');

            return $driver === 'http'
                ? $this->app->make(HttpFlightApiService::class)
                : $this->app->make(DummyFlightApiService::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layout.partials.topbar', function ($view) {
            $wishlistCount = 0;

            if (Auth::check()) {
                $wishlistCount = app(WishlistRepository::class)->countForUser(Auth::id());
            }

            $view->with('wishlistCount', $wishlistCount);
        });
    }
}
