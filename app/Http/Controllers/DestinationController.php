<?php

namespace App\Http\Controllers;

use App\Repositories\DestinationRepository;
use App\Repositories\WishlistRepository;

class DestinationController extends Controller
{
    public function __construct(
        protected DestinationRepository $destinationRepository,
        protected WishlistRepository $wishlistRepository
    ) {
    }

    public function index()
    {
        $destinations = $this->destinationRepository->getActiveDestinations();

        return view('pages.destinations.index', compact('destinations'));
    }

    public function show(string $slug)
    {
        $destination = $this->destinationRepository->getDestinationDetails($slug);
        $packages = $this->destinationRepository->getPackagesForDestination($destination);
        $wishlistPackageIds = $this->wishlistRepository->getPackageIdsForAuthenticatedUser();

        return view('pages.destinations.show', compact('destination', 'packages', 'wishlistPackageIds'));
    }
}
