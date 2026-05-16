<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function customer()
    {
        return view('pages.dashboard.customer', [
            'user' => Auth::user(),
        ]);
    }

    public function agent()
    {
        return view('pages.dashboard.agent', [
            'user' => Auth::user(),
        ]);
    }
}
