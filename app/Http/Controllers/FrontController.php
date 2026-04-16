<?php

namespace App\Http\Controllers;

class FrontController extends Controller
{
    public function contactUs()
    {
        return view('pages.contact-us');
    }
}
