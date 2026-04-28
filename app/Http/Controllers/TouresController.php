<?php

namespace App\Http\Controllers;

use App\Models\Toures;
use Illuminate\Http\Request;

class TouresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Toures::with([
            'images' => function ($query) {
                $query->limit(4);
            }
        ])
        ->where('status', 1)
        ->latest()
        ->paginate(5);
        return view('tour-list', compact('packages'));
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
        $packageDetails = Toures::with([
            'images',
            'faqs',
            'highlights',
            'itinerary'
        ])
        ->where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

        return view('tour-details', compact('packageDetails'));
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
