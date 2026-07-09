<?php

namespace App\Providers;

use App\Contracts\FlightApiContract;
use App\Repositories\FrontendRepository;
use App\Repositories\WishlistRepository;
use App\Services\Flight\TravelpayoutsFlightApiService;
use App\Support\PageTitle;
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
        $this->app->bind(FlightApiContract::class, TravelpayoutsFlightApiService::class);
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

        View::composer('layout.partials.footer', function ($view) {
            $view->with('footerPolicyPages', app(FrontendRepository::class)->getPolicyPagesForFooter());
        });

        View::composer('layout.mainlayout', function ($view) {
            $data = $view->getData();

            $view->with('documentTitle', PageTitle::resolve(
                $data['title'] ?? null,
                $data['page'] ?? null,
                request()->route()?->getName()
            ));
        });

        View::composer('components.partials.login-modal', function ($view) {
            $frontendRepository = app(FrontendRepository::class);

            $view->with([
                'loginWithOtpMedia' => $frontendRepository->getMediaByModuleSection('Login With OTP'),
                'loginWithPasswordMedia' => $frontendRepository->getMediaByModuleSection('Login With Password'),
            ]);
        });
    }
}
