<?php

namespace App\Http\Controllers;

use App\Repositories\FrontendRepository;

class HomeController extends Controller
{
    public function __construct(
        protected FrontendRepository $frontendRepository,
    ) {
    }

    public function index()
    {
        $homeMedia = $this->frontendRepository->getHomeMedia();

        return view('pages.home.index', compact('homeMedia'));
    }
}
