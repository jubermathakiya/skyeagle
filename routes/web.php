<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityAutocompleteController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TourBookingRequestController;
use App\Http\Controllers\TourReviewController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('contact-us', [FrontController::class, 'contactUs'])->name('contact-us');
Route::get('about-us', [FrontController::class, 'aboutUs'])->name('about-us');
Route::get('blogs', [BlogController::class, 'index'])->name('blog-grid');
Route::post('blogs/{blog}/comments', [BlogController::class, 'storeComment'])
    ->middleware('throttle:10,1')
    ->name('blog-comments.store');
Route::get('blogs/{slug}', [BlogController::class, 'show'])->name('blog-details');
Route::resource('contact', ContactController::class);
Route::post('enquiry', [ContactController::class,'saveEnquiry'])->name('enquiry.store');
Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('destination', fn () => redirect()->route('destinations.index'))->name('destination');
Route::get('destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('destinations/{slug}', [DestinationController::class, 'show'])->name('destinations.show');

//Home routes
Route::get('tours/trending', [HomeController::class, 'trending'])->name('tours.trending');
Route::get('flights/trending', [FlightController::class, 'trending'])->name('flights.trending');

// Flight Routes
Route::get('flights', [FlightController::class, 'index'])->name('flight-grid');
Route::get('flights/{flight}', [FlightController::class, 'show'])->name('flight-details');

Route::post('wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::post('tour-booking-requests', [TourBookingRequestController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('tour-booking-requests.store');
 
// Tour Routes
Route::get('tour-details/{slug}', [ToursController::class, 'show'])->name('tour-details');
Route::post('tours/{tour}/reviews', [TourReviewController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('tour-reviews.store');
Route::get('cities/autocomplete', [CityAutocompleteController::class, 'searchGeoapifyCities'])
    ->name('cities.autocomplete');
Route::get('tours', [ToursController::class, 'index'])->name('tour-list');

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
    Route::get('customer-tour-booking', [TourBookingRequestController::class, 'index'])->name('customer-tour-booking');
    Route::get('customer-tour-booking/{bookingRequest}', [TourBookingRequestController::class, 'show'])
        ->whereNumber('bookingRequest')
        ->name('customer-tour-booking.show');
});
