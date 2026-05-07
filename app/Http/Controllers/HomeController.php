<?php

namespace App\Http\Controllers;
use App\Models\Media;

class HomeController extends Controller
{
    public function index()
    {
        $homeMedia = Media::with('images')
        ->where('module', 'Home')
        ->where('is_active', 1)
        ->first();
        return view('index-3',compact('homeMedia'));
    }
}
