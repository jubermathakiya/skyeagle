<?php

namespace App\Http\Controllers;

use App\Repositories\FrontendRepository;
use App\Repositories\ToureRepository;
use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        protected FrontendRepository $frontendRepository,
        protected ToureRepository $touresRepository,
        protected WishlistRepository $wishlistRepository
    ) {

    }

    public function index()
    {
        $homeMedia = $this->frontendRepository->getHomeMedia();

        return view('pages.home.index', compact('homeMedia'));
    }

    public function trending(Request $request)
    {
        $packages = $this->touresRepository->getTrendingTours(8);
        $wishlistPackageIds = $this->wishlistRepository->getPackageIdsForAuthenticatedUser();

        return response()->json([
            'html' => view(
                'pages.home.partials.trending-tours',
                compact('packages', 'wishlistPackageIds')
            )->render(),
            'total' => $packages->count(),
        ]);
    }
}
