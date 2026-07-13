<?php

namespace App\Http\Controllers;

use App\Repositories\TourBookingRequestRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
        protected TourBookingRequestRepository $tourBookingRequestRepository
    ) {
    }

    public function customer()
    {
        $user = Auth::user();

        return view('pages.dashboard.customer', [
            'user' => $user,
            'bookingStats' => $this->tourBookingRequestRepository->getCustomerStats($user),
            'recentBookingRequests' => $this->tourBookingRequestRepository->getRecentForCustomer($user, 5),
        ]);
    }

    public function agent()
    {
        return view('pages.dashboard.agent', [
            'user' => Auth::user(),
        ]);
    }
}
