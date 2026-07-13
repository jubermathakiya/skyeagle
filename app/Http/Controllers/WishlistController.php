<?php

namespace App\Http\Controllers;

use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct(
        protected WishlistRepository $wishlistRepository
    ) {
    }

    public function index()
    {
        $packages = $this->wishlistRepository->getPackagesForUser(Auth::id());

        return view('pages.wishlist.index', [
            'user' => Auth::user(),
            'packages' => $packages,
        ]);
    }

    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'open_login_modal' => true,
                'message' => 'Please sign in to save items to your wishlist.',
            ], 401);
        }

        $validated = $request->validate([
            'package_id' => ['required', 'integer', 'exists:packages,id'],
        ]);

        $result = $this->wishlistRepository->toggle(
            Auth::id(),
            (int) $validated['package_id']
        );

        return response()->json([
            'status' => true,
            'message' => $result['wishlisted']
                ? 'Added to wishlist.'
                : 'Removed from wishlist.',
            'data' => $result,
        ]);
    }
}
