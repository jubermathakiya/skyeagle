<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Repositories\BlogRepository;
use App\Repositories\FrontendRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function __construct(
        protected BlogRepository $blogRepository,
        protected FrontendRepository $frontendRepository
    )
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

        $blogMedia = $this->frontendRepository->getMediaByModuleSection('Blog');

        return view('pages.blogs.index', compact('blogs', 'blogMedia'));
    }

    public function show(string $slug)
    {
        $blog = $this->blogRepository->getBlogDetails($slug);
        $relatedPosts = $this->blogRepository->getRelatedPosts($blog);
        $popularTags = $this->blogRepository->getPopularTags();
        $blogMedia = $this->frontendRepository->getMediaByModuleSection('Blog');

        return view('pages.blogs.show', compact('blog', 'relatedPosts', 'popularTags', 'blogMedia'));
    }

    public function storeComment(Request $request, BlogPost $blog)
    {
        $request->validate([
            'parent_id' => [
                'nullable',
                'integer',
                Rule::exists('blog_comments', 'id')->where(fn ($query) => $query->where('blog_post_id', $blog->id)),
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        try {
            $this->blogRepository->storeComment($blog, $request);

            return response()->json([
                'status' => true,
                'message' => 'Comment submitted successfully and is awaiting approval.',
            ]);
        } catch (\Exception $e) {
            Log::error('Blog Comment Store Error: ' . $e->getMessage(), [
                'blog_post_id' => $blog->id,
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again!',
            ], 500);
        }
    }
}
