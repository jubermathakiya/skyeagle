<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityAutocompleteController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('contact-us', [FrontController::class, 'contactUs'])->name('contact-us');
Route::get('about-us', [FrontController::class, 'aboutUs'])->name('about-us');
Route::resource('contact', ContactController::class);
Route::post('enquiry', [ContactController::class,'saveEnquiry'])->name('enquiry.store');

Route::middleware(['auth'])->group(function () {
    Route::get('agent-dashboard', [DashboardController::class, 'agent'])->name('agent-dashboard');
});

Route::middleware(['auth', 'customer'])->group(function () {

    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'customer'])->name('dashboard');

    //Profile route
    Route::get('my-profile', [ProfileController::class, 'show'])->name('my-profile');
    Route::get('profile-settings', [ProfileController::class, 'settings'])->name('profile-settings');
    Route::put('profile-settings', [ProfileController::class, 'update'])->name('profile-settings.update');

    Route::prefix('locations')->group(function () {
        Route::get('countries/search', [LocationController::class, 'searchCountries'])
            ->name('locations.countries.search');
        Route::get('states', [LocationController::class, 'states'])->name('locations.states');
        Route::get('cities', [LocationController::class, 'cities'])->name('locations.cities');
    });

    //Wishlist route
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
});
 
// Tour Routes
Route::get('tour-details/{slug}', [ToursController::class, 'show'])->name('tour-details');
Route::get('cities/autocomplete', [CityAutocompleteController::class, 'searchGeoapifyCities'])
    ->name('cities.autocomplete');
Route::get('tours', [ToursController::class, 'index'])->name('tour-list');

