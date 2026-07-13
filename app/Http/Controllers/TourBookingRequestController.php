<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourBookingRequest;
use App\Repositories\TourBookingRequestRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TourBookingRequestController extends Controller
{
    public function __construct(
        protected TourBookingRequestRepository $tourBookingRequestRepository
    ) {
    }

    public function store(StoreTourBookingRequest $request)
    {
        try {
            $bookingRequest = $this->tourBookingRequestRepository->storeFromRequest($request);

            return response()->json([
                'status' => true,
                'message' => 'Booking request submitted successfully.',
                'redirect' => Auth::check() ? route('customer-tour-booking') : null,
                'data' => [
                    'id' => $bookingRequest->id,
                    'status' => $bookingRequest->status,
                ],
            ]);
        } catch (\Throwable $e) {
            Log::error('Tour Booking Request Store Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again!',
            ], 500);
        }
    }

    public function index()
    {
        $bookingRequests = $this->tourBookingRequestRepository->getForCustomer(Auth::user());

        return view('pages.tour-bookings.index', [
            'user' => Auth::user(),
            'bookingRequests' => $bookingRequests,
        ]);
    }

    public function show(int $bookingRequest)
    {
        $bookingRequest = $this->tourBookingRequestRepository->findForCustomer(Auth::user(), $bookingRequest);

        return view('pages.tour-bookings.show', [
            'user' => Auth::user(),
            'bookingRequest' => $bookingRequest,
        ]);
    }
}
