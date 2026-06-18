<?php

namespace App\Http\Controllers;

use App\Repositories\ToureRepository;
use App\Repositories\FrontendRepository;
use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    protected $touresRepository;
    protected $frontendRepository;
    protected $wishlistRepository;

    public function __construct(
        ToureRepository $touresRepository,
        FrontendRepository $frontendRepository,
        WishlistRepository $wishlistRepository
    ) {
        $this->touresRepository = $touresRepository;
        $this->frontendRepository = $frontendRepository;
        $this->wishlistRepository = $wishlistRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->touresRepository->getTours($request);
        $wishlistPackageIds = $this->wishlistRepository->getPackageIdsForAuthenticatedUser();

        if ($request->ajax()) {
            return response()->json([
                'html' => view(
                    'pages.toures.partials.tour-results',
                    [
                        'packages' => $data['packages'],
                        'wishlistPackageIds' => $wishlistPackageIds,
                    ]
                )->render(),
                'total' => $data['packages']->total(),
            ]);
        }

        $tourPackageMedia = $this->frontendRepository->getMediaByModuleSection('Tour Package');

        return view(
            'pages.toures.tour-list',
            array_merge($data, [
                'wishlistPackageIds' => $wishlistPackageIds,
                'tourPackageMedia' => $tourPackageMedia,
            ])
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $packageDetails = $this->touresRepository->getTourDetails($slug);
        $isWishlisted = $this->wishlistRepository->isPackageWishlistedForAuthenticatedUser($packageDetails->id);

        return view(
            'pages.toures.tour-details',
            compact('packageDetails', 'isWishlisted')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
