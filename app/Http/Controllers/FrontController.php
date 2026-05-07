<?php

namespace App\Http\Controllers;

class FrontController extends Controller
{
    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }
}