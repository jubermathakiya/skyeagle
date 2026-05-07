<?php

namespace App\Http\Controllers;

use App\Repositories\ToureRepository;
use Illuminate\Http\Request;

class TouresController extends Controller
{
    protected $touresRepository;
    public function __construct(ToureRepository $touresRepository)
    {
        $this->touresRepository = $touresRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->touresRepository->getTours($request);
        if ($request->ajax()) {
            return response()->json([
                'html' => view(
                    'pages.toures.partials.tour-results',
                    ['packages' => $data['packages']]
                )->render(),
                'total' => $data['packages']->total(),
            ]);
        }
        return view(
            'pages.toures.tour-list',
            $data
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
        return view(
            'pages.toures.tour-details',
            compact('packageDetails')
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
