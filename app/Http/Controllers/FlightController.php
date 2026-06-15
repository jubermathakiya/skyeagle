<?php

namespace App\Http\Controllers;

use App\Repositories\FlightRepository;
use App\Repositories\FrontendRepository;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function __construct(
        private readonly FlightRepository $flightRepository,
        private readonly FrontendRepository $frontendRepository
    )
    {
    }

    public function index(Request $request)
    {
        $data = $this->flightRepository->search($request);
        $flightMedia = $this->frontendRepository->getMediaByModuleSection('Flight');

        return view('pages.flights.index', [
            'flights' => $data['flights'],
            'criteria' => $data['criteria'],
            'meta' => $data['meta'],
            'flightMedia' => $flightMedia,
        ]);
    }

    public function show(string $flight, Request $request)
    {
        $flightDetails = $this->flightRepository->find($flight, $request);
        $flightMedia = $this->frontendRepository->getMediaByModuleSection('Flight');

        abort_if(! $flightDetails, 404);

        return view('pages.flights.show', compact('flightDetails', 'flightMedia'));
    }

    public function trending()
    {
        $flights = $this->flightRepository->trending(6);

        return response()->json([
            'html' => view('pages.flights.partials.trending-flights', compact('flights'))->render(),
            'total' => count($flights),
        ]);
    }
}
