<?php

namespace App\Http\Controllers;

use App\Repositories\ToureRepository;
use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToursController extends Controller
{
    protected $touresRepository;
    protected $wishlistRepository;

    public function __construct(
        ToureRepository $touresRepository,
        WishlistRepository $wishlistRepository
    ) {
        $this->touresRepository = $touresRepository;
        $this->wishlistRepository = $wishlistRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->touresRepository->getTours($request);
        $wishlistPackageIds = Auth::check()
            ? $this->wishlistRepository->getPackageIdsForUser(Auth::id())
            : collect();

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

        return view(
            'pages.toures.tour-list',
            array_merge($data, [
                'wishlistPackageIds' => $wishlistPackageIds,
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
        $isWishlisted = Auth::check()
            ? $this->wishlistRepository->getPackageIdsForUser(Auth::id())->contains($packageDetails->id)
            : false;

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
