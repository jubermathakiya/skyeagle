<?php

namespace App\Http\Controllers;

use App\Repositories\FrontendRepository;

class FrontController extends Controller
{
    public function __construct(
        protected FrontendRepository $frontendRepository,
    ) {
    }

    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function aboutUs()
    {
        $customerReviews = $this->frontendRepository->getCustomerReviews();

        return view('pages.about-us', compact('customerReviews'));
    }
}
