<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(protected BlogRepository $blogRepository)
    {
    }

    public function index(Request $request)
    {
        $blogs = $this->blogRepository->getBlogs($request);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('pages.blogs.partials.blog-results', compact('blogs'))->render(),
                'total' => $blogs->total(),
            ]);
        }

        return view('pages.blogs.index', compact('blogs'));
    }

    public function show(string $slug)
    {
        $blog = $this->blogRepository->getBlogDetails($slug);
        $relatedPosts = $this->blogRepository->getRelatedPosts($blog);
        $popularTags = $this->blogRepository->getPopularTags();

        return view('pages.blogs.show', compact('blog', 'relatedPosts', 'popularTags'));
    }
}
