<?php

namespace App\Http\Controllers;

use App\Repositories\FrontendRepository;
use App\Repositories\ToureRepository;
use App\Repositories\WishlistRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(
        protected FrontendRepository $frontendRepository,
        protected ToureRepository $touresRepository,
        protected WishlistRepository $wishlistRepository,
    ) {
    }

    public function index()
    {
        $homeMedia = $this->frontendRepository->getHomeMedia();
        $trendingTours = $this->touresRepository->getTrendingTours(8);
        $wishlistPackageIds = Auth::check()
            ? $this->wishlistRepository->getPackageIdsForUser(Auth::id())
            : collect();

        return view('pages.home.index', compact(
            'homeMedia',
            'trendingTours',
            'wishlistPackageIds',
        ));
    }
}
