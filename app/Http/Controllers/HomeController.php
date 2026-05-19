<?php

namespace App\Http\Controllers;
use App\Models\Media;
use App\Repositories\FrontendRepository;

class HomeController extends Controller
{

    public function __construct(FrontendRepository $frontendRepository)
    {
        $this->frontendRepository = $frontendRepository;
    }

    public function index()
    {
        $homeMedia = $this->frontendRepository->getHomeMedia();
        return view('pages.home.index',compact('homeMedia'));
    }
}
