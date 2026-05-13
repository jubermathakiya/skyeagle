<?php

namespace App\Http\Controllers;

use App\Repositories\AirportRepository;
use App\Repositories\FlightRepository;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function __construct(
        protected FlightRepository $flightRepository,
        protected AirportRepository $airportRepository
    ) {
    }

    public function index(Request $request)
    {
        $data = $this->flightRepository->search($request);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('pages.flights.partials.flight-results', $data)->render(),
                'total' => $data['flights']->total(),
            ]);
        }

        return view('pages.flights.index', $data);
    }

    public function searchAirports(Request $request)
    {
        $keyword = trim((string) $request->query('q', ''));
        $airports = $this->airportRepository->search($keyword);

        return response()->json([
            'status' => true,
            'data' => $airports->map(static function ($airport) {
                return [
                    'code' => $airport->iata_code,
                    'city' => $airport->city,
                    'name' => $airport->name,
                    'country' => $airport->country,
                    'label' => $airport->city . ' (' . $airport->iata_code . ')',
                ];
            })->values(),
        ]);
    }
}
