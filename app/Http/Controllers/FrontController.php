<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;
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

    public function contentPage(string $slug)
    {
        $contentPage = $this->frontendRepository->getContentPageBySlug($slug);

        abort_if(!$contentPage, 404);

        $mediaModule = ContentPage::MANAGED_PAGES[$contentPage->slug] ?? $contentPage->title;
        $contentPageMedia = $this->frontendRepository->getMediaByModuleSection($mediaModule);

        return view('pages.content-page', compact('contentPage', 'contentPageMedia'));
    }
}
